<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;
use App\Models\Location;
use Illuminate\Support\Str;

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
        Place::create(['name' => 'Tour Eiffel', 'slug' => Str::slug('Tour Eiffel', '-'), 'lat' => '12.5', 'lng' => '12.5', 'visited' => true, 'Location_id' => $paris->id]);
        Place::create(['name' => 'Champs', 'slug' => Str::slug('Champs', '-'), 'lat' => '12.5', 'lng' => '12.5', 'visited' => true, 'Location_id' => $paris->id]);

        $berlin = Location::where('name', 'Berlin')->first();
        Place::create(['name' => 'Le mur', 'slug' => Str::slug('Le mur', '-'), 'lat' => '12.5', 'lng' => '12.5', 'visited' => true, 'Location_id' => $berlin->id]);

        $londres = Location::where('name', 'Londres')->first();
        Place::create(['name' => 'Big Ben', 'slug' => Str::slug('Big Ben', '-'), 'lat' => '12.5', 'lng' => '12.5', 'visited' => true, 'Location_id' => $londres->id]);
        Place::create(['name' => 'Poudlard', 'slug' => Str::slug('Poudlard', '-'), 'lat' => '12.5', 'lng' => '12.5', 'visited' => true, 'Location_id' => $londres->id]);
    }
}
