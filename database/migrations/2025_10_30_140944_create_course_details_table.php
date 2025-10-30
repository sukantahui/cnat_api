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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            // 🔗 Relation to main courses table
            $table->foreignId('course_id')
                  ->constrained('courses')
                  ->onDelete('cascade');
            // 📝 Topic details
            $table->string('topic_title', 150);
            $table->text('topic_description')->nullable();
            
            // ⏱ Duration (separated for theory and practical)
            $table->decimal('theory_duration', 5, 2)->nullable()->comment('Duration in hours for theory sessions');
            $table->decimal('practical_duration', 5, 2)->nullable()->comment('Duration in hours for practical/lab sessions');

            // 📅 Optional ordering
            $table->integer('sequence')->nullable()->comment('Topic order within course');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_details');
    }
};
