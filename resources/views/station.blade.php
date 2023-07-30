@extends('layouts.master')

@section('content')
<div class="col-sm-8 my-4 py-4 bg-white mx-auto text-center custom-blue-border rounded">
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
</div>

<div class="row">


<div class="col-sm-8 my-4 p-4 bg-white mx-auto text-center custom-blue-border rounded">
    <table class="table table-response-sm table-striped table-bordered ">
        <thead class="thead custom-blue-bg">
            <tr>
                <th>Vehicle Type</th>
                <th>Inspected by Station</th>
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
</div>



@endsection