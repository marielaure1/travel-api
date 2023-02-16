<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(['name' => 'Paris', 'slug' => Str::slug('Paris', '-'), 'lat' => '12.5', 'lng' => '12.5']);
        Location::create(['name' => 'Berlin', 'slug' => Str::slug('Berlin', '-'), 'lat' => '13.5', 'lng' => '13.5']);
        Location::create(['name' => 'Londres', 'slug' => Str::slug('Laravel 5 Framework', '-'), 'lat' => '14.5', 'lng' => '14.5']);
    }
}
