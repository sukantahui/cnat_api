<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use Illuminate\Support\Facades\DB;
use App\Helper\ResponseHelper;
use App\Http\Resources\OptionResource;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::all();
        return ResponseHelper::success("Options fetched successfully", OptionResource::collection($options));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    
public function store(StoreOptionRequest $request)
    {
        $option = DB::transaction(function () use ($request) {
            $data=$request->validated();
            $option=Option::create($data);
            return $option;
        });

        
        return ResponseHelper::success("Option created successfully", new OptionResource($option));
    }
    
    /**
     * Display the specified resource.
     */
    public function show($optionId)
    {
        $option = Option::find($optionId);
        if (!$option) {
            return ResponseHelper::error("Option not found", 404);
        }
        return ResponseHelper::success("Option fetched successfully", new OptionResource($option));
    }
    

    
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $updatedOption = DB::transaction(function () use ($request, $option) {
            $data = $request->validated();
            $option->update($data);
            return $option;
        });

        return ResponseHelper::success("Option updated successfully", new OptionResource($updatedOption));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        //
    }
}
