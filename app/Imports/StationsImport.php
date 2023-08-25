<?php
namespace App\Imports;

use App\Models\Station;
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;

class StationsImport implements ToModel/* , WithHeadingRow */, SkipsOnError
{
    public function model(array $row)
    {
        
        return new Station([
            'station_county'=>$row[0],
            'station_name'=>$row[1],
            'ois_number'=>$row[2],
            'station_address'=>$row[3],
            'mailing_address'=>$row[4],
            'phone_number'=>$row[5],
            'passenger_cars_and_light_trucks'=>$row[6],
            'medium_trucks'=>$row[7],
            'heavy_trucks'=>$row[8],
            'motorcycle'=>$row[9],
            'trailer_less_10000'=>$row[10],
            'trailer_greater_10000'=>$row[11],
        ]);
    }
    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}

?>