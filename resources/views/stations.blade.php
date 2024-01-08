@extends('layouts.master')

@section('meta')
<meta type="description" content="View a list of all the PA inspection stations.">
@endsection

@section('content')

<div id="pageContainer" class="container col-sm-8 bg-white my-4 p-4 text-center shadow">
    <h1>PA Safety Inspection Stations</h1>
    
    <p>Safety inspection stations can conduct inspections based on five main categories: 

        <li>Passenger Cars / Light Trucks</li>
        <li>Medium Trucks</li>
        <li>Heavy Trucks</li>
        <li>Motorcycles</li>
        <li>Trailers 10,000 lbs. or less</li>
        <li>Trailers 10,000 lbs. or more</li>

        Each station listed on our page has information on which types of inspections they support.
        <br> For information about prices, appointments, etc... please reach out to the stations directly. 
        <br> Station phone number and google search info are available on individual station pages. 
        <br> Find more information about auto safety inspections <a href="{{url('/')}}">here</a>.
        <br> Below is a master list of all stations stored in our database.
        
        
    </p>

    <h4>Looking for a specific station?</h4>
        <h4><a href="/search">Go to Station Finder>></a></h4>
</div>
<div class="col-sm-8 mx-auto text-center bg-white py-4 my-4 shadow">

    <h2>List of All Safety Inspection Stations</h2>
    <div class="table-container col-sm-12 p-4">
        <table id="stationsTable" class="table table-responsive-sm table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Station Name</th>
                    <th>County</th>
                    <th>City </th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stations as $s)
                <tr>
                    <td><a class="text-dark" href="/stations/station/{{$s->station_name_slug}}">{{$s -> station_name}}</a></td>
                    <td><a class="text-dark" href="/counties/county/{{$s->county_slug}}">{{$s -> county}}</a></td>
                    <td><a class="text-dark" href="/cities/city/{{$s->city_slug}}">{{$s -> city}}</a></td>
                    <td>{{$s -> phone_number}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$stations -> links('pagination::bootstrap-5')}}
    </div>

</div>
@endsection

@section('scripts')
<style>
    @media screen and (max-width: 650px) {

        #stationsTable th,
        #stationsTable thead {
            display: none;
        }

        #stationsTable td {
            display: block;
        }

        #stationsTable ::before {
            font-weight: bold;
        }

        #stationsTable td:nth-of-type(1):before {
            content: 'Station Name: ';
        }

        #stationsTable td:nth-of-type(2):before {
            content: 'County: ';
        }

        #stationsTable td:nth-of-type(3):before {
            content: 'City: ';
        }

        #stationsTable td:nth-of-type(4):before {
            content: 'Phone Number: ';
        }
    }
</style>
@endsection