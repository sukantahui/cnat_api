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
        $Topics = Topic::all();
        return ResponseHelper::success("Topics fetched successfully",TopicResource::collection($Topics));

    }
    public function unused_topics()
    {
        $topics = Topic::doesntHave('questions')->get();
        return ResponseHelper::success("Topics fetched successfully", TopicResource::collection($topics));
    }

    public function list_of_questions_in_topics($topicId)
    {
        $Questions = Topic::find($topicId)->Questions;
        return ResponseHelper::success("Questions fetched successfully",$Questions);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $Topic = DB::transaction(function () use ($request){
            $data = $request->validated();
            $Topic = Topic::create($data);
        });
        return ResponseHelper::success("Topic created successfully", new TopicResource($Topic));
    }//

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
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
