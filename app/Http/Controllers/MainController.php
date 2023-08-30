<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\County;
use App\Models\City;
use Illuminate\Support\Facades\Validator;


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

    public function processSearch(){
    
        $validator = Validator::make(request()->input(), [
            'search' => ['string', 'nullable', 'max:20'],
            'type' => ['required', 'string', 'max:10']
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $info = $validator->validated();
        $searchText = $info['search'];
        $searchType = $info['type'];
    
        $query = Station::where('station_'.$searchType, 'LIKE', "$searchText%")->orderBy('station_'.$searchType, 'ASC');
        
        try{
            $result = $query -> get();
            //change this exception type later
        }catch(\Illuminate\Database\QueryException $e){

        }

        if($result -> isEmpty()){
            return response()->json(['emptyResult' => true]);
        }

        return response()->json([
            'result' => $result,
            'type' => $searchType,
        ]);
    }

    //add in the contact page later on
    /* public function viewContactPage(){
        return view('contact', [
            'title' => 'Contact Us'
        ]);
    } */
}
