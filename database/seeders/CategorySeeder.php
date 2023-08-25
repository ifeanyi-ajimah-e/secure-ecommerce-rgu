<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Men',
            'description' => 'Men'
        ]);
        DB::table('categories')->insert([
            'name' => 'Women',
            'description' => 'Women'
        ]);
        DB::table('categories')->insert([
            'name' => 'Childern',
            'description' => 'Children'
        ]);
        DB::table('categories')->insert([
            'name' => 'Shoes',
            'description' => 'Shoes'
        ]);
    }
}
