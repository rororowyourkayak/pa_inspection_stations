@extends('layouts.master')
@section('meta')
<meta type="description" content="View information about {{$station->station_name}}.">
@endsection
@section('content')

<div class=" col-sm-8 my-4 py-4 bg-white mx-auto text-center">
    <h1>{{$station->station_name}}</h1>
    <h6>{{$station->station_street_address}}</h6>
    <h6>{{$station->station_city}}, PA {{$station->station_zip_plus_4}}</h6>
    <div class="row mt-4">
        <div class="col-sm-4 ms-auto">
            <h4>Phone Number:</h4>
            <p>{{$station->phone_number}}</p>
        </div>
        <div class="col-sm-4 me-auto">
            <h4>OIS Number:</h4>
            <p>{{$station->ois_number}}</p>
        </div>
    </div>
    <div class="row mt-4">
        <a id="googleSearchBtn" class="btn btn-primary col-sm-4 mx-auto" href ='https://www.google.com/search?q={{$searchQuery}}' target="_blank">Search on Google</a>
    </div>
</div>


<div class=" col-sm-8 my-4 p-4 bg-white mx-auto text-center ">
    <h2>Vehicle Types Inspected</h2>
    <p>The table below shows which types of vehicles are inspected by this station:</p>
    <table class="table table-response-sm table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Vehicle Type</th>
                <th>Inspected by Station?</th>
            </tr>
        </thead>

        <tr>
            <td>Passenger Cars / Light Trucks</td>
            <td>
                @if($station ->passenger_cars_and_light_trucks)
                Yes
                @else
                No
                @endif
            </td>
        </tr>
        <tr>
            <td>Medium Trucks</td>
            <td>
                @if($station ->medium_trucks)
                Yes
                @else
                No
                @endif
            </td>
        </tr>
        <tr>
            <td>Heavy Trucks</td>
            <td>
                @if($station ->heavy_trucks)
                Yes
                @else
                No
                @endif
            </td>
        </tr>
        <tr>
            <td>Motorcycle</td>
            <td>
                @if($station ->motorcycle)
                Yes
                @else
                No
                @endif
            </td>
        </tr>
        <tr>
            <td>Trailer 10,000 lbs. or less</td>
            <td>
                @if($station ->trailer_less_10000)
                Yes
                @else
                No
                @endif
            </td>
        </tr>
        <tr>
            <td>Trailer 10,000 lbs. or more</td>
            <td>
                @if($station ->trailer_greater_10000)
                Yes
                @else
                No
                @endif
            </td>
        </tr>

    </table>
</div>






@endsection