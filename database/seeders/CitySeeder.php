<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\City;
use App\Models\County;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::truncate();

        $cities = Station::select('city','county')->groupBy('city','county')->orderBy('city', 'ASC')->get();
    
        foreach($cities as $city){
            City::insert([
                'city' => $city -> city,
                'city_slug' => Str::slug($city -> city),
                'city_count' => Station::where('city', $city -> city)->count(),
                'county_id' => County::where('county',$city -> county)->first()->id
            ]);
        }
    }
}
