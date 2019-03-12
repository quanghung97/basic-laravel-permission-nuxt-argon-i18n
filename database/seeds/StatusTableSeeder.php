<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['name' => 'free'],
            ['name' => 'booking'],
        ]);
    }
}
