<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('settings')->insert([
            'map' => 'aaa',
            'phone' => '12312',
            'address' => 'sdasdsa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
