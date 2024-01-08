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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_stream_post_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('lecturer_id')->nullable();
            $table->text('content');
            $table->timestamps();

            $table->foreign('classroom_stream_post_id')->references('id')->on('classroom_stream_posts')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
