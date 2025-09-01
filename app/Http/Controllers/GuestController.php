<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Helper\ResponseHelper;
use App\Http\Resources\GuestResource;
use App\Traits\HandlesTransactions;

class GuestController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::with(['gender', 'foodPreference'])->get();
        if ($guests->isEmpty()) {
            return ResponseHelper::error("No guests found", null, statusCode: 404);
        }
        
        return ResponseHelper::success("Guests retrieved successfully", GuestResource::collection($guests));
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
    public function store(StoreGuestRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $guest = Guest::create($request->validated());
            return ResponseHelper::success("Guest created successfully", $guest);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
