<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => env('INITIAL_USER_EMAIL'),
            'role_name' => env('INITIAL_USER_ROLE_NAME'),
            'role_type' => env('INITIAL_USER_ROLE_TYPE'),
            'password' => Hash::make(env('INITIAL_USER_PASSWORD'))
        ]);
    }
}
