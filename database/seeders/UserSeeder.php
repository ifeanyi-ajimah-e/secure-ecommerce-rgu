<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $password = 'AdminPassword@@999';

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@mensfashion.com.ng',
            'phone' => '07039939393',
            'role_id' => 1,
            'is_active' => 1,
            'type' => 'admin',
            'department' => 'Admin Department',
            'job_description' => 'This is the office of the Super Admin',
            'is_otp_verified' => 0,
            'verification_token' => Str::random(10),
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'remember_token' => Str::random(10)
        ]);
    }
}


