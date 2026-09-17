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
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasIndex('students', 'students_student_name_index')) {
                $table->index('student_name', 'students_student_name_index');
            }
            if (!Schema::hasIndex('students', 'students_whatsapp_index')) {
                $table->index('whatsapp', 'students_whatsapp_index');
            }
        });

        Schema::table('admissions', function (Blueprint $table) {
            if (!Schema::hasIndex('admissions', 'admissions_admission_date_index')) {
                $table->index('admission_date', 'admissions_admission_date_index');
            }
        });

        Schema::table('guests', function (Blueprint $table) {
            if (!Schema::hasIndex('guests', 'guests_mobile_index')) {
                $table->index('mobile', 'guests_mobile_index');
            }
            if (!Schema::hasIndex('guests', 'guests_wp_number_index')) {
                $table->index('wp_number', 'guests_wp_number_index');
            }
        });

        Schema::table('simple_fees_receipts', function (Blueprint $table) {
            if (!Schema::hasIndex('simple_fees_receipts', 'simple_fees_receipts_payment_date_index')) {
                $table->index('payment_date', 'simple_fees_receipts_payment_date_index');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (Schema::hasIndex('students', 'students_student_name_index')) {
                $table->dropIndex('students_student_name_index');
            }
            if (Schema::hasIndex('students', 'students_whatsapp_index')) {
                $table->dropIndex('students_whatsapp_index');
            }
        });

        Schema::table('admissions', function (Blueprint $table) {
            if (Schema::hasIndex('admissions', 'admissions_admission_date_index')) {
                $table->dropIndex('admissions_admission_date_index');
            }
        });

        Schema::table('guests', function (Blueprint $table) {
            if (Schema::hasIndex('guests', 'guests_mobile_index')) {
                $table->dropIndex('guests_mobile_index');
            }
            if (Schema::hasIndex('guests', 'guests_wp_number_index')) {
                $table->dropIndex('guests_wp_number_index');
            }
        });

        Schema::table('simple_fees_receipts', function (Blueprint $table) {
            if (Schema::hasIndex('simple_fees_receipts', 'simple_fees_receipts_payment_date_index')) {
                $table->dropIndex('simple_fees_receipts_payment_date_index');
            }
        });
    }
};
