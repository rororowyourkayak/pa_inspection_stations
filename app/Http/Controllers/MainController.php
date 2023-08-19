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
        return view('home', [
            'stationsCount' => $stationsCount, 
            'counties' => County::all(),
            'title' => 'PA Inspection Stations'
        ]);
    }

    public function viewContactPage(){
        return view('contact', [
            'title' => 'Contact Us'
        ]);
    }
}
