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
            $table->string('student_name',100);
            $table->string('nickname',100)->unique();
            $table->string('email',150)->unique();
            $table->date('dob');
            $table->string('phone1',11)->unique();
            $table->string('phone2',11)->unique();
            $table->string('whatsapp',10)->unique();
            $table->string('address',100);
            $table->foreignId('district_id')->constrained('districts');
            $table->string('city',100);
            $table->string('state',100);
            $table->string('pin',6);
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
