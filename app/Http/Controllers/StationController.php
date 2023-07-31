<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\County;
use App\Models\City;

class StationController extends Controller
{
    public function viewStation($stationNameSlug){
        $station = Station::where('station_name_slug', $stationNameSlug)->first();
        return view('station', ['station' => $station]);
    }

    public function viewStations(){
        $stations = Station::orderBy('station_name','ASC')->paginate(20);
        return view('stations',['stations' => $stations]);
    }

    public function viewCounty($countyNameSlug){
        $county = County::where('county_slug', $countyNameSlug)->first();
        
        return view('county', ['county' => $county]);
    }

    public function viewCounties(){
        $counties = County::orderBy('county','ASC')->paginate(20);
        return view('counties',['counties' => $counties]);
    }

    public function viewCity($cityNameSlug){
        $city = City::where('city_slug', $cityNameSlug)->first();
        return view('city', ['city' => $city]);
    }

    public function viewCities(){
        $cities = City::orderBy('city','ASC')->paginate(20);
        return view('cities',['cities' => $cities]);
    }
}
