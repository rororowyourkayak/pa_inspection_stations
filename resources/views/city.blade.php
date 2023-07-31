@extends('layouts.master')

@section('content')

<div class="col-sm-8 text-center mx-auto bg-white my-4 p-4">
    <h1>Stations in {{$city -> city}}, PA </h1>
    <p>There are {{$city -> city_count}} inspection stations in {{$city -> city}}.
    <br>{{$city -> city}} is within <a class="text-black" href="/counties/{{$city->county_slug}}">{{$city -> county}} County.</a>
    </p>

    <div class="container my-4">
        <table class="table table-response-sm table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Station</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($city->stations as $station)
                    <tr>
                        <td> <a class="text-black" href="/stations/{{$station -> station_name_slug}}"> {{$station -> station_name}} </a> </td>
                        <td> {{$station -> phone_number}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
</div>

@endsection