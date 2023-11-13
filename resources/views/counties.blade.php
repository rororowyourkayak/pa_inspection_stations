@extends('layouts.master')
@section('meta')
<meta type="description" content="View counties in pA with inspection stations.">
@endsection
@section('content')

<div class="col-sm-8 bg-white my-4 p-4 text-center mx-auto shadow">
    <h1>PA Inspection Counties</h1>
    <p>This page contains information about the counties in PA with inspection stations.</p>
    <p>Clicking on a county name will take you to a more detailed page about that county.</p>
</div>
<div class="col-sm-8 bg-white my-4 p-4 text-center mx-auto shadow">
    <h3>Top 20 Counties in PA by Inspection Station Count:</h3><br>
    <div class="container">
        <table class="table table-response-sm  table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>County Name</th>
                    <th>Stations in County</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($top20 as $county)
                <tr>
                    <td><a class="text-black" href="/counties/{{$county->county_slug}}">{{$county->county}}</a></td>
                    <td> {{$county->county_count}} </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div class="col-sm-8 bg-white my-4 p-4 text-center mx-auto shadow">
    <h3>List of All Counties in PA:</h3>
    <p>Below is a list of all cities in PA and their inspection counts, broken up into pages.
    </p>
    <div class="container">
        <table class="table table-response-sm  table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>County Name</th>
                    <th>Stations in County</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($counties as $county)
                <tr>
                    <td><a class="text-black" href="/counties/{{$county->county_slug}}">{{$county->county}}</a></td>
                    <td> {{$county->county_count}} </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{$counties -> links('pagination::bootstrap-5')}}
    </div>
</div>

@endsection