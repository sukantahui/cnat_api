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
use App\Http\Requests\StoreStudentWithAdmissionRequest;

class AdmissionController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AdmissionResource::collection(
            Admission::with([
                'student',
                'course',
                'courseStatus'
            ])->get()
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdmissionRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $admission = Admission::create($request->validated());
            $admission->save();
            return ResponseHelper::success("Admission created successfully", AdmissionResource::make($admission));
        });
    }

    public function storeStudentWithAdmission(StoreStudentWithAdmissionRequest $request)
    {

        $admissionData = $request->validated()['admission'];
        // return($admissionData);

        return $this->executeInTransaction(function () use ($request) {
            // Create the student
            $student = Student::create($request->validated()['student']);
            $student->save();

            // Create the admission
            $admissionData = $request->validated()['admission'];
            $admissionData['student_id'] = $student->id;
            $admission = Admission::create($admissionData);
            $admission->save();

            return ResponseHelper::success("Student and Admission created successfully", AdmissionResource::make($admission));
        });
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
        //
    }
}
