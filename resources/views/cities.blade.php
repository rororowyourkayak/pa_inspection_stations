@extends('layouts.master')

@section('content')
<div class="col-sm-8 mx-auto bg-white my-4 p-4 text-center shadow">
    <h1>PA Inspection Cities</h1>
    <p>Below are the cities of PA and their inspection stations counts.
        <br> Clicking on a city name will take you to a more detailed page about that city.
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
                         <td><a class="text-black" href="/cities/{{$city->city_slug}}">{{$city->city}}</a></td>
                        <td> {{$city->city_count}} </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        {{$cities -> links('pagination::bootstrap-5')}}
    </div>
</div>


@endsection