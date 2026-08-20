<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\TopicResource;
use App\Helper\ResponseHelper;      
use Illuminate\Support\Facades\DB;


class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Chapters = Chapter::all();
        return ResponseHelper::success("Chapters fetched successfully",ChapterResource::collection($Chapters));
    }
    public function unused_chapters()
    {
        $Chapters = Chapter::doesntHave('topics')->get();
        return ResponseHelper::success("Chapters fetched successfully", ChapterResource::collection($Chapters));
    }
    public function list_of_topics_in_chapters(Chapter $chapter)
    {
        $Topics = $chapter->Topics;
        return ResponseHelper::success("Topics fetched successfully",TopicResource::collection($Topics));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        $chapter=DB::transaction(function () use ($request){
             $data = $request->validated();
             $chapter = Chapter::create($data);
            return $chapter;
        });
        return ResponseHelper::success("Chapter created successfully", new ChapterResource($chapter));

    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $Chapter)
    {
        return ResponseHelper::success("Chapter fetched successfully", new ChapterResource($Chapter));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request,Chapter $chapter)
    {
        
        DB::transaction(function () use ($request, $chapter) {
            $data = $request->validated();
            $chapter->update($data);
        });
        
        return ResponseHelper::success("Chapter updated successfully", new ChapterResource($chapter));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        
        $chapter->delete();
        return ResponseHelper::success("Chapter deleted successfully");
    }

}
