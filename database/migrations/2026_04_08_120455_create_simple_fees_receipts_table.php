<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('simple_fees_receipts', function (Blueprint $table) {

        $table->id();

        $table->string('receipt_no')->unique();

        $table->foreignId('student_id')->constrained()->cascadeOnDelete();
        $table->foreignId('course_id')->constrained()->cascadeOnDelete();

        $table->enum('fee_type', ['monthly', 'non_monthly']);
        $table->decimal('amount_paid', 10, 2);

        $table->decimal('monthly_fee_amount', 10, 2)->nullable();
        $table->date('period_from')->nullable();
        $table->date('period_to')->nullable();

        $table->date('payment_date');
        $table->string('payment_mode', 50);

        $table->foreignId('collected_by')->constrained('users')->cascadeOnDelete();

        $table->timestamps();

        $table->index(['student_id', 'course_id']);
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simple_fees_receipts');
    }
};
