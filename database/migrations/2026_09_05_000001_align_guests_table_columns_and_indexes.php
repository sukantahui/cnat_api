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
        Schema::table('guests', function (Blueprint $table) {
            if (!Schema::hasColumn('guests', 'age')) {
                $table->unsignedTinyInteger('age')->nullable()->after('guest_name');
            } else {
                $table->unsignedTinyInteger('age')->nullable()->change();
            }

            $table->string('mobile', 20)->nullable()->change();
            $table->string('wp_number', 20)->nullable(false)->change();

            if (Schema::hasIndex('guests', 'guests_guest_name_mobile_unique')) {
                $table->dropUnique('guests_guest_name_mobile_unique');
            }

            if (!Schema::hasIndex('guests', 'guests_guest_name_wp_number_unique')) {
                $table->unique(['guest_name', 'wp_number']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->string('mobile', 20)->nullable(false)->change();
            $table->string('wp_number', 20)->nullable()->change();

            if (!Schema::hasIndex('guests', 'guests_guest_name_mobile_unique')) {
                $table->unique(['guest_name', 'mobile']);
            }
        });
    }
};
