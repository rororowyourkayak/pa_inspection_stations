<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function viewStation($stationNameSlug)
    {
        $station = Station::where('station_name_slug', $stationNameSlug)->first();

        $station_name = $station -> station_name;
        $station_name_pieces = explode(' ', $station_name);
        $search_query = implode('+', $station_name_pieces);

        $station_city = $station -> city;
        $station_city_pieces = explode(' ', $station_city);
        $search_query .= '+' . implode('+', $station_city_pieces) . ',+PA';

        return view('station',
            ['station' => $station,
                'title' => $station->station_name,
                'searchQuery' => $search_query,
            ]);
    }

    public function viewStations()
    {
        $stations = Station::orderBy('station_name', 'ASC')->paginate(10);
        return view('stations', ['stations' => $stations,
            'title' => 'Inspection Stations',
        ]);
    }

    public function viewCounty($countyNameSlug)
    {
        $county = County::where('county_slug', $countyNameSlug)->first();

        return view('county', ['county' => $county,
            'title' => 'Stations in ' . $county->county . ' County, PA',
        ]);
    }

    public function viewCounties()
    {
        $counties = County::orderBy('county', 'ASC')->paginate(10);
        return view('counties', ['counties' => $counties,
            'title' => 'Counties',
        ]);
    }

    public function viewCity($cityNameSlug)
    {
        $city = City::where('city_slug', $cityNameSlug)->first();
        return view('city', ['city' => $city,
            'title' => 'Stations in ' . $city->city . ', PA',
        ]);
    }

    public function viewCities()
    {
        $cities = City::orderBy('city', 'ASC')->paginate(10);
        return view('cities', ['cities' => $cities,
            'title' => 'Cities',
        ]);
    }

    public function getCitiesInCounty()
    {

        $request = request()->validate([
            'county' => ['required', 'string', 'max: 30'],
        ]);

        $county = County::where('county_slug', $request["county"])->first();

        return response()->json($county->cities);
    }

    public function getStationsIncity()
    {

        $request = request()->validate([
            'city' => ['required', 'string', 'max: 30'],
        ]);

        $city = City::where('city_slug', $request["city"])->first();

        return response()->json($city->stations);
    }
}
