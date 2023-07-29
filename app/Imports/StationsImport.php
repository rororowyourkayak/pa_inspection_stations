<?php
namespace App\Imports;

use App\Models\Station;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        
        return new Station([
            'county'=>$row['county'],
            'station_name'=>$row['station_name'], 
            'ois_number'=>$row['ois_number'], 
            'station_address'=>$row['station_address'], 
            'mailing_address'=>$row['mailing_address'], 
            'phone_number'=>$row['phone_number'],
            'passenger_cars_and_light_trucks'=>$row['passenger_cars_and_light_trucks'],
            'medium_trucks'=>$row['medium_trucks'],
            'heavy_trucks'=>$row['heavy_trucks'],
            'motorcycle'=>$row['motorcycle'],
            'trailer_less_10000'=>$row['trailer_less_10000'],
            'trailer_greater_10000'=>$row['trailer_greater_10000'],
        ]);
    }
}

?>