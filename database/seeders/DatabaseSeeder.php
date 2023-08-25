<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Imports\StationsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Station;
use App\Models\City;
use App\Models\County;

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        StationSeeder::class,
        CountySeeder::class,
        CitySeeder::class,
       ]);
    }
}
