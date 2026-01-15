<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use App\Http\Resources\StateResource;

class StateController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        return ResponseHelper::success("States retrieved successfully",StateResource::collection($states));
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
    public function store(StoreStateRequest $request)
    {
        return "testing";
    }

    /**
     * Display the specified resource.
     */
    public function show($stateId)
    {
        $state=State::find($stateId);
        if(!$state){
            return ResponseHelper::error("State not found",404);
        }
        return ResponseHelper::success("State retrieved successfully",new StateResource($state));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
