<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menstrual Cycle Calendar — Individual period start date entries per user.
     */
    public function up(): void
    {
        Schema::create('cycle_period_entries', function (Blueprint $table) {
            $table->id();

            // Foreign key to the user's cycle profile
            $table->foreignId('cycle_user_id')
                  ->constrained('cycle_users')
                  ->cascadeOnDelete()
                  ->comment('Owner cycle profile — deleting profile removes all period entries');

            // The recorded period start date
            $table->date('period_start_date')->comment('Recorded menstrual period start date (YYYY-MM-DD)');

            // Optional per-entry note
            $table->string('notes', 191)->nullable()->comment('Optional user note for this entry');

            $table->timestamps();

            // One entry per date per user profile
            $table->unique(['cycle_user_id', 'period_start_date'], 'unique_period_per_user');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cycle_period_entries');
    }
};
