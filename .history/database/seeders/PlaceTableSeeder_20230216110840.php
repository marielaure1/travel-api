<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create(['name' => 'Paris', 'slug' => '', 'lat' => '12.5', 'lng' => '12.5', ]);
        Place::create(['name' => 'Berlin', 'slug' => '', 'lat' => '13.5', 'lng' => '13.5']);
        Place::create(['name' => 'Londres', 'slug' => '', 'lat' => '14.5', 'lng' => '14.5']);
    }
}
