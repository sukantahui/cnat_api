<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Models\CustomVoucher;
use App\Helper\CommonHelper;
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
        return ResponseHelper::success("Students retrieved successfully", $students);
    }



    /**
     * Store a newly created resource in storage.
     */
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
                'voucher_name'    => 'Student',
                'accounting_year' => $year,
                'last_counter'    => 0,
                'prefix'          => 'CNAT',
                'min_digits'      => 5,
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
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
