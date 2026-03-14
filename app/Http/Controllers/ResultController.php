<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Resources\ResultResource;
use App\Models\Result;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
        $result = Result::create($request->validated());
        return ResponseHelper::success("Result created successfully",new ResultResource($result));
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
