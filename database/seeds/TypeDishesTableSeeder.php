<?php

use Illuminate\Database\Seeder;

// use DB;

class TypeDishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('type_dishes')->insert([
            ['name' => 'Canh'],
            ['name' => 'Xào'],
            ['name' => 'Khai Vị'],
            ['name' => 'Các món Gà'],
            ['name' => 'Các món Bò'],
            ['name' => 'Các món Luộc'],
            ['name' => 'Các món Rau'],
        ]);
    }
}
