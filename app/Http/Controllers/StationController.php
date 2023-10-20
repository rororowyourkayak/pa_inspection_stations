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
        if($station_name_pieces[0][0] == '#'){unset($station_name_pieces[0]);}
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
        $stations = Station::orderBy('station_name', 'ASC')->paginate(20);
        return view('stations', ['stations' => $stations,
            'title' => 'Inspection Stations',
        ]);
    }

    public function viewCounty($countyNameSlug)
    {
        $county = County::where('county_slug', $countyNameSlug)->first();
        $stations = $county->stations()->paginate('20');
        return view('county', ['county' => $county,
            'title' => 'Stations in ' . $county->county . ' County, PA',
            'stations' => $stations,
        ]);
    }

    public function viewCounties()
    {
        $counties = County::orderBy('county', 'ASC')->paginate(20);
        return view('counties', ['counties' => $counties,
            'title' => 'Counties',
        ]);
    }

    public function viewCity($cityNameSlug)
    {
        $city = City::where('city_slug', $cityNameSlug)->first();
        $stations = $city->stations()->paginate('20');
        return view('city', ['city' => $city,
            'title' => 'Stations in ' . $city->city . ', PA',
            'stations' => $stations,
        ]);
    }

    public function viewCities()
    {
        $cities = City::orderBy('city', 'ASC')->paginate(20);
        return view('cities', ['cities' => $cities,
            'title' => 'Cities',
        ]);
    }

}
