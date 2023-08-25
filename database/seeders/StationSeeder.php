<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Imports\StationsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Station;
use App\Models\City;
use App\Models\County;

use Illuminate\Support\Str;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new StationsImport, storage_path('stations.xlsx'));

        $stations = Station::all();

        foreach($stations as $station){
            $address = $station -> station_address; 
            $streetAddress = trim(substr($address,0,strpos($address,",")));
            $city = trim(substr($address,strpos($address,",")+1,strpos($address,"PA")-strpos($address,",")-2));
            $zipCode = trim(substr($address,strpos($address,"PA")+3));
            $zip5 = substr($zipCode, 0, 5);
            
            $adjustedCity = ucwords(strtolower($city));
            $adjustedCounty = ucwords(strtolower($station -> station_county));

            $name_slug = Str::slug($station -> station_name);
            $city_slug = Str::slug($city);
            $county_slug = Str::slug($station -> station_county);
        
            $station -> update([
                'station_street_address' => $streetAddress,
                'station_city' => $city,
                'station_zip_plus_4' => $zipCode,
                'station_zip' => $zip5,
                'station_name_slug' => $name_slug,
                'city' => $adjustedCity,
                'county'=> $adjustedCounty,
                'county_slug'=>$county_slug,
                'city_slug'=>$city_slug
            ]);
        }

    }
}
