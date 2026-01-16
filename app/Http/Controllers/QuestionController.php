<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Http\Resources\QuestionResource;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return ResponseHelper::success("Questions fetched successfully", QuestionResource::collection($questions));
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = DB::transaction(function () use ($request) {
            $data=$request->validated();
            $question=Question::create($data);
            return $question;
        });
        return ResponseHelper::success("Question created successfully", new QuestionResource($question));
    }

    /**
     * Display the specified resource.
     */
    public function show($questionId)
    {
        $question = Question::find($questionId);
        if (!$question) {
            return ResponseHelper::error("Question not found", 404);
        }
        return ResponseHelper::success("Question fetched successfully", new QuestionResource($question));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
