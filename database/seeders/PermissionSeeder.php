<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Manage User',
            'description' => 'Manage User'
        ]);
        DB::table('permissions')->insert([
            'name' => 'View User',
            'description' => 'View User'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Manage Products',
            'description' => 'Manage Products'
        ]);
        DB::table('permissions')->insert([
            'name' => 'View Products',
            'description' => 'View Products'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Manage Product Categories',
            'description' => 'Manage Product Categories'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Manage Product Categories',
            'description' => 'View Product Categories'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Manage Orders',
            'description' => 'Manage Orders'
        ]);
        DB::table('permissions')->insert([
            'name' => 'View Orders',
            'description' => 'View Orders'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Manage Roles & Permission',
            'description' => 'Manage Roles & Permission'
        ]);
        DB::table('permissions')->insert([
            'name' => 'View Roles & Permission',
            'description' => 'View Roles & Permission'
        ]);
    }
}


