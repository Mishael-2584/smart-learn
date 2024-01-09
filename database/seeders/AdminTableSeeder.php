<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert(['name' => 'Admin1', 'email' => 'worancha2584@admin.com', 'password' => bcrypt('Holybible1221$'), 'role_id' => 2]);
        DB::table('admins')->insert(['name' => 'Admin2', 'email' => 'bill23@admin.com', 'password' => bcrypt('123456$'), 'role_id' => 2]);
       }
}