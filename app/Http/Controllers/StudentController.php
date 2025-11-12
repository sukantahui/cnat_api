<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Models\CustomVoucher;

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
       return $this->executeInTransaction(function () use ($request) {
            $data=$request->validated();  
            $data['registration_number']=CustomVoucher::generate("Student",5,"CNAT");
            $student = Student::create($data);
            $student->save();

            return ResponseHelper::success("Student created successfully", $student);
        });
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
