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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('imgpath')->nullable();
            $table->string('course_code')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('major_id')->nullable();
            $table->boolean('isGEDS');
            $table->timestamps();

            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
