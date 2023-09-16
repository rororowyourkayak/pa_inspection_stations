@extends('layouts.master')

@section('meta')
<meta type="description" content="Search the PA Safety Inspection Stations.">
@endsection

@section('content')

<div id="tool"> <inspection-search :stations='{{$stations}}'></inspection-search> </div>
@endsection