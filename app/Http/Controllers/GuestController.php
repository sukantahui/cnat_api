<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;
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
    // public function index()
    // {
    //     $guests = Guest::with(['gender', 'foodPreference'])->get();
    //     if ($guests->isEmpty()) {
    //   !      return ResponseHelper::error("No guests found", null, statusCode: 404);
    //     }

    //     return ResponseHelper::success("Guests retrieved successfully", GuestResource::collection($guests));
    // }

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

    public function index()
    {
        $guests = Guest::orderBy('id', 'desc')->get();

        if ($guests->isEmpty()) {
            return ResponseHelper::error("No guests found", null, 404);
        }

        // Add related data manually
        $guests = $guests->map(function ($guest) {
            return [
                'id' => $guest->id,
                'token' => $guest->token,
                'guestName' => $guest->guest_name,
                'mobile' => $guest->mobile,
                'mobileMasked' => $this->maskMobile($guest->mobile),
                'wpNumber' => $guest->wp_number,
                'wpNumberMasked' => $this->maskMobile($guest->wp_number),
                'genderId' => $guest->gender_id,
                'genderName' => optional($guest->gender)->gender_name ?? null,
                'foodPreferenceName' => optional($guest->foodPreference)->food_preference_name ?? null,
                'created_at' => $guest->created_at,
                'updated_at' => $guest->updated_at,
            ];
        });

        return ResponseHelper::success("Guests retrieved successfully", $guests);
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
    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
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
