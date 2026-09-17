<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdmissionResource;
use App\Models\Admission;
use App\Http\Requests\StoreAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\SimpleFeesReceipt;
use App\Http\Requests\StoreStudentWithAdmissionRequest;

class AdmissionController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissions = Admission::with([
            'student',
            'course',
            'courseStatus',
        ])->get();

        return ResponseHelper::success(
            "Admissions retrieved successfully",
            AdmissionResource::collection($admissions)
        );
    }


        /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdmissionRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $data = $request->validated();
            $admission = Admission::create($data);
            $admission->save();

            $receipt = $this->handleInitialFee($admission, $request->input('initial_fee') ?? $request->input('initialFee'));

            return ResponseHelper::success(
                $receipt ? "Admission and initial fee receipt created successfully" : "Admission created successfully",
                [
                    'admission' => AdmissionResource::make($admission),
                    'receipt' => $receipt ? \App\Http\Resources\SimpleFeesReceiptResource::make($receipt) : null,
                ]
            );
        });
    }

    public function storeStudentWithAdmission(StoreStudentWithAdmissionRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            // Create the student
            $student = Student::create($request->validated()['student']);
            $student->save();

            // Create the admission
            $admissionData = $request->validated()['admission'];
            $admissionData['student_id'] = $student->id;
            $admission = Admission::create($admissionData);
            $admission->save();

            $receipt = $this->handleInitialFee($admission, $request->input('initial_fee') ?? $request->input('initialFee'), $student->id);

            return ResponseHelper::success(
                $receipt ? "Student, Admission and initial fee receipt created successfully" : "Student and Admission created successfully",
                [
                    'admission' => AdmissionResource::make($admission),
                    'receipt' => $receipt ? \App\Http\Resources\SimpleFeesReceiptResource::make($receipt) : null,
                ]
            );
        });
    }

    /**
     * Helper to create an initial fee receipt atomically with admission
     */
    protected function handleInitialFee($admission, $feeData, $studentId = null)
    {
        if (empty($feeData) || empty($feeData['amount_paid']) || (float)$feeData['amount_paid'] <= 0) {
            return null;
        }

        $studentId = $studentId ?? $admission->student_id;
        $isMonthly = (int)($admission->fee_modes_id ?? 1) === 1;
        $feeType = $isMonthly ? 'monthly' : 'non_monthly';

        $amountPaid = (float)$feeData['amount_paid'];
        $monthlyRate = (float)($admission->course_fees ?? 0);

        // Support consolidated payments for elapsed months
        $periodFrom = $feeData['period_from'] ?? $admission->admission_date;
        $periodTo = $feeData['period_to'] ?? null;

        if ($isMonthly && !$periodTo && $monthlyRate > 0) {
            $monthsCount = max(1, (int)round($amountPaid / $monthlyRate));
            $fromDt = new \DateTime($periodFrom);
            $toDt = (clone $fromDt)->modify("+{$monthsCount} months")->modify("-1 day");
            $periodTo = $toDt->format('Y-m-d');
        } elseif (!$periodTo) {
            $periodTo = $feeData['payment_date'] ?? $admission->admission_date;
        }

        $yearStart = now()->year % 100;
        $yearEnd = ($yearStart + 1) % 100;
        $academicYear = sprintf('%02d%02d', $yearStart, $yearEnd);
        $prefix = 'REC';

        $last = \App\Models\SimpleFeesReceipt::where('receipt_no', 'like', "$prefix-%-$academicYear")
            ->latest('id')
            ->first();

        if ($last) {
            $parts = explode('-', $last->receipt_no);
            $lastNumber = isset($parts[1]) ? intval($parts[1]) : 10000;
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 10001;
        }
        $receiptNo = !empty($feeData['receipt_no']) ? $feeData['receipt_no'] : "{$prefix}-{$nextNumber}-{$academicYear}";

        return \App\Models\SimpleFeesReceipt::create([
            'receipt_no' => $receiptNo,
            'student_id' => $studentId,
            'course_id' => $admission->course_id,
            'fee_type' => $feeType,
            'amount_paid' => $amountPaid,
            'monthly_fee_amount' => $isMonthly ? ($monthlyRate > 0 ? $monthlyRate : $amountPaid) : null,
            'period_from' => $periodFrom,
            'period_to' => $periodTo,
            'payment_date' => $feeData['payment_date'] ?? $admission->admission_date,
            'payment_mode' => $feeData['payment_mode'] ?? 'Cash',
            'collected_by' => auth()->id() ?? 1,
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Admission $admission)
    {
        $admission->load(['student.gender', 'course', 'courseStatus']);
        return ResponseHelper::success("Admission retrieved successfully", AdmissionResource::make($admission));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdmissionRequest $request, $admissionId)
    {
        $admission = Admission::findOrFail($admissionId);

        return $this->executeInTransaction(function () use ($request, $admission) {
            $admission->update($request->validated());
            return ResponseHelper::success("Admission updated successfully", AdmissionResource::make($admission));
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admission $admission)
    {
        $admission->delete();
        return ResponseHelper::success("Admission deleted successfully");
    }

    /**
     * Get complete student fee ledger & statement for an admission
     */
    public function ledger($admissionId)
    {
        $q = trim($admissionId);
        $admission = null;

        // 1. Direct numeric Admission ID
        if (is_numeric($q)) {
            $admission = Admission::with(['student', 'course', 'courseStatus'])->find($q);
        }

        // 2. Admission Number
        if (!$admission) {
            $admission = Admission::with(['student', 'course', 'courseStatus'])->where('admission_number', $q)->first();
        }

        // 3. Student Registration Number
        if (!$admission) {
            $student = Student::where('registration_number', $q)->first();
            if ($student) {
                $admission = Admission::with(['student', 'course', 'courseStatus'])->where('student_id', $student->id)->latest('id')->first();
            }
        }

        // 4. Student Name (Like Search)
        if (!$admission) {
            $student = Student::where('student_name', 'like', "%{$q}%")->first();
            if ($student) {
                $admission = Admission::with(['student', 'course', 'courseStatus'])->where('student_id', $student->id)->latest('id')->first();
            }
        }

        if (!$admission) {
            return ResponseHelper::error("Admission record not found", 404);
        }

        $receipts = SimpleFeesReceipt::with('collector')
            ->where('student_id', $admission->student_id)
            ->where('course_id', $admission->course_id)
            ->orderBy('payment_date', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $isMonthly = (int)$admission->fee_modes_id === 1;
        $monthlyRate = (float)($admission->course_fees ?? 600);
        $totalCourseFee = (float)($admission->course_fees ?? $admission->course?->course_fees ?? 0);

        $runningTotal = 0;
        $transactions = [];

        foreach ($receipts as $idx => $r) {
            $amount = (float)$r->amount_paid;
            $runningTotal += $amount;

            $coverageText = "Full Course";
            if ($isMonthly) {
                $from = $r->period_from ? new \DateTime($r->period_from) : null;
                $to = $r->period_to ? new \DateTime($r->period_to) : null;
                if ($from && $to) {
                    $fromM = $from->format('F Y');
                    $toM = $to->format('F Y');
                    $coverageText = ($fromM === $toM) ? $fromM : "{$from->format('F')} to {$to->format('F Y')}";
                }
            } else {
                $rem = max(0, $totalCourseFee - $runningTotal);
                if ($rem > 0) {
                    $coverageText = "Part Payment";
                } else {
                    $coverageText = ($runningTotal - $amount > 0) ? "Final Payment" : "Paid in Full";
                }
            }

            $transactions[] = [
                'slNo' => $idx + 1,
                'receiptId' => $r->id,
                'receiptNo' => $r->receipt_no,
                'paymentDate' => $r->payment_date ? date('Y-m-d', strtotime($r->payment_date)) : null,
                'paymentMode' => ucfirst($r->payment_mode ?? 'Cash'),
                'amountPaid' => $amount,
                'runningTotal' => $runningTotal,
                'coveragePeriod' => $coverageText,
                'collectedBy' => $r->collector?->name ?? 'Accounts Staff',
            ];
        }

        $now = new \DateTime();
        $admDate = new \DateTime($admission->admission_date ?? 'now');
        $clearedMonths = [];
        $nextDueMonth = null;
        $dueAmount = 0;
        $balanceDue = 0;
        $statusBadge = '';
        $elapsedMonths = 1;
        $unpaidMonthsCount = 0;
        $pendingMonths = [];
        $pendingMonthsText = null;
        $chargeableFee = 0;

        if ($isMonthly) {
            $rate = $monthlyRate > 0 ? $monthlyRate : 600;
            
            // Determine billing period: from admission month up to current month (e.g. April to September = 6 months)
            $admYear = (int)$admDate->format('Y');
            $admMonth = (int)$admDate->format('n');
            
            $endDate = $admission->completion_date ? new \DateTime($admission->completion_date) : $now;
            if ($endDate > $now) {
                $endDate = $now;
            }
            $endYear = (int)$endDate->format('Y');
            $endMonth = (int)$endDate->format('n');

            $elapsedMonths = (($endYear - $admYear) * 12) + ($endMonth - $admMonth) + 1;
            if ($elapsedMonths < 1) {
                $elapsedMonths = 1;
            }

            // Total chargeable / accrued fees to date (e.g. 6 months * 600 = 3,600)
            $chargeableFee = $elapsedMonths * $rate;
            $totalMonthsCovered = (int)floor($runningTotal / $rate);

            for ($i = 0; $i < $totalMonthsCovered; $i++) {
                $m = (clone $admDate)->modify("+{$i} months");
                $clearedMonths[] = $m->format('F Y');
            }
            $nextDue = (clone $admDate)->modify("+{$totalMonthsCovered} months");
            $nextDueMonth = $nextDue->format('F Y');

            $unpaidMonthsCount = max(0, $elapsedMonths - $totalMonthsCovered);
            for ($i = $totalMonthsCovered; $i < $elapsedMonths; $i++) {
                $m = (clone $admDate)->modify("+{$i} months");
                $pendingMonths[] = $m->format('F Y');
            }

            if (count($pendingMonths) === 0) {
                $pendingMonthsText = null;
            } elseif (count($pendingMonths) === 1) {
                $pendingMonthsText = $pendingMonths[0];
            } else {
                $pendingMonthsText = $pendingMonths[0] . " to " . end($pendingMonths);
            }

            $balanceDue = max(0, $chargeableFee - $runningTotal);
            $dueAmount = $balanceDue;
            $isPaidInFull = ($balanceDue <= 0);

            if ($unpaidMonthsCount > 0) {
                $statusBadge = "{$unpaidMonthsCount} Month" . ($unpaidMonthsCount > 1 ? "s" : "") . " Overdue ({$pendingMonthsText} : ₹" . number_format($balanceDue) . "/-)";
            } elseif ($totalMonthsCovered > $elapsedMonths) {
                $advance = $totalMonthsCovered - $elapsedMonths;
                $statusBadge = "Advance Paid: {$advance} Month" . ($advance > 1 ? "s" : "") . " Ahead (Paid up to " . end($clearedMonths) . ")";
            } else {
                $statusBadge = "All Fees Cleared Up to Date (Next Due: {$nextDueMonth})";
            }
        } else {
            $chargeableFee = $totalCourseFee;
            $balanceDue = max(0, $totalCourseFee - $runningTotal);
            $dueAmount = $balanceDue;
            $isPaidInFull = ($balanceDue <= 0);
            $unpaidMonthsCount = $balanceDue > 0 ? 1 : 0;
            $elapsedMonths = null;
            $statusBadge = $balanceDue <= 0 
                ? "PAID IN FULL" 
                : "PARTIAL PAYMENT (Balance Due: ₹" . number_format($balanceDue) . "/-)";
        }

        $ledgerData = [
            'admission' => [
                'admissionId' => $admission->id,
                'admissionNumber' => $admission->admission_number,
                'admissionDate' => $admission->admission_date,
                'feeMode' => $isMonthly ? 'Monthly' : 'Course Fee / Lump sum',
                'isMonthly' => $isMonthly,
                'agreedFee' => $isMonthly ? $monthlyRate : $totalCourseFee,
            ],
            'student' => [
                'id' => $admission->student?->id,
                'name' => $admission->student?->student_name,
                'registrationNumber' => $admission->student?->registration_number,
                'whatsapp' => $admission->student?->whatsapp,
                'phone' => $admission->student?->phone1,
                'email' => $admission->student?->email,
                'address' => $admission->student?->address,
                'city' => $admission->student?->city,
            ],
            'course' => [
                'id' => $admission->course?->id,
                'name' => $admission->course?->course_name,
                'code' => $admission->course?->course_code,
            ],
            'summary' => [
                'totalPaid' => $runningTotal,
                'totalCourseFee' => $isMonthly ? $chargeableFee : $totalCourseFee,
                'monthlyRate' => $isMonthly ? $monthlyRate : null,
                'elapsedMonths' => $elapsedMonths,
                'chargeableFee' => $chargeableFee,
                'clearedMonthsCount' => count($clearedMonths),
                'clearedMonths' => $clearedMonths,
                'clearedMonthsText' => count($clearedMonths) > 0 ? implode(', ', $clearedMonths) : null,
                'unpaidMonthsCount' => $unpaidMonthsCount,
                'pendingMonths' => $pendingMonths,
                'pendingMonthsText' => $pendingMonthsText,
                'nextDueMonth' => $nextDueMonth,
                'dueAmount' => $dueAmount,
                'balanceDue' => $balanceDue,
                'isPaidInFull' => $isPaidInFull,
                'statusBadge' => $statusBadge,
            ],
            'transactions' => $transactions,
        ];

        return ResponseHelper::success("Student fee ledger fetched successfully", $ledgerData);
    }

    /**
     * GET /api/admissions/dues
     * Summary and student/course itemization of all outstanding fees.
     */
    public function dues()
    {
        $now = new \DateTime();
        $admissions = Admission::with(['student', 'course'])
            ->orderBy('id', 'desc')
            ->get();

        $allReceipts = SimpleFeesReceipt::all()->groupBy(function($r) {
            return $r->student_id . '_' . $r->course_id;
        });

        $studentsMap = [];
        $enrollments = [];
        $totalOutstandingDue = 0;

        foreach ($admissions as $adm) {
            $student = $adm->student;
            $course = $adm->course;
            if (!$student) continue;

            $sId = $student->id;
            $admDate = new \DateTime($adm->admission_date ?? 'now');
            $isMonthly = (int)$adm->fee_modes_id === 1;
            $monthlyRate = (float)($adm->course_fees ?? 600);
            $totalCourseFee = (float)($adm->course_fees ?? $course?->course_fees ?? 0);

            $key = $adm->student_id . '_' . $adm->course_id;
            $admReceipts = $allReceipts->get($key, collect());
            $coursePaid = (float)$admReceipts->sum('amount_paid');

            $clearedMonths = [];
            $nextDueMonth = null;
            $unpaidMonths = [];
            $pendingMonthsText = null;
            $chargeableFee = 0;

            if ($isMonthly) {
                $rate = $monthlyRate > 0 ? $monthlyRate : 600;
                $admYear = (int)$admDate->format('Y');
                $admMonth = (int)$admDate->format('n');
                
                $endDate = $adm->completion_date ? new \DateTime($adm->completion_date) : $now;
                if ($endDate > $now) {
                    $endDate = $now;
                }
                $endYear = (int)$endDate->format('Y');
                $endMonth = (int)$endDate->format('n');

                $elapsedMonths = (($endYear - $admYear) * 12) + ($endMonth - $admMonth) + 1;
                if ($elapsedMonths < 1) {
                    $elapsedMonths = 1;
                }

                $chargeableFee = $elapsedMonths * $rate;
                $balanceDue = max(0, $chargeableFee - $coursePaid);
                $totalMonthsCovered = (int)floor($coursePaid / $rate);

                for ($i = 0; $i < $totalMonthsCovered; $i++) {
                    $m = (clone $admDate)->modify("+{$i} months");
                    $clearedMonths[] = $m->format('F Y');
                }
                $nextDue = (clone $admDate)->modify("+{$totalMonthsCovered} months");
                $nextDueMonth = $nextDue->format('F Y');

                $unpaidMonthsCount = max(0, $elapsedMonths - $totalMonthsCovered);
                for ($i = $totalMonthsCovered; $i < $elapsedMonths; $i++) {
                    $m = (clone $admDate)->modify("+{$i} months");
                    $unpaidMonths[] = $m->format('F Y');
                }

                if (count($unpaidMonths) === 0) {
                    $pendingMonthsText = null;
                } elseif (count($unpaidMonths) === 1) {
                    $pendingMonthsText = $unpaidMonths[0];
                } else {
                    $pendingMonthsText = $unpaidMonths[0] . " to " . end($unpaidMonths);
                }

                if ($unpaidMonthsCount > 0) {
                    $statusText = "{$unpaidMonthsCount} Mos Due (" . ($pendingMonthsText ?? $nextDueMonth) . ")";
                } elseif ($totalMonthsCovered > $elapsedMonths) {
                    $statusText = "Advance Paid";
                } else {
                    $statusText = "Dues Cleared (Next: {$nextDueMonth})";
                }
            } else {
                $chargeableFee = $totalCourseFee;
                $balanceDue = max(0, $totalCourseFee - $coursePaid);
                $unpaidMonthsCount = $balanceDue > 0 ? 1 : 0;
                $statusText = $balanceDue <= 0 ? "Paid in Full" : "Part Payment";
            }

            $totalOutstandingDue += $balanceDue;

            $courseItem = [
                'admissionId' => $adm->id,
                'admissionNo' => $adm->admission_number,
                'admissionDate' => $adm->admission_date,
                'courseId' => $course?->id,
                'courseName' => $course?->course_name ?? 'Unknown Course',
                'courseCode' => $course?->course_code ?? 'CRS',
                'isMonthly' => $isMonthly,
                'feeMode' => $isMonthly ? 'Monthly' : 'Lump sum',
                'monthlyRate' => $isMonthly ? ($monthlyRate > 0 ? $monthlyRate : 600) : null,
                'totalCourseFee' => $chargeableFee,
                'totalPaid' => $coursePaid,
                'balanceDue' => $balanceDue,
                'status' => $statusText,
                'nextDueMonth' => $nextDueMonth,
                'unpaidMonthsCount' => $unpaidMonthsCount,
                'pendingMonthsText' => $pendingMonthsText,
            ];

            // Flat enrollment entry
            $enrollments[] = array_merge($courseItem, [
                'studentId' => $sId,
                'studentName' => $student->student_name,
                'studentRegNo' => $student->registration_number,
                'studentPhone' => $student->whatsapp ?? $student->phone1,
            ]);

            // Group by student
            if (!isset($studentsMap[$sId])) {
                $studentsMap[$sId] = [
                    'studentId' => $sId,
                    'studentName' => $student->student_name,
                    'studentRegNo' => $student->registration_number,
                    'studentPhone' => $student->whatsapp ?? $student->phone1,
                    'totalAgreedFee' => 0,
                    'totalPaid' => 0,
                    'totalDue' => 0,
                    'hasMultipleCourses' => false,
                    'courses' => [],
                ];
            }

            $studentsMap[$sId]['totalAgreedFee'] += $chargeableFee;
            $studentsMap[$sId]['totalPaid'] += $coursePaid;
            $studentsMap[$sId]['totalDue'] += $balanceDue;
            $studentsMap[$sId]['courses'][] = $courseItem;
        }

        $studentsList = array_values($studentsMap);
        $multiCourseStudentsCount = 0;
        $studentsWithDuesCount = 0;

        foreach ($studentsList as &$s) {
            $s['hasMultipleCourses'] = count($s['courses']) > 1;
            if ($s['hasMultipleCourses']) {
                $multiCourseStudentsCount++;
            }
            if ($s['totalDue'] > 0) {
                $studentsWithDuesCount++;
            }
        }
        unset($s);

        $response = [
            'summary' => [
                'totalOutstandingDue' => $totalOutstandingDue,
                'studentsWithDuesCount' => $studentsWithDuesCount,
                'totalStudents' => count($studentsList),
                'multiCourseStudentsCount' => $multiCourseStudentsCount,
                'totalEnrollments' => count($enrollments),
                'asOfDate' => date('d M Y'),
            ],
            'students' => $studentsList,
            'enrollments' => $enrollments,
        ];

        return ResponseHelper::success("Student dues statement fetched successfully", $response);
    }
}
