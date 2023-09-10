@extends('layouts.master')

@section('meta')
<meta type="description" content="PA Auto Safety Inspection Stations Home.">
@endsection
@section('content')

    <div class="col-sm-12 mx-auto text-center bg-white py-4 my-4">
        <h1>PA Auto Safety Inspection Stations</h1>
        <p>This site serves to provide users with easier access to information about inspection stations in PA.
            <br> Using the navigation above, you may view links to find specific stations by name, as well as counties and cities.
            <br> The search tool below allows you to direclty search our site to find stations you may be looking for. 
        </p>

        <p>In Pennsylvania, there are <b>{{$stationsCount}}</b> safety inspection stations across <b>{{$citiesCount}}</b> cities across <b>{{$countiesCount}}</b> counties.
           
    </div>

    


@endsection

