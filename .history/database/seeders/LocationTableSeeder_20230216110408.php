<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(['name' => 'Paris', 'slug' => '', 'lat' => '12.5', 'lng' => '12.5']);
        Location::create(['name' => 'Berlin', 'slug' => '', 'lat' => '13.5', 'lng' => '12.5']);
        Location::create(['name' => 'Londres', 'slug' => '', 'lat' => '12.5', 'lng' => '12.5']);
    }
}
