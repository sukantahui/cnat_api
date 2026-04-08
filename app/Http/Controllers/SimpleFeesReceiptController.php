<?php

namespace App\Http\Controllers;

use App\Models\SimpleFeesReceipt;
use App\Http\Requests\StoreSimpleFeesReceiptRequest;
use App\Http\Resources\SimpleFeesReceiptResource;
use App\Traits\HandlesTransactions;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\Auth;

class SimpleFeesReceiptController extends Controller
{
    use HandlesTransactions;

    /**
     * Display a listing of receipts
     */
    public function index()
    {
        $receipts = SimpleFeesReceipt::with(['student', 'course', 'collector'])
            ->latest()
            ->get();

        return ResponseHelper::success(
            "Receipt list fetched successfully",
            SimpleFeesReceiptResource::collection($receipts)
        );
    }

    /**
     * Store new receipt
     */
    public function store(StoreSimpleFeesReceiptRequest $request)
    {
        return $this->executeInTransaction(function () use ($request) {

            // 🔥 Monthly validation
            if ($request->fee_type === 'monthly') {

                if (!$request->period_from || !$request->period_to || !$request->monthly_fee_amount) {
                    return ResponseHelper::error(
                        "Monthly fee requires period and monthly amount",
                        422
                    );
                }

            }
            $data = $request->validated();
            $receipt = SimpleFeesReceipt::create($data);
            $receipt->load(['student', 'course', 'collector']);

            return ResponseHelper::success(
                "Receipt created successfully",
                new SimpleFeesReceiptResource($receipt),
                201
            );

        }, [
            'action' => 'create_receipt',
            'student_id' => $request->student_id,
            'course_id' => $request->course_id
        ]);
    }

    /**
     * Display single receipt
     */
    public function show(SimpleFeesReceipt $simpleFeesReceipt)
    {
        $simpleFeesReceipt->load(['student', 'course', 'collector']);

        return ResponseHelper::success(
            "Receipt fetched successfully",
            new SimpleFeesReceiptResource($simpleFeesReceipt)
        );
    }

    /**
     * Update (disabled intentionally)
     */
    public function update(SimpleFeesReceipt $simpleFeesReceipt)
    {
        return ResponseHelper::error("Update not allowed", 403);
    }

    /**
     * Delete receipt
     */
    public function destroy(SimpleFeesReceipt $simpleFeesReceipt)
    {
        return $this->executeInTransaction(function () use ($simpleFeesReceipt) {

            $simpleFeesReceipt->delete();

            return ResponseHelper::success("Receipt deleted successfully");

        }, [
            'action' => 'delete_receipt',
            'receipt_id' => $simpleFeesReceipt->id
        ]);
    }
}