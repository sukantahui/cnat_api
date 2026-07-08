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
            $table->string('nickname',100)->unique()->nullable();
            $table->string('photo')->nullable(true);
            $table->string('email',150)->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('aadhar_number')->nullable()->default("XXXX XXXX ");
            $table->string('blood_group',5)->nullable();
            $table->string('father_name',100)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->string('guardian_name',100)->nullable();
            $table->string('guardian_relation',50)->nullable();
            $table->string('guardian_phone',15)->nullable();
            $table->string('phone1',15)->unique()->nullable();
            $table->string('phone2',15)->unique()->nullable();
            $table->string('whatsapp',15)->unique()->nullable();
            $table->string('address',255)->nullable();
            $table->foreignId('district_id')->constrained('districts')->nullable();
            $table->string('city',100)->nullable();
            $table->string('pin',6)->nullable();
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
