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
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->foreignId('survey_id')->constrained('surveys')->onDelete('cascade');
            $table->foreignId('question_type_id')->constrained('question_types')->onDelete('cascade');
            $table->string('order_weightage')->nullable();
            $table->boolean('is_mandatory')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_questions');
    }
};
