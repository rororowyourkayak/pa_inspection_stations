@extends('layouts.master')

@section('content')

    <div class="col-sm-12 mx-auto text-center bg-white py-4 my-4">
        <h1>PA Safety Inspection Centers</h1>
        <p> As of {{config('metadata.dataAsOf')}}, there are {{$stationsCount}} safety inspection stations in PA.</p>
    </div>


<div class="container">
    <div class="card col-sm-10 text-center mx-auto ">
        <div class="card-header custom-blue-bg text-white fw-bold">Inspection Station Finder</div>
        <div class="card-body">
            

            <div class="container">
                <form id="inspectionFinder" action="">
                    <p id="feedback" class="text-danger"></p>
                    <div class="row">
                        <label for="countySelect" class="form-label">Select County:</label>
                        <select name="county" id="countySelect" class="form-select">
                            <option selected value=''> -- select a county -- </option>
                            @foreach ($counties as $county)
                            <option value="{{$county->county_slug}}"> {{$county->county}} </option>
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
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script type="module">
    $(document).ready(function(){

    if($("#countySelect").val()) {
      changeCities($("#countySelect").val(),false);
    }   
    if($("#citySelect").val()) {
      changeStations($("#citySelect").val(),false);
    }    
    

    $("#inspectionFinder").on('submit', function(e){
        e.preventDefault();
        $("#feedback").text("");
        var county = $("#countySelect").val();
        var city = $("#citySelect").val();
        var station = $("#stationSelect").val();

        if(station){
            window.location.href = '/stations/' + station;
        }
        else if(city) {
            window.location.href = '/cities/' + city;
        }
        else if(county){
            window.location.href = '/counties/' + county;
        }
        else{
            $('#feedback').text("Please select at least a county option to use the finder.");
        }
    });

    $("#countySelect").on("change", function () {
       // console.log($(this).val());
        var county = $(this).children("option:selected").val();
        changeCities(county,true);
    });

    $("#citySelect").on("change", function () {
        var city = $(this).children("option:selected").val();
        changeStations(city,true);
    });
});

function changeCities(county, shouldEmpty){
    if(county){
    $.ajax({
            method: 'GET',
            url: '/cities_in_county' ,
            data: {county : county},
            success: function(response){
                /* console.log(response); */
                if(shouldEmpty){
                    $("#citySelect").empty();
                }
                $("#citySelect").append('<option selected value=""> -- select a city -- </option>');
                for(var city of response){
                    /* console.log(city.city); */
                    
                    var option = $('<option></option>').attr("value", city.city_slug).text(city.city);
                    $("#citySelect").append(option);
                }
            }
    });
}
else{
    $("#citySelect").empty();
}
}

function changeStations(city, shouldEmpty){
    if(city){
    $.ajax({
            method: 'GET',
            url: '/stations_in_city' ,
            data: {city : city},
            success: function(response){
                /* console.log(response); */
                if(shouldEmpty){
                $("#stationSelect").empty();
                }
                $("#stationSelect").append('<option selected value=""> -- select a station -- </option>');
                for(var station of response){
                    /* console.log(station.station); */
                    
                    var option = $('<option></option>').attr("value", station.station_name_slug).text(station.station_name);
                    $("#stationSelect").append(option);
                }
            }
    });
}
else{
    $("#stationSelect").empty();
}
}

</script>

@endsection