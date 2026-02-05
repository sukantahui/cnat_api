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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text')->nullable(false);
            $table->text('question_code')->nullable(true);
            $table->text('question_image')->nullable(true);
            $table->foreignId('question_type_id')->constrained('question_types')->onDelete('cascade');
            $table->foreignId('topic_id')->constrained('topics')->onDelete('cascade');
            $table->foreignId('question_level_id')->constrained('question_levels')->onDelete('cascade');
            $table->json('question_tags')->nullable(true);
            $table->json('applicable_to')->nullable(true);
            $table->boolean('inforce')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
