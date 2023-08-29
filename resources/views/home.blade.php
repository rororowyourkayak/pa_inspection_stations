@extends('layouts.master')

@section('content')

    <div class="col-sm-12 mx-auto text-center bg-white py-4 my-4">
        <h1>PA Safety Inspection Centers</h1>
        <p>In Pennsylvania, there are <b>{{$stationsCount}}</b> safety inspection stations across <b>{{$citiesCount}}</b> cities across <b>{{$countiesCount}}</b> counties.
           
    </div>

    <div id="tool"> <inspection-search></inspection-search> </div>

    
    

{{--     <div class="card col-sm-10 text-center mx-auto ">
        <div class="card-header custom-blue-bg text-white fw-bold">Inspection Station Finder</div>
        <div class="card-body">
            <div class="container">
                <form id="inspectionFinder" action="">
                    <p id="feedback" class="text-danger"></p>
                    <div class="row">
                        <label for="countySelect" class="form-label">Select County:</label>
                        <select name="county" id="countySelect" class="form-select">
                            <option selected value=''> -- select a county -- </option>
                            @foreach ($counties as $county_slug => $county)
                            <option value="{{$county_slug}}"> {{$county}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mt-4">
                        <label for="citySelect" class="form-label">Select City:</label>
                        <select name="city" id="citySelect" class="form-select">
                            <option selected value=''> -- select a city -- </option>
                        </select>
                    </div>

                    <div class="row mt-4">
                        <label for="stationSelect" class="form-label">Select station:</label>
                        <select name="station" id="stationSelect" class="form-select">
                            <option selected value=''> -- select a station -- </option>
                        </select>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-4 mx-auto">
                            <button type="submit" class="btn btn-dark w-100">Go</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div> --}}

@endsection

@section('scripts')


@endsection