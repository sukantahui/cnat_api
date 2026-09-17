<?php

namespace App\Http\Controllers;

use App\Models\QuestionLevel;
use App\Http\Resources\QuestionLevelResource;
use App\Helper\ResponseHelper;

class QuestionLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = QuestionLevel::all();
        return ResponseHelper::success("Question levels fetched successfully", QuestionLevelResource::collection($levels));
    }

    public function show(QuestionLevel $questionLevel)
    {
        return ResponseHelper::success("Question level fetched successfully", new QuestionLevelResource($questionLevel));
    }
}
