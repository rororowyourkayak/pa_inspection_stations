<?php

namespace App\Console\Commands;

use App\Models\Center;
use Illuminate\Console\Command;

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
        $centers = Center::all();

        foreach($centers as $center){
            $address = $center -> station_address; 
            $streetAddress = trim(substr($address,0,strpos($address,",")));
            $city = trim(substr($address,strpos($address,",")+1,strpos($address,"PA")-strpos($address,",")-2));
            $zipCode = trim(substr($address,strpos($address,"PA")+3));
            $center -> update([
                'station_street_address' => $streetAddress,
                'station_city' => $city,
                'station_zip' => $zipCode
            ]);
        }
    }
}
