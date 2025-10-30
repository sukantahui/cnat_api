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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number',20)->unique();
            $table->string('student_name',100);
            $table->string('nickname',100)->unique();
            $table->string('email',150)->unique();
            $table->date('dob');
            $table->string('blood_group',3);
            $table->string('father_name',100)->nullable(true);
            $table->string('mother_name',100)->nullable(true);
            $table->string('guardian_name',100)->nullable(true);
            $table->string('guardian_relation',50)->nullable(true);
            $table->string('guardian_phone',11)->nullable(true);
            $table->string('phone1',11)->unique()->nullable(true);
            $table->string('phone2',11)->unique()->nullable(true);
            $table->string('whatsapp',10)->unique()->nullable(true);
            $table->string('address',100)->nullable(true);
            $table->foreignId('district_id')->constrained('districts');
            $table->string('city',100)->nullable(true);
            $table->string('pin',6)->nullable(true);
            $table->foreignId('gender_id')->constrained('genders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
