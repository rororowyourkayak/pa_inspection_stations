<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Imports\StationsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Station;
use Illuminate\Support\Str;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('station_county', 30);
            $table->string('station_name', 100);
            $table->string('ois_number', 5);
            $table->string('station_address', 200);
            $table->string('mailing_address', 200);
            $table->string('phone_number', 15)->nullable();
            $table->string('passenger_cars_and_light_trucks', 1);
            $table->string('medium_trucks', 1);
            $table->string('heavy_trucks', 1);
            $table->string('motorcycle', 1);
            $table->string('trailer_less_10000', 1);
            $table->string('trailer_greater_10000', 1);
            $table->string('station_street_address', 100)->nullable();
            $table->string('station_city', 100)->nullable();
            $table->string('station_zip', 10)->nullable();
            $table->string('station_zip_plus_4', 10)->nullable();
            $table->string('station_name_slug', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('county', 30)->nullable();
            $table->string('county_slug',35)->nullable();
            $table->string('city_slug',105)->nullable();

            $table->index('county');
            $table->index('city');
        });

        Excel::import(new StationsImport, storage_path('pa_inspection_pg_1_excel.xlsx'));

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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
