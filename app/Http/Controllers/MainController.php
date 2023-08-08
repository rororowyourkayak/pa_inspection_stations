<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\County;
use App\Models\City;


class MainController extends Controller
{
    public function viewHomePage(){

        $stationsCount = Station::count();
        $asOf = config('metadata.dataAsOf');
        
        return view('home', [
            'stationsCount' => $stationsCount, 
            'asOf' => $asOf,
            'counties' => County::all(),
        ]);
    }
}
