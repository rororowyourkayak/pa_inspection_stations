@extends('layouts.master')

@section('meta')
<meta type="description" content="View a list of all the PA inspection stations.">
@endsection

@section('content')

<div  id="pageContainer" class="container col-sm-8 bg-white my-4 p-4 text-center shadow">
    <h1>PA Safety Inspection Stations</h1>
    <p>This page displays of all stations, sorted by station name:</p>

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
                    <td><a class="text-dark" href="/stations/{{$s->station_name_slug}}">{{$s -> station_name}}</a></td>
                    <td><a class="text-dark" href="/counties/{{$s->county_slug}}">{{$s -> county}}</a></td>
                    <td><a class="text-dark" href="/cities/{{$s->city_slug}}">{{$s -> city}}</a></td>
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
    #stationsTable th, #stationsTable thead{
        display: none;
    }
    #stationsTable td {
        display: block;
    }

    #stationsTable ::before{
        font-weight: bold;
    }
    #stationsTable td:nth-of-type(1):before{
        content: 'Station Name: ';
    }
    #stationsTable td:nth-of-type(2):before{
        content: 'County: ';
    }
    #stationsTable td:nth-of-type(3):before{
        content: 'City: ';
    }
    #stationsTable td:nth-of-type(4):before{
        content: 'Phone Number: ';
    }
}
    </style>
@endsection
