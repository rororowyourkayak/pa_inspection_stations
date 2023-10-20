@extends('layouts.master')
@section('meta')
<meta type="description" content="View inspection stations in {{$county -> county}} county.">
@endsection
@section('content')

<div class="col-sm-8 text-center mx-auto bg-white my-4 p-4 shadow">
    <h1>Stations in {{$county -> county}} County, PA </h1>
    <p>There are {{$county -> county_count}} inspection stations in {{$county -> county}} county.</p>

    <div class="container my-4">
        <table id="countyTable" class="table table-response-sm table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Station</th>
                    <th>City</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stations as $station)
                    <tr>
                        <td> <a class="text-black" href="/stations/{{$station ->station_name_slug}}"> {{$station -> station_name}} </a> </td>
                        <td> <a class="text-black" href="/cities/{{$station ->city_slug}}">{{$station -> city}}</a> </td>
                        <td> {{$station -> phone_number}} </td>
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
@media screen and (max-width: 650px){
#countyTable th, #countyTable thead{
    display: none;
}
#countyTable td {
    display: block;
}

#countyTable ::before{
    font-weight: bold;
}
#countyTable td:nth-of-type(1):before{
    content: 'Station Name: ';
}
#countyTable td:nth-of-type(2):before{
    content: 'City: ';
}
#countyTable td:nth-of-type(3):before{
    content: 'Phone Number: ';
}
}
</style>
@endsection