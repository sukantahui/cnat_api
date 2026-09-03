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
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('course_fees')->default(0)->after('course_name');
            $table->date('fees_valid_up_to')->nullable()->after('course_fees');
            $table->integer('upcoming_fees')->nullable()->after('fees_valid_up_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['course_fees', 'fees_valid_up_to', 'upcoming_fees']);
        });
    }
};
