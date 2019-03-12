<?php

use Illuminate\Database\Seeder;

class TypeServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('type_services')->insert([
            ['name' => 'Đám cưới'],
            ['name' => 'Sinh nhật'],
            ['name' => 'Ca nhạc - Thời trang'],
            ['name' => 'Tri ân khách hàng'],
            ['name' => 'Sinh nhật'],
            ['name' => 'Hội thảo - hữu nghị'],
            ['name' => 'OUTSIDE - CATERING'],
        ]);
    }
}
