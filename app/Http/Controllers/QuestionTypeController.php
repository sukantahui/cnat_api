<?php

namespace App\Http\Controllers;

use App\Models\QuestionType;
use App\Http\Resources\QuestionTypeResource;
use App\Helper\ResponseHelper;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = QuestionType::all();
        return ResponseHelper::success("Question types fetched successfully", QuestionTypeResource::collection($types));
    }

    public function show(QuestionType $questionType)
    {
        return ResponseHelper::success("Question type fetched successfully", new QuestionTypeResource($questionType));
    }
}
