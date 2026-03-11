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
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            // link to admission
            $table->foreignId('admission_id')
                ->constrained('admissions')
                ->onDelete('cascade');

            // marks information
            $table->decimal('theory_marks', 5, 2)->nullable();
            $table->decimal('practical_marks', 5, 2)->nullable();
            $table->decimal('total_theory_marks', 5, 2)->nullable();
            $table->decimal('total_practical_marks', 5, 2)->nullable();

            // grade
            $table->string('grade', 10)->nullable();

            // pass / fail
            $table->boolean('is_passed')->default(false);

            // result publication date
            $table->date('result_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
