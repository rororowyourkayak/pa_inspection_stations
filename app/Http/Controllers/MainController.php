<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\County;
use App\Models\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    
    public function processSearch(){
    
        $validator = Validator::make(request()->input(), [
            'search' => ['required','string', 'nullable', 'max:20'],
            'type' => ['required', 'string', 'max:10']
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $info = $validator->validated();
        $searchText = $info['search'];
        $searchTextSlug = Str::slug($searchText);
        $searchType = $info['type'];
        $column = '';
        switch ($searchType) {
            case 'name':
                $column = 'station_name_slug';
                break;
            case 'county':
                $column = 'county_slug';
                break;
                
            case 'city':
                $column = 'city_slug';
                break;
            default:
                return response()->json(['errors' => ['invalidSearchType'=> 'Search type is not valid for this endpoint.']], 422);
                break;
        }
        
        $query = Station::where($column, 'LIKE', "$searchTextSlug%")->orderBy($column, 'ASC');
        

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
