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
//
    public function unused_subjects()
    {
        $subjects = Subject::doesntHave('chapters')->get();
        return ResponseHelper::success("Subjects fetched successfully", SubjectResource::collection($subjects));
    }

    public function list_of_chapters_in_subjects($subjectId)
    {
        $chapters = Subject::find($subjectId)->chapters;
        return ResponseHelper::success("Subjects fetched successfully",$chapters);
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
        $subject=Subject::withCount('chapters')->find($subjectId);
        if (!$subject) {
            return ResponseHelper::error("Subject not found", 404);
        }
        if($subject->chapters_count>0){
            return ResponseHelper::error("sorry parchina delete korte!",$subject,409);
        }
        
        $subject->delete();
        return ResponseHelper::success("Subject deleted successfully");
    }

}
