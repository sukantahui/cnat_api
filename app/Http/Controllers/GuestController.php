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
    public function index(Request $request)
    {
        $query = Guest::with(['gender', 'foodPreference'])->orderBy('guest_name');

        // If 'per_page' is explicitly provided, return paginated results; otherwise return full collection
        if ($request->has('per_page') && !$request->boolean('all')) {
            $perPage = $request->integer('per_page', 20);
            $guests = $query->paginate($perPage);
        } else {
            $guests = $query->get();
        }

        return ResponseHelper::success("Guests retrieved successfully", GuestResource::collection($guests));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {
            $data = $request->validated();

            // Link to previous guest if phone matches
            $previousGuest = Guest::where('mobile', $data['mobile'])->first();
            if ($previousGuest) {
                $data['previous_guest_id'] = $previousGuest->id;
            }

            $guest = Guest::create($data);
            $guest->token = "CNAT-" . ($guest->id + 1000);
            $guest->save();

            $guest->load(['gender', 'foodPreference']);

            return ResponseHelper::success("Guest created successfully", new GuestResource($guest));
        });
    }

    /**
     * Display the specified resource.
     */
    public function show($guest)
    {
        if (!($guest instanceof Guest)) {
            $guest = Guest::findOrFail($guest);
        }

        $guest->load(['gender', 'foodPreference']);

        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
    }

    /**
     * Search guests with filters.
     */
    public function search(SearchGuestRequest $request)
    {
        $results = Guest::query()
            ->with(['gender', 'foodPreference'])
            ->when($request->filled('key'), function ($query) use ($request) {
                $k = $request->key;
                $query->where(function ($q) use ($k) {
                    $q->where('guest_name', 'like', "%{$k}%")
                      ->orWhere('mobile',     'like', "%{$k}%")
                      ->orWhere('wp_number',  'like', "%{$k}%")
                      ->orWhere('email',      'like', "%{$k}%")
                      ->orWhere('token',      'like', "%{$k}%");
                });
            })
            ->when($request->filled('name'), function ($query) use ($request) {
                $query->where('guest_name', 'like', "%{$request->name}%");
            })
            ->when($request->filled('year'), function ($query) use ($request) {
                $query->where('year', $request->year);
            })
            ->when($request->filled('mobile'), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('mobile',    'like', "%{$request->mobile}%")
                      ->orWhere('wp_number', 'like', "%{$request->mobile}%");
                });
            })
            ->when($request->filled('email'), function ($query) use ($request) {
                $query->where('email', 'like', "%{$request->email}%");
            })
            ->when($request->filled('address'), function ($query) use ($request) {
                $query->where('address', 'like', "%{$request->address}%");
            })
            ->when($request->has('is_attending') && $request->is_attending !== null, function ($query) use ($request) {
                $query->where('is_attending', filter_var($request->is_attending, FILTER_VALIDATE_BOOLEAN));
            })
            ->when($request->filled('gender_id'), function ($query) use ($request) {
                $query->where('gender_id', $request->gender_id);
            })
            ->when($request->filled('food_preference_id'), function ($query) use ($request) {
                $query->where('food_preference_id', $request->food_preference_id);
            })
            ->when($request->filled('token'), function ($query) use ($request) {
                $query->where('token', $request->token);
            })
            ->when($request->filled('date_from'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })
            ->when($request->filled('date_to'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })
            ->orderBy(
                in_array($request->sort_by, ['guest_name', 'year', 'mobile', 'email', 'created_at'])
                    ? $request->sort_by
                    : 'guest_name',
                $request->sort_dir === 'desc' ? 'desc' : 'asc'
            )
            ->paginate($request->integer('per_page', 20));

        return ResponseHelper::success('Search completed successfully.', GuestResource::collection($results));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($guestId, Request $request)
    {
        $guest = Guest::findOrFail($guestId);
        $guest->load(['gender', 'foodPreference']);
        return ResponseHelper::success("Guest retrieved successfully", new GuestResource($guest));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, $guest)
    {
        if (!($guest instanceof Guest)) {
            $guest = Guest::findOrFail($guest);
        }

        $guest->update($request->validated());
        $guest->load(['gender', 'foodPreference']);

        return ResponseHelper::success("Guest updated successfully", new GuestResource($guest));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($guest)
    {
        if (!($guest instanceof Guest)) {
            $guest = Guest::findOrFail($guest);
        }

        $guest->delete();
        return ResponseHelper::success("Guest deleted successfully");
    }
}
