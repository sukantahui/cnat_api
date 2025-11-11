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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            // Form data
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('interest')->nullable();
            $table->text('message')->nullable();

            // Auto-tracked meta
            $table->string('ip_address', 45)->nullable();
            $table->string('browser')->nullable();
            $table->string('device_type')->nullable();
            $table->string('page_url')->nullable();
            $table->string('referrer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
