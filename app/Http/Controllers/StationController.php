<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    private $paginationLimit = 25;

    public function viewStation($stationNameSlug)
    {
        $station = Station::where('station_name_slug', $stationNameSlug)->first();

        $station_name = $station -> station_name;
        $station_name_pieces = explode(' ', $station_name);
        if($station_name_pieces[0][0] == '#'){unset($station_name_pieces[0]);}
        $search_query = implode('+', $station_name_pieces);

        $station_city = $station -> city;
        $station_city_pieces = explode(' ', $station_city);
        $search_query .= '+' . implode('+', $station_city_pieces) . ',+PA';

        $inspectionTypes = [
            'Passenger Cars / Light Trucks' => $station -> passenger_cars_and_light_trucks ? 'Yes' : 'No',
            'Medium Trucks' => $station -> medium_trucks ? 'Yes' : 'No',
            'Heavy Trucks' => $station -> heavy_trucks ? 'Yes' : 'No',
            'Motorcycles' => $station -> motorcycle ? 'Yes' : 'No',
            'Trailer 10,000 lbs. or less' => $station -> trailer_less_10000 ? 'Yes' : 'No',
            'Trailer 10,000 lbs. or more' => $station -> trailer_greater_10000 ? 'Yes' : 'No',
        ];

        $city = $station->parentCity;
        
        $stationsInCity = $city->stations()->paginate($this->paginationLimit);
        
        
        return view('station',
            ['station' => $station,
                'title' => $station->station_name . ' Auto Inspection Station',
                'searchQuery' => $search_query,
                'inspectionTypes' => $inspectionTypes,
                'stationsInCity' => $stationsInCity
            ]);
    }

    public function viewStations()
    {
        $stations = Station::orderBy('station_name', 'ASC')->paginate($this->paginationLimit);
        return view('stations', ['stations' => $stations,
            'title' => 'PA Auto Inspection Stations List - Find an auto inspection station in Pennsylvania',
        ]);
    }

    public function viewCounty($countyNameSlug)
    {
        $county = County::where('county_slug', $countyNameSlug)->first();
        $stations = $county->stations()->paginate($this->paginationLimit);
        $cities = $county->cities()->paginate($this->paginationLimit);
        
        return view('county', ['county' => $county,
            'title' => 'Auto Safety Inspection Stations in ' . $county->county . ' County, PA',
            'stations' => $stations,
            'cities' => $cities
        ]);
    }

    public function viewCounties()
    {
        $counties = County::orderBy('county', 'ASC')->paginate($this->paginationLimit);
        $top20 = County::orderBy('county_count', 'DESC')->limit(20)->get();
        return view('counties', ['counties' => $counties,
            'title' => 'PA Auto Inspection Counties - Find counties in Pennsylvania with Auto Inspection Stations',
            'top20' => $top20,
        ]);
    }

    public function viewCity($cityNameSlug)
    {
        $city = City::where('city_slug', $cityNameSlug)->first();
        $stations = $city->stations()->paginate($this->paginationLimit);
        return view('city', ['city' => $city,
            'title' => 'Auto Safety Inspection Stations in ' . $city->city . ', PA',
            'stations' => $stations,
        ]);
    }

    public function viewCities()
    {
        $cities = City::orderBy('city', 'ASC')->paginate($this->paginationLimit);
        $top20 = City::orderBy('city_count', 'DESC')->limit(20)->get();
        return view('cities', ['cities' => $cities,
            'title' => 'PA Auto Inspection Cities - Find cities in Pennsylvania with Auto Safety Inspection Stations',
            'top20' => $top20,
        ]);
    }

}
