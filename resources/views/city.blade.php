@extends('layouts.master')
@section('meta')
<meta type="description" content="View inspection stations in {{$city -> city}}.">
@endsection
@section('content')

<div class="col-sm-10 text-center mx-auto bg-white my-4 p-4 shadow">
    <h1>Stations in {{$city -> city}}, PA </h1>
    <p>There are {{$city -> city_count}} inspection stations in {{$city -> city}}.
    <br>{{$city -> city}} is within <a class="text-black" href="/counties/county/{{$city->county->county_slug}}">{{$city -> county ->county}} County.</a>
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
                @foreach ($stations as $station)
                    <tr>
                        <td> <a class="text-black" href="/stations/station/{{$station -> station_name_slug}}"> {{$station -> station_name}} </a> </td>
                        <td> {{$station -> phone_number}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$stations -> links('pagination::bootstrap-5')}}
    </div>
   
</div>

@endsection