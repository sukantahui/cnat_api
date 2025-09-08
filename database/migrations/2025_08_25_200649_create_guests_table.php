<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name', 100);
            $table->string('mobile', 20);
            $table->string('wp_number', 20)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('email', 191);
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('food_preference_id')->constrained('food_preferences');
            $table->unsignedBigInteger('previous_guest_id')->nullable();
            $table->foreign('previous_guest_id')->references('id')->on('guests')->nullOnDelete();
            $table->timestamps();

            // Composite unique constraints
            $table->unique(['guest_name', 'mobile']);
            $table->unique(['guest_name', 'wp_number']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
