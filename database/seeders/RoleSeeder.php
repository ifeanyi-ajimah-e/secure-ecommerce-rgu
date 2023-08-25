<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'description' => 'The super Admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'General Administration'
        ]);
        DB::table('roles')->insert([
            'name' => 'Store Manager',
            'description' => 'Manage Stores'
        ]);
        DB::table('roles')->insert([
            'name' => 'Observer',
            'description' => 'Observe Details'
        ]);
    }
}
