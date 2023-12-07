<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }

    // public function run(): void
    // {
    //     //
    //     DB::table('roles')->insert(['title' =>'Super Admin']);
    //     DB::table('roles')->insert(['title' =>'Admin']);
    //     DB::table('roles')->insert(['title' =>'Lecturer']);
    //     DB::table('roles')->insert(['title' =>'Student']);
    // }
};
