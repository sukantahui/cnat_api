<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdmissionResource;
use App\Models\Admission;
use App\Http\Requests\StoreAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;

class AdmissionController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admissions = Admission::with('student', 'course', 'courseStatus')->get();
        return ResponseHelper::success("Admissions fetched successfully", AdmissionResource::collection($admissions));
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
