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

                $exists = SimpleFeesReceipt::where('student_id', $request->student_id)
                    ->where('course_id', $request->course_id)
                    ->where('period_from', $request->period_from)
                    ->where('period_to', $request->period_to)
                    ->exists();

                if ($exists) {
                    return ResponseHelper::error(
                        "Fees already collected for this period",
                        422
                    );
                }
            }

            // ✅ Generate receipt number
            $receiptNo = 'RCPT-' . now()->format('YmdHis');

            $receipt = SimpleFeesReceipt::create([
                'receipt_no' => $receiptNo,
                'student_id' => $request->student_id,
                'course_id' => $request->course_id,
                'fee_type' => $request->fee_type,
                'amount_paid' => $request->amount_paid,
                'monthly_fee_amount' => $request->monthly_fee_amount,
                'period_from' => $request->period_from,
                'period_to' => $request->period_to,
                'payment_date' => $request->payment_date,
                'payment_mode' => $request->payment_mode,
                'collected_by' => Auth::id(),
            ]);

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