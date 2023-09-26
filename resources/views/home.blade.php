@extends('layouts.master')

@section('meta')
<meta type="description" content="PA Auto Safety Inspection Stations Home.">
@endsection
@section('content')

    <div class="col-sm-12 mx-auto text-center bg-white py-4 my-4">
        <h1>PA Auto Safety Inspection Stations</h1>
        <p>In Pennsylvania, there are <b>{{$stationsCount}}</b> safety inspection stations across <b>{{$citiesCount}}</b> cities across <b>{{$countiesCount}}</b> counties.
        <p>This site serves to provide users with easier access to information about inspection stations in PA.
            <br> Using the navigation above, you may view links to find specific stations by name, as well as counties and cities.
            <br> Our built-in search tool allows you to search for a stations by name, county, or city. 
        </p>
        <h3 ><a href="/search" >Go to Station Finder>></a></h3>

        
           
    </div>

    <div class="container my-4">
        <div class="row ">
            <div class="col-sm-3 text-center py-4 bg-white mx-auto shadow">
                <h4>Looking for stations?</h4>
                <p>View our <a href="/stations">Stations</a> page.</p>
            </div>
            <div class="col-sm-3 text-center py-4 bg-white mx-auto shadow">
                <h4>Looking for counties?</h4>
                <p>View our <a href="/counties">Counties</a> page.</p>
            </div>
            <div class="col-sm-3 text-center py-4 bg-white mx-auto shadow">
                <h4>Looking for cities?</h4>
                <p>View our <a href="/cities">Cities</a> page.</p>
            </div>
        </div>
    </div>
    


@endsection

