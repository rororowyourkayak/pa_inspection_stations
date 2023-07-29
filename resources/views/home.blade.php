@extends('layouts.master')

@section('content')
<div class="container-fluid my-4 inter">
    <div class="col-sm-12 mx-auto rounded text-center bg-white py-4">
        <h1>PA Safety Inspection Centers</h1>
        <p> As of {{$asOf}}, there are {{$stationsCount}} safety inspection stations in PA.</p>
    </div>
</div>
    
   
@endsection