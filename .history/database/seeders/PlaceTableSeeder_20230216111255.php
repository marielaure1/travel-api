<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;
use App\Models\Location;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paris = Location::where('name', 'Paris')->first();
        Place::create(['name' => 'Tour ', 'slug' => '', 'lat' => '12.5', 'lng' => '12.5', 'visite' => true, 'Location_id' => $paris->id]);

        $berlin = Location::where('name', 'Berlin')->first();
        Place::create(['name' => 'Berlin', 'slug' => '', 'lat' => '12.5', 'lng' => '12.5', 'visite' => true, 'Location_id' => $berlin->id]);

        $londres = Location::where('name', 'Londres')->first();
        Place::create(['name' => 'Londres', 'slug' => '', 'lat' => '12.5', 'lng' => '12.5', 'visite' => true, 'Location_id' => $londres->id]);
    }
}
