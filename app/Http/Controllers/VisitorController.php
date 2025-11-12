<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Http\Requests\StoreVisitorRequest;
use App\Http\Requests\UpdateVisitorRequest;
use App\Models\BotLog;
use App\Traits\HandlesTransactions;

use App\Helper\ResponseHelper;

class VisitorController extends Controller
{
    use HandlesTransactions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = Visitor::get();
        return ResponseHelper::success("Visitors fetched successfully", $visitors);
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
    public function store(StoreVisitorRequest $request)
    {
        // 🧱 Step 1: Honeypot protection (bot detection)
        if (!empty($request->input('extra_field'))) {

            // Log to database
            BotLog::create([
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'page_url' => $request->headers->get('referer'),
                'referrer' => $request->input('referrer'),
                'payload' => json_encode($request->all()), // optional for review
            ]);

            // Optional: Log to file as well
            \Log::warning('🚫 Bot submission blocked', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'time' => now(),
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Invalid submission detected.',
            ], 403);
        }

        // ✅ Step 1: Validate input from StoreVisitorRequest
        $data = $request->validated();

        // ✅ Step 2: Auto-track visitor metadata
        $data['ip_address'] = $request->ip();
        $data['browser'] = $request->header('User-Agent');
        $data['device_type'] = preg_match('/mobile/i', $data['browser']) ? 'Mobile' : 'Desktop';
        $data['page_url'] = $request->headers->get('referer');
        $data['referrer'] = $request->input('referrer');

        // ✅ Step 3: Save to database
        $visitor = Visitor::create($data);

        // ✅ Step 4: Send response back to frontend
        return response()->json([
            'status' => true,
            'message' => 'Your inquiry has been submitted successfully.',
            'data' => $visitor,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitorRequest $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
