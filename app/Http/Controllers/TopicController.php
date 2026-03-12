<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Helper\ResponseHelper;      
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TopicResource;

class TopicController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topic = Topic::all();
        return ResponseHelper::success("Topics fetched successfully",TopicResource::collection($topic));

    }
    public function unused_topics()
    {
        $topic = Topic::doesntHave('questions')->get();
        return ResponseHelper::success("Topics fetched successfully", TopicResource::collection($topic));
    }

    public function list_of_questions_in_topics($topicId)
    {
        $question = Topic::find($topicId)->Questions;
        return ResponseHelper::success("Questions fetched successfully",TopicResource::collection($question));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = DB::transaction(function () use ($request){
            $data = $request->validated();
            $topic = Topic::create($data);
            return $topic;
        });
        return ResponseHelper::success("Topic created successfully", new TopicResource($topic));
        // return $request->validated();
    }//

    /**
     * Display the specified resource.
     */
    public function show($topicId)
    {
        $topic = Topic::find($topicId);
        if(!$topic){
            return ResponseHelper::error("Topic not found", 404);
        }
        return ResponseHelper::success("Topic fetched successfully", new TopicResource($topic));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
