<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop unique constraint on whatsapp if it exists
            // Using raw DB query instead of Doctrine (removed in Laravel 11+)
            $database = config('database.connections.mysql.database');
            $indexExists = DB::select("
                SELECT COUNT(*) as count
                FROM information_schema.STATISTICS
                WHERE TABLE_SCHEMA = ?
                  AND TABLE_NAME = 'students'
                  AND INDEX_NAME = 'students_whatsapp_unique'
            ", [$database]);

            if ($indexExists[0]->count > 0) {
                $table->dropUnique('students_whatsapp_unique');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unique('whatsapp', 'students_whatsapp_unique');
        });
    }
};
