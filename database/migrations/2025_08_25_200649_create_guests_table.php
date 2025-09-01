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
            $table->string('guest_name'); // removed unique
            $table->string('mobile')->unique();
            $table->string('wp_number')->nullable(); // allow same as mobile or empty
            $table->string('address')->nullable();   // optional
            $table->string('email')->unique();
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('food_preference_id')->constrained('food_preferences');
            $table->timestamps();
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
