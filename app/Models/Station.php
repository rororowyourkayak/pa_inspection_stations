<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ['county','station_name', 'ois_number', 'station_address', 'mailing_address', 
    'phone_number','passenger_cars_and_light_trucks','medium_trucks','heavy_trucks','motorcycle',
    'trailer_less_10000','trailer_greater_10000','station_street_address', 'station_city', 'station_zip',
    'station_name_slug','station_zip_plus_4'];

    public $timestamps = false;
}
