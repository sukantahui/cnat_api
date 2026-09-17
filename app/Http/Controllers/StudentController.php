<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\Admission;
use App\Models\SimpleFeesReceipt;
use App\Models\FeeMode;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Models\CustomVoucher;
use App\Helper\CommonHelper;
use App\Http\Requests\StoreStudentRequestBasic;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return ResponseHelper::success("Students retrieved successfully", StudentResource::collection($students));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = DB::transaction(function () use ($request) {

            $data = $request->validated();

            // 1) Get current accounting year
            $year = CommonHelper::getCurrentAccountingYear();

            // 2) Lock / create voucher row for "Student" in this year
            $voucher = CustomVoucher::where('voucher_name', 'Student')
                ->where('accounting_year', $year)
                ->lockForUpdate()
                ->first();

            if (!$voucher) {
                $voucher = CustomVoucher::create([
                    'voucher_name' => 'Student',
                    'accounting_year' => $year,
                    'last_counter' => 0,
                    'prefix' => 'CNAT',
                    'min_digits' => 5,
                ]);
            }

            // 3) Increment counter
            $voucher->last_counter++;
            $voucher->save();

            // 4) Build registration number
            $data['registration_number'] =
                $voucher->prefix . '-' .
                str_pad($voucher->last_counter, $voucher->min_digits, '0', STR_PAD_LEFT) .
                '-' . $voucher->accounting_year;

            // 5) Try to create student (this is where unique constraint may fail)
            $student = Student::create($data);

            // If we reached here, no exception, transaction will COMMIT
            return $student;
        });

        // Outside transaction: only reached if commit succeeded
        return ResponseHelper::success("Student created successfully", $student);
    }
    public function storeBasic(StoreStudentRequestBasic $request)
    {
        $student = DB::transaction(function () use ($request) {

            $data = $request->validated();

            // 1) Get current accounting year
            $year = CommonHelper::getCurrentAccountingYear();

            // 2) Lock / create voucher row for "Student" in this year
            $voucher = CustomVoucher::where('voucher_name', 'Student')
                ->where('accounting_year', $year)
                ->lockForUpdate()
                ->first();

            if (!$voucher) {
                $voucher = CustomVoucher::create([
                    'voucher_name' => 'Student',
                    'accounting_year' => $year,
                    'last_counter' => 0,
                    'prefix' => 'CNAT',
                    'min_digits' => 5,
                ]);
            }

            // 3) Increment counter
            $voucher->last_counter++;
            $voucher->save();

            // 4) Build registration number
            $data['registration_number'] =
                $voucher->prefix . '-' .
                str_pad($voucher->last_counter, $voucher->min_digits, '0', STR_PAD_LEFT) .
                '-' . $voucher->accounting_year;

            // 5) Try to create student (this is where unique constraint may fail)
            $student = Student::create($data);

            // If we reached here, no exception, transaction will COMMIT
            return $student;
        });

        // Outside transaction: only reached if commit succeeded
        return ResponseHelper::success("Student created successfully", $student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load(['gender', 'district.state', 'admissions.course', 'admissions.courseStatus']);
        return ResponseHelper::success("Student retrieved successfully", new StudentResource($student));
    }

    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return ResponseHelper::success("Student Updated successfully", new StudentResource($student));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function admissions(Student $student)
    {
        $data = $student->load([
            'courses',
            'admissions.course',
            'admissions.courseStatus'
        ]);

        return ResponseHelper::success("Student admissions retrieved successfully", $data);
    }

    public function studentsWithoutAdmission()
    {
        $students = Student::whereDoesntHave('admissions')
            ->orderBy('student_name')
            ->get();

        return ResponseHelper::success("Students without admission retrieved successfully", StudentResource::collection($students));
    }

    /**
     * =========================================================================
     * GET /api/students/{studentId}/previous-admissions
     * -------------------------------------------------------------------------
     * Fetches the student's complete profile along with all previous course 
     * admissions, course statuses, fee modes, and per-course fee payment ledger.
     * Calculates:
     *  - Total agreed course fee vs total amount paid
     *  - Outstanding balance / due amount
     *  - Cleared months & next due month for monthly courses
     *  - Formatted receipt transaction vouchers
     * Supports both numeric student ID and registration number string.
     * =========================================================================
     */
    public function previousAdmissions($studentId)
    {
        $q = trim((string)$studentId);

        // 1. Resolve student by numeric ID or registration number
        $student = null;
        if (is_numeric($q)) {
            $student = Student::with(['gender', 'district', 'state'])->find($q);
        }
        if (!$student) {
            $student = Student::with(['gender', 'district', 'state'])
                ->where('registration_number', $q)
                ->first();
        }

        if (!$student) {
            return ResponseHelper::error("Student record not found for '{$q}'", null, 404);
        }

        // 2. Load all admissions for this student with course and course status
        $admissions = Admission::with(['course', 'courseStatus'])
            ->where('student_id', $student->id)
            ->orderBy('admission_date', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        $overallTotalAgreedFees = 0;
        $overallTotalPaid = 0;
        $overallTotalBalanceDue = 0;
        $admissionsData = [];

        foreach ($admissions as $admission) {
            $course = $admission->course;
            $courseId = $admission->course_id;

            // Fetch fee mode if available
            $feeModeObj = FeeMode::find($admission->fee_modes_id);
            $isMonthly = (int)$admission->fee_modes_id === 1;

            $monthlyRate = (float)($admission->course_fees ?? ($course?->course_fees ?? 600));
            $totalCourseFee = (float)($admission->course_fees ?? ($course?->course_fees ?? 0));

            // Fetch all fee receipts for this student and course
            $receipts = SimpleFeesReceipt::with('collector')
                ->where('student_id', $student->id)
                ->where('course_id', $courseId)
                ->orderBy('payment_date', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            $coursePaid = 0;
            $transactions = [];

            foreach ($receipts as $idx => $r) {
                $amt = (float)$r->amount_paid;
                $coursePaid += $amt;

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
                    $rem = max(0, $totalCourseFee - $coursePaid);
                    if ($rem > 0) {
                        $coverageText = "Part Payment";
                    } else {
                        $coverageText = ($coursePaid - $amt > 0) ? "Final Payment" : "Paid in Full";
                    }
                }

                $transactions[] = [
                    'slNo' => $idx + 1,
                    'receiptId' => $r->id,
                    'receiptNo' => $r->receipt_no,
                    'paymentDate' => $r->payment_date ? date('Y-m-d', strtotime($r->payment_date)) : null,
                    'paymentMode' => ucfirst($r->payment_mode ?? 'Cash'),
                    'amountPaid' => $amt,
                    'runningTotal' => $coursePaid,
                    'coveragePeriod' => $coverageText,
                    'collectedBy' => $r->collector?->name ?? 'Accounts Staff',
                ];
            }

            // Calculation for monthly or full course (Accrued/Chargeable fees up to current month)
            $admDate = new \DateTime($admission->admission_date ?? 'now');
            $now = new \DateTime('now');
            $clearedMonths = [];
            $nextDueMonth = null;
            $dueAmount = 0;
            $balanceDue = 0;
            $chargeableFee = 0;
            $elapsedMonths = 1;

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
                $balanceDue = max(0, $chargeableFee - $coursePaid);
                $dueAmount = $balanceDue;

                // Cleared months based on payments received
                $totalMonthsCovered = (int)floor($coursePaid / $rate);
                for ($i = 0; $i < $totalMonthsCovered; $i++) {
                    $m = (clone $admDate)->modify("+{$i} months");
                    $clearedMonths[] = $m->format('F Y');
                }
                $nextDue = (clone $admDate)->modify("+{$totalMonthsCovered} months");
                $nextDueMonth = $nextDue->format('F Y');
            } else {
                $chargeableFee = $totalCourseFee;
                $balanceDue = max(0, $totalCourseFee - $coursePaid);
                $dueAmount = $balanceDue;
                $elapsedMonths = null;
            }

            $overallTotalAgreedFees += $chargeableFee;
            $overallTotalPaid += $coursePaid;
            $overallTotalBalanceDue += $balanceDue;

            $admissionsData[] = [
                'admissionId' => $admission->id,
                'admissionNumber' => $admission->admission_number,
                'admissionDate' => $admission->admission_date,
                'completionDate' => $admission->completion_date,
                'course' => [
                    'id' => $course?->id ?? $courseId,
                    'courseName' => $course?->course_name ?? 'Unknown Course',
                    'courseCode' => $course?->course_code ?? 'CRS',
                    'catalogFees' => (float)($course?->course_fees ?? 0),
                ],
                'courseStatus' => [
                    'id' => $admission->courseStatus?->id ?? 1,
                    'statusName' => $admission->courseStatus?->course_status_name ?? 'Ongoing',
                ],
                'feeMode' => [
                    'id' => $admission->fee_modes_id,
                    'modeName' => $feeModeObj?->fee_modes_name ?? ($isMonthly ? 'Monthly' : 'Course Fees (Full / Lump sum)'),
                    'isMonthly' => $isMonthly,
                ],
                'agreedFee' => $isMonthly ? $monthlyRate : $totalCourseFee,
                'financials' => [
                    'isMonthly' => $isMonthly,
                    'monthlyRate' => $isMonthly ? $monthlyRate : null,
                    'elapsedMonths' => $elapsedMonths,
                    'chargeableFee' => $chargeableFee,
                    'totalCourseFee' => $isMonthly ? $chargeableFee : $totalCourseFee,
                    'totalPaid' => $coursePaid,
                    'balanceDue' => $balanceDue,
                    'dueAmount' => $dueAmount,
                    'isPaidInFull' => ($balanceDue <= 0),
                    'clearedMonthsCount' => count($clearedMonths),
                    'clearedMonths' => $clearedMonths,
                    'clearedMonthsText' => count($clearedMonths) > 0 ? implode(', ', $clearedMonths) : 'None',
                    'nextDueMonth' => $nextDueMonth,
                    'paymentPercentage' => $chargeableFee > 0 ? min(100, round(($coursePaid / $chargeableFee) * 100)) : 0,
                ],
                'receiptsCount' => count($transactions),
                'receipts' => array_reverse($transactions), // most recent first
            ];
        }

        $result = [
            'student' => [
                'id' => $student->id,
                'studentName' => $student->student_name,
                'registrationNumber' => $student->registration_number,
                'whatsapp' => $student->whatsapp,
                'phone1' => $student->phone1,
                'phone2' => $student->phone2,
                'email' => $student->email,
                'gender' => $student->gender?->gender_name,
                'dob' => $student->dob,
                'bloodGroup' => $student->blood_group,
                'fatherName' => $student->father_name,
                'motherName' => $student->mother_name,
                'guardianName' => $student->guardian_name,
                'guardianRelation' => $student->guardian_relation,
                'address' => $student->address,
                'city' => $student->city,
                'district' => $student->district?->district_name,
                'state' => $student->state?->state_name,
                'pin' => $student->pin,
                'createdAt' => $student->created_at?->format('Y-m-d'),
            ],
            'hasPreviousAdmissions' => count($admissionsData) > 0,
            'totalAdmissionsCount' => count($admissionsData),
            'overallStats' => [
                'totalAgreedFees' => $overallTotalAgreedFees,
                'totalPaidAmount' => $overallTotalPaid,
                'totalBalanceDue' => $overallTotalBalanceDue,
            ],
            'admissions' => $admissionsData,
        ];

        return ResponseHelper::success(
            count($admissionsData) > 0
                ? "Found " . count($admissionsData) . " previous admission(s) with fee payment details."
                : "Student has no previous course admissions.",
            $result
        );
    }
}