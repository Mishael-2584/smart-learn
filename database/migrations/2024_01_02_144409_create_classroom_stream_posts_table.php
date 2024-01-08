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
        Schema::create('classroom_stream_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecturer_course_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('lecturer_id')->nullable();
            $table->longText('content'); // HTML content from Summernote
            $table->timestamps();

            $table->foreign('lecturer_course_id')->references('id')->on('lecturer_courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_stream_posts');
    }
};
