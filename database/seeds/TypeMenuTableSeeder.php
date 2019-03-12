<?php

use Illuminate\Database\Seeder;

// use DB;

class TypeMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('type_menus')->insert([
            ['name' => 'default'],
            ['name' => 'custom'],
        ]);
    }
}
