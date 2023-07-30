<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;

class StationController extends Controller
{
    public function viewStation($stationNameSlug){
        $station = Station::where('station_name_slug', $stationNameSlug)->first();
        return view('station', ['station' => $station]);
    }

    public function viewStations(){
        
    }
}
