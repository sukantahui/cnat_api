<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectResource;     
use App\Helper\ResponseHelper;      
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return ResponseHelper::success("Subjects fetched successfully", SubjectResource::collection($subjects));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject = DB::transaction(function () use ($request) {
            $data = $request->validated();
            $subject = Subject::create($data);
            return $subject;
        });

        return ResponseHelper::success("Subject created successfully", new SubjectResource($subject));
    }

    /**
     * Display the specified resource.
     */
    public function show($subjectId)
    {
        $subject = Subject::find($subjectId);
        if (!$subject) {
            return ResponseHelper::error("Subject not found", 404);
        }
        return ResponseHelper::success("Subject fetched successfully", new SubjectResource($subject));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request,  $subjectId)
    {
        $subject = Subject::find($subjectId);
        if (!$subject) {
            return ResponseHelper::error("Subject not found", 404);
        }
        DB::transaction(function () use ($request, $subject) {
            $data = $request->validated();
            $subject->update($data);
        });
        return ResponseHelper::success("Subject updated successfully", new SubjectResource($subject));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subjectId)
    {
        $subject = Subject::find($subjectId);
        if (!$subject) {
            return ResponseHelper::error("Subject not found", 404);
        }
        $subject->delete();
        return ResponseHelper::success("Subject deleted successfully");
    }
}
