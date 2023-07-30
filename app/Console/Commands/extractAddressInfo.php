<?php

namespace App\Console\Commands;

use App\Models\Station;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class extractAddressInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extract-address-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $stations = Station::all();

        foreach($stations as $station){
            $address = $station -> station_address; 
            $streetAddress = trim(substr($address,0,strpos($address,",")));
            $city = trim(substr($address,strpos($address,",")+1,strpos($address,"PA")-strpos($address,",")-2));
            $zipCode = trim(substr($address,strpos($address,"PA")+3));
            $zip5 = substr($zipCode, 0, 5);
            $name_slug = Str::slug($station -> station_name);
            $station -> update([
                'station_street_address' => $streetAddress,
                'station_city' => $city,
                'station_zip_plus_4' => $zipCode,
                'station_zip' => $zip5,
                'station_name_slug' => $name_slug,
            ]);
        }
    }
}
