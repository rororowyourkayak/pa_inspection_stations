@extends('layouts.master')
@section('meta')
<meta type="description" content="View cities in PA with inspection stations.">
@endsection
@section('content')

<div class="col-sm-10 bg-white my-4 p-4 text-center mx-auto shadow">
    <h1>PA Inspection Cities</h1>
    <p>This page contains information about the cities in PA with inspection stations.</p>
    <p>Clicking on a city name will take you to a more detailed page about that city.</p>
    <h4>Looking for a specific city?</h4>
        <h4><a href="/search">Go to Station Finder>></a></h4>
</div>
<div class="col-sm-10 bg-white my-4 p-4 text-center mx-auto shadow">
    <h3>Top 20 Cities in PA by Inspection Station Count:</h3><br>
    <div class="container">
        <table class="table table-response-sm  table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>City Name</th>
                    <th>Stations in City</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($top20 as $city)
                <tr>
                    <td><a class="text-black" href="/cities/city/{{$city->city_slug}}">{{$city->city}}</a></td>
                    <td> {{$city->city_count}} </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div class="col-sm-10 bg-white my-4 p-4 text-center mx-auto shadow">
    <h3>List of All Cities in PA:</h3>
    <p>Below is a list of all cities in PA and their inspection counts, broken up into pages.
    </p>
    <div class="container">
        <table class="table table-response-sm  table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>City Name</th>
                    <th>Stations in City</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($cities as $city)
                <tr>
                    <td><a class="text-black" href="/cities/city/{{$city->city_slug}}">{{$city->city}}</a></td>
                    <td> {{$city->city_count}} </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{$cities -> links('pagination::bootstrap-5')}}
    </div>
</div>

@endsection