@extends('layouts.master')

@section('content')

<h1>Stations in {{$county -> county}} County, PA </h1>

<table class="table table-response-sm table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Station</th>
            <th>City</th>
            <th>Phone Number</th>

        </tr>
    </thead>

    
</table>

@endsection
