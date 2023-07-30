<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\County;
use App\Models\City;

class city_and_county_slugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city_and_county_slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate name slugs for the city and county tables.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach(City::all() as $city){
            $city->update([
                'city_slug' => Str::slug($city->city)
            ]);
        }

        foreach(County::all() as $county){
            $county->update([
                'county_slug' => Str::slug($county->county)
            ]);
        }
    }
}
