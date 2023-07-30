@extends('layouts.master')

@section('content')
<div class="container bg-white my-4 p-4 text-center">
    <h1>PA Safety Inspection Stations</h1>
    <p>This page displays of all stations, sorted by station name.</p>

    <div class="container p-4">
    <table class="table table-response-sm table-striped table-bordered">
        <thead class="table-primary">
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
                    <td><a class="text-dark" href="/stations/{{$s->station_name_slug}}">{{$s -> station_name}}</a></td>
                    <td>{{$s -> county}}</td>
                    <td>{{$s -> station_city}}</td>
                    <td>{{$s -> phone_number}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$stations -> links('pagination::bootstrap-5')}}
</div>

</div>
@endsection