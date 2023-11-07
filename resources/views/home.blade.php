@extends('layouts.master')

@section('meta')
<meta type="description" content="PA Auto Safety Inspection Stations Home.">
@endsection
@section('content')

<div class="col-sm-9 mx-auto text-center bg-white py-4 my-4 shadow">
    <h1>PA Auto Safety Inspection Stations</h1>
    <p>In Pennsylvania, there are <b>{{$stationsCount}}</b> safety inspection stations across <b>{{$citiesCount}}</b>
        cities across <b>{{$countiesCount}}</b> counties.
    <p>This site serves to provide users with easier access to information about inspection stations in PA.
        <br> Using the navigation above, you may view links to find specific stations by name, as well as counties and
        cities.
        <br> Our built-in search tool allows you to search for a stations by name, county, or city.
    </p>
    <h3><a href="/search">Go to Station Finder>></a></h3>

    <div class="row my-4">
        <div class="col-sm-3 text-center py-4 bg-white mx-auto  mw-auto">
            <h4>Looking for stations?</h4>
            <p>View our <a href="/stations">Stations</a> page.</p>
        </div>
        <div class="col-sm-3 text-center py-4 bg-white mx-auto  mw-auto">
            <h4>Looking for counties?</h4>
            <p>View our <a href="/counties">Counties</a> page.</p>
        </div>
        <div class="col-sm-3 text-center py-4 bg-white mx-auto  mw-auto">
            <h4> Looking for cities?</h4>
            <p>View our <a href="/cities">Cities</a> page.</p>
        </div>
    </div>

</div>

<div class="col-sm-9 mx-auto text-center bg-white py-4 my-4 shadow">
    <h2>About Safety Inspections</h2>
    <div class="col-sm-10 mx-auto mb-4">
        <p>
            Most automotive vehicles in Pennsylvania require either annual or semi-annual safety inspections
            by an official inspection station. Information about which vehicles need which inspection frequency is
            listed below.</p>

        <p> (The following information was retrieved from the <a
                href="https://www.dot.state.pa.us/Public/DVSPubsForms/BMV/BMV%20Manuals/Pub_45%20Inspections%20Regulations/PUB-45.pdf"
                target="_blank">Vehicle Equipment and
                Inspection Regulations</a> document from PennDOT.)
        </p>
    </div>

    <div class="col-sm-8 mx-auto">
        <table class="table table-response-sm table-bordered">
            <thead>
                <tr class="table-danger">
                    <td>
                        <h4>Vehicle Types Where Inspection Not Required</h4>
                    </td>
                </tr>
            </thead>

            <tr>
                <td>Special mobile equipment.</td>
            </tr>
            <tr>
                <td>An implement of husbandry.</td>
            </tr>
            <tr>
                <td>A motor vehicle being towed.</td>
            </tr>
            <tr>
                <td>A motor vehicle being driven or a trailer being towed by an official inspection station owner or
                    employee for the purpose of inspection.</td>
            </tr>
            <tr>
                <td>A trailer having a registered gross weight of 3,000 pounds or less.</td>
            </tr>
            <tr>
                <td>A motorized pedalcycle.</td>
            </tr>
            <tr>
                <td>A vehicle being repossessed by a financer or collector-repossessor through the use of miscel laneous
                    motor vehicle business registration plates.</td>
            </tr>
            <tr>
                <td>A new vehicle while it is in the process of manufacture including testing, and not in transit from
                    the
                    manufacturer to a purchaser or dealer.</td>
            </tr>
            <tr>
                <td>A military vehicle used for training by a private, nonprofit, tax-exempt military educational
                    institution when the vehicle does not travel on public roads in excess of 1 mile and when the
                    property
                    on both sides of the public road is owned by the institution.</td>
            </tr>
            <tr>
                <td>An antique vehicle. </td>
            </tr>
        </table>
    </div>

    <div class="col-sm-8 mx-auto">
        <table class="table table-response-sm table-bordered">
            <thead>
                <tr class="table-warning">
                    <td>
                        <h4>Semi-Annual Inspections
                    </td>
                </tr>
            </thead>

            <tr>
                <td>School buses, vehicles which are under contract with or owned by a school district or a private or parochial school,
                    including vehicles having chartered group and party rights under the Public Utility Commission and used to transport
                    school students; passenger vans used to transport persons for hire or owned by a commercial enterprise and used
                    for the transportation of employees to or from their place of employment; and mass transit vehicles and motor carrier
                    vehicles with a registered gross weight in excess of 17,000 pounds, other than farm vehicles for which a biennial
                    certificate of exemption has been issued shall be subject to semi-annual inspection. </td>
            </tr>
            
        </table>
    </div>
    <div class="col-sm-8 mx-auto">
        <table class="table table-response-sm table-bordered">
            <thead>
                <tr class="table-primary">
                    <td>
                        <h4>Annual Inspections
                    </td>
                </tr>
            </thead>

            <tr>
                <td>Other vehicles, including motor homes, emergency vehicles and private noncommercial vehicles used to transport
                    students, shall be inspected annually. Motor homes and emergency vehicles built on a truck chassis shall be
                    inspected according to the appropriate truck inspection procedure based on the registered gross weight of the
                    vehicle.</td>
            </tr>
            
        </table>
    </div>
</div>


@endsection