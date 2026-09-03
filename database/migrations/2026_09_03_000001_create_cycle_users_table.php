<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menstrual Cycle Calendar — User-specific health profiles.
     * Tied to the authenticated users table via user_id.
     */
    public function up(): void
    {
        Schema::create('cycle_users', function (Blueprint $table) {
            $table->id();

            // One profile per authenticated user
            $table->foreignId('user_id')
                  ->unique()
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->comment('FK to users table — each logged-in user has one cycle profile');

            // Health profile (optional — for more precise calculations)
            $table->date('date_of_birth')->nullable()->comment('Used to calculate current age for context');
            $table->decimal('weight_kg', 5, 1)->nullable()->comment('Body weight in kilograms');
            $table->decimal('height_cm', 5, 1)->nullable()->comment('Height in centimetres');
            $table->string('blood_group', 5)->nullable()->comment('e.g. A+, B-, O+, AB+');
            $table->string('medical_notes', 255)->nullable()->comment('Relevant conditions: PCOS, endometriosis, thyroid, etc.');

            // Goal of using this tool
            $table->enum('goal', ['pregnancy', 'safe_period', 'general'])
                  ->default('general')
                  ->comment('User goal: pregnancy planning, safe period awareness, or general tracking');

            // Cycle settings (mirrors React app settings)
            $table->tinyInteger('avg_period_duration')->default(5)->comment('Typical bleeding duration in days');
            $table->tinyInteger('custom_cycle_length')->nullable()->comment('Manual override for average cycle length');
            $table->boolean('use_custom_cycle')->default(false)->comment('If true, use custom_cycle_length instead of auto-calculated average');
            $table->tinyInteger('luteal_phase_length')->default(14)->comment('Estimated luteal phase length for ovulation calc');
            $table->tinyInteger('prediction_months')->default(12)->comment('How many months ahead to predict');
            $table->tinyInteger('fertile_window_days_before')->default(5)->comment('Days before ovulation considered fertile');
            $table->tinyInteger('fertile_window_days_after')->default(1)->comment('Days after ovulation considered fertile');

            // Metadata
            $table->timestamp('last_seen_at')->nullable()->comment('Last time user accessed the calendar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cycle_users');
    }
};
