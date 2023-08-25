<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\City;
use App\Models\County;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counties = Station::select('county')->groupBy('county')->orderBy('county', 'ASC')->get();

        foreach($counties as $county){
            County::insert([
                'county' => $county -> county,
                'county_slug' => Str::slug($county -> county),
                'county_count' => Station::where('county', $county -> county)->count()
            ]);
        }
    }
}
