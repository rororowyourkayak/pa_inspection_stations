<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\County;
use App\Models\City;


class MainController extends Controller
{
    public function viewHomePage(){
        
        return view('home', [
            'stationsCount' => Station::count(), 
            'countiesCount' => County::count(),
            'citiesCount' => City::count(),
            'counties' => County::pluck('county', 'county_slug'),
            'title' => 'PA Inspection Stations'
        ]);
    }

    //add in the contact page later on
    /* public function viewContactPage(){
        return view('contact', [
            'title' => 'Contact Us'
        ]);
    } */
}
