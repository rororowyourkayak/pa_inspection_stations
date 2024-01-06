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
            'title' => 'PA Auto Inspection Stations - Find an auto inspection station near you in Pennsylvania'
        ]);
    }

    public function viewSearchPage(){

        return view('search',[
           // 'stations' =>cache('stations')/*  Station::all() */,
            'title' => 'PA Auto Inspection Station Search - Search for an auto inspection station near you in Pennsylvania',
        ]);
    }

    /* public function getStations(){
        return response()->json(['stations' => Station::all()]);
    } */

    //search api functionality is not currently in use but may be useful later
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
            'results' => $result,
            'type' => $searchType,
        ]);
    }
   
}
