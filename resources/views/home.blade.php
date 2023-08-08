@extends('layouts.master')

@section('header')
<title>PA Inspection Stations</title>
@endsection

@section('content')
<div class="container-fluid my-4">
    <div class="col-sm-12 mx-auto text-center bg-white py-4">
        <h1>PA Safety Inspection Centers</h1>
        <p> As of {{$asOf}}, there are {{$stationsCount}} safety inspection stations in PA.</p>
    </div>
</div>

<div class="container">
    <div class="card col-sm-10 mx-auto">
        <div class="card-header text-center fw-bold">Inspection Search</div>
        <div class="card-body">

            <div class="container">
                <form action="">
                    <div class="row">
                        <label for="countySelect" class="form-label">Select County:</label>
                        <select name="county" id="countySelect" class="form-select">
                            <option hidden disabled selected> -- select a county -- </option>
                            @foreach ($counties as $county)
                            <option value="{{$county->county_slug}}"> {{$county->county}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mt-4">
                        <label for="countySelect" class="form-label">Select City:</label>
                        <select name="city" id="citySelect" class="form-select">
                            <option hidden disabled selected> -- select a city -- </option>
                        </select>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-dark w-100">Search</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="module">
    $(document).ready(function(){

    $("#countySelect").on("change", function () {
        var county = $(this).children("option:selected").val();
        $.ajax({
            method: 'GET',
            url: '/cities_in_county' ,
            data: {county : county},
            success: function(response){
                /* console.log(response); */
                $("#citySelect").empty();
                
                for(var city of response){
                    /* console.log(city.city); */
                    $("#citySelect").append('<option hidden disabled selected> -- select a city -- </option>');
                    var option = $('<option></option>').attr("value", city.city_slug).text(city.city);
                    $("#citySelect").append(option);
                }
            }
        });
    });

});


</script>

@endsection