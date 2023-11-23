<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert(['title' =>'Super Admin']);
        DB::table('roles')->insert(['title' =>'Admin']);
        DB::table('roles')->insert(['title' =>'Lecturer']);
        DB::table('roles')->insert(['title' =>'Student']);
    }
}
