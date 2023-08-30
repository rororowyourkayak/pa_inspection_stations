@extends('layouts.master')

@section('content')

<div class="col-sm-8 bg-white my-4 p-4 text-center mx-auto shadow">
    <h1>PA Inspection Counties</h1>
    <p>Below are the counties of PA and their inspection stations counts.
        <br> Clicking on a county name will take you to a more detailed page about that county.
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