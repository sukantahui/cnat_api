<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\SearchGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Helper\ResponseHelper;
use App\Http\Resources\GuestResource;
use App\Traits\HandlesTransactions;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    

    private function maskMobile($mobile)
    {
        if (!$mobile || strlen($mobile) < 4) {
            return $mobile; // fallback if invalid number
        }

        $firstTwo = substr($mobile, 0, 2);
        $lastTwo  = substr($mobile, -2);
        $masked   = str_repeat('X', strlen($mobile) - 4);

        return $firstTwo . $masked . $lastTwo;
    }

    
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 10); // Default to 10 if not provided
        $guests = Guest::orderBy('guest_name')->paginate($perPage);

        if ($guests->isEmpty()) {
            return ResponseHelper::error("No guests found", null, 404);
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
            $data = $request->validated();

            // Check if a guest already exists with the same mobile
            $previousGuest = Guest::where('mobile', $data['mobile'])->first();

            if ($previousGuest) {
                $data['previous_guest_id'] = $previousGuest->id;
            }

            $guest = Guest::create($data);
            $guest->token = "CNAT-" . ($guest->id + 1000);
            $guest->save();

            return ResponseHelper::success("Guest created successfully", $guest);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        
        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
    }
    public function search(SearchGuestRequest $request)
{
    $results = Guest::query()

        // General search: key searches name, year and mobile
        ->when($request->filled('key'), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('guest_name', 'like', "%{$request->key}%")
                    ->orWhere('year', 'like', "%{$request->key}%")
                    ->orWhere('mobile', 'like', "%{$request->key}%");
            });
        })

        // Specific name search
        ->when($request->filled('name'), function ($query) use ($request) {
            $query->where('guest_name', 'like', "%{$request->name}%");
        })

        // Specific year filter
        ->when($request->filled('year'), function ($query) use ($request) {
            $query->where('year', $request->year);
        })

        // Specific mobile search
        ->when($request->filled('mobile'), function ($query) use ($request) {
            $query->where('mobile', 'like', "%{$request->mobile}%");
        })

        ->orderBy('guest_name')
        ->paginate($request->integer('per_page', 20));

    return $this->success(
        GuestResource::collection($results),
        'Search completed successfully.'
    );
}

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($guestId, Request $request)
    {
        // return $guestId;
        $guest = Guest::findOrFail($guestId);
        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        $guest->update($request->validated());
        return ResponseHelper::success("Guest Updated successfully", $guest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return ResponseHelper::success("Guest deleted successfully");
    }
}
