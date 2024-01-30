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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecturer_course_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('total_points');
            $table->dateTime('deadline');
            $table->dateTime('published_at')->nullable();
            $table->string('time_limit')->nullable();
            $table->timestamps();

            $table->foreign('lecturer_course_id')->references('id')->on('lecturer_courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
