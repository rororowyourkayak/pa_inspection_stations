@extends('layouts.master')
@section('meta')
<meta type="description" content="View information about {{$station->station_name}}.">
@endsection
@section('content')

<div class=" col-sm-8 my-4 py-4 bg-white mx-auto text-center shadow">
    <h1>{{$station->station_name}}</h1>
    <h6>{{$station->station_street_address}}</h6>
    <h6>{{$station->city}}, PA {{$station->station_zip_plus_4}}</h6>
    <h6>{{$station->county}} County </h6>
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


<div class=" col-sm-8 my-4 p-4 bg-white mx-auto text-center shadow">
    <h2>Vehicle Types Inspected</h2>
    <p>The table below shows which types of vehicles are inspected by this station:</p>
    <table class="table table-response-sm table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Vehicle Type</th>
                <th>Inspected by Station?</th>
            </tr>
        </thead>

        @foreach ($inspectionTypes as $type => $value)
            <tr>
                <td> {{$type}} </td>
                <td> {{$value}} </td>
            </tr>
        @endforeach

    </table>
</div>






@endsection