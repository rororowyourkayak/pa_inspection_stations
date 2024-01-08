<template>
    <div class="col-sm-8 mx-auto bg-white my-4 p-4 text-center shadow">
        <h2>Station Finder</h2>
        <p>Use this tool to search for a station, county or city, up to 20 characters.
            <br>To change between search type, use the dropdown to change.
            <br> After typing your query, hit the search icon to run the search.
            <br>You can click the links in each result to learn more.
        </p>
        <div class="col-sm-12 mx-auto">

            <p v-if="emptyText" class="text-danger text-center my-2">
                Please enter at least one character to search.
            </p>
            <div class="input-group">
                <span>
                    <select v-model="searchType" class="input-group-text" name="searchType" id="searchType"
                        @change="changePlaceholderText">
                        <option selected value="name">Name</option>
                        <option value="county">County</option>
                        <option value="city">City</option>

                    </select>
                </span>
                <input v-model="searchText" type="text" name="searchInput" id="searchInput" maxlength="20"
                    class="form-control" :placeholder="placeholderText" @keypress.enter="submitSearch">
                <button type="button" class="input-group-text" id="searchBtn" @click="submitSearch"
                    :disabled="searchIsLoading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>

        </div>
        <div id="resultDisplay" class="col-sm-10 mx-auto my-4">
            <div v-if="responseError" class="alert alert-danger container text-center mx-auto my-4">
                <p>{{ responseErrorText }}</p>
            </div>
            <div v-if="searchIsLoading">
                <div class="spinner-border spinner-border-sm"></div> Loading...
            </div>
            <div v-else>
                <div v-if="resultData.emptyResult" id="emptyMessageBox"
                    class="alert alert-danger container text-center mx-auto my-4">No results from search. Try changing your
                    search
                    text.</div>
                <div v-else-if="resultData.results">
                    <div class="alert alert-success container text-center mx-auto my-4">
                        <b>{{ resultData.results.length }}</b> results matched your search!
                    </div>
                    <div>
                        <div @click.self="redirectStation" v-for="result in resultData.results"
                            class="col-sm-10 mx-auto bg-white my-4 p-4 text-center shadow border border-1 border-primary rounded">
                            <p>Station:
                                <a class="text-dark" :href="'/stations/station/' + result.station_name_slug">{{
                                    result.station_name }}</a>
                            </p>
                            <p>
                                County:
                                <a class="text-dark" :href="'/counties/county/' + result.county_slug">{{ result.county
                                }}</a>
                            </p>
                            <p>
                                City:
                                <a class="text-dark" :href="'/cities/city/' + result.city_slug">{{ result.city }}</a>
                            </p>
                            <p>
                                Phone Number: {{ result.phone_number }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

const defaultResults = {"results":[{"id":5026,"station_county":"DELAWARE","station_name":"Automotive Care Services","ois_number":"HC71","station_address":"111 E BALTIMORE AVE , LANSDOWNE PA 19050","mailing_address":"111 E BALTIMORE AVE , LANSDOWNE PA 19050","phone_number":"610-259-1201","passenger_cars_and_light_trucks":null,"medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"111 E BALTIMORE AVE","station_city":"LANSDOWNE","station_zip":"19050","station_zip_plus_4":"19050","station_name_slug":"automotive-care-services","city":"Lansdowne","county":"Delaware","county_slug":"delaware","city_slug":"lansdowne"},{"id":10477,"station_county":"PHILADELPHIA","station_name":"Automotive Collision & Ser Exp","ois_number":"DN29","station_address":"3101 GRAYS FERRY AVE , PHILADELPHIA PA 19146","mailing_address":"3101 GRAYS FERRY AVE , PHILADELPHIA PA 19146","phone_number":"267-902-0399","passenger_cars_and_light_trucks":null,"medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"3101 GRAYS FERRY AVE","station_city":"PHILADELPHIA","station_zip":"19146","station_zip_plus_4":"19146","station_name_slug":"automotive-collision-ser-exp","city":"Philadelphia","county":"Philadelphia","county_slug":"philadelphia","city_slug":"philadelphia"},{"id":5969,"station_county":"FRANKLIN","station_name":"Automotive Diesel & Equipment Service Llc","ois_number":"CH25","station_address":"301 S ANTRIM WAY , GREENCASTLE PA 17225-1525","mailing_address":"301 S ANTRIM WAY , GREENCASTLE PA 17225-1525","phone_number":"717-729-7389","passenger_cars_and_light_trucks":"X","medium_trucks":"X","heavy_trucks":"X","motorcycle":null,"trailer_less_10000":"X","trailer_greater_10000":"X","station_street_address":"301 S ANTRIM WAY","station_city":"GREENCASTLE","station_zip":"17225","station_zip_plus_4":"17225-1525","station_name_slug":"automotive-diesel-equipment-service-llc","city":"Greencastle","county":"Franklin","county_slug":"franklin","city_slug":"greencastle"},{"id":2845,"station_county":"BUTLER","station_name":"Automotive Excellence Inc","ois_number":"T709","station_address":"107 S WASHINGTON ST , EAU CLAIRE PA 16030-9819","mailing_address":"107 S WASHINGTON ST , EAU CLAIRE PA 16030-9819","phone_number":"724-791-2503","passenger_cars_and_light_trucks":"X","medium_trucks":"X","heavy_trucks":"X","motorcycle":"X","trailer_less_10000":"X","trailer_greater_10000":"X","station_street_address":"107 S WASHINGTON ST","station_city":"EAU CLAIRE","station_zip":"16030","station_zip_plus_4":"16030-9819","station_name_slug":"automotive-excellence-inc","city":"Eau Claire","county":"Butler","county_slug":"butler","city_slug":"eau-claire"},{"id":6988,"station_county":"LANCASTER","station_name":"Automotive Masters Llc","ois_number":"BN39","station_address":"2090 LINCOLN HWY E , LANCASTER PA 17602-3395","mailing_address":"1737 S COLEBROOK RD , MANHEIM PA 17545-8621","phone_number":"717-399-7255","passenger_cars_and_light_trucks":null,"medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":"X","trailer_greater_10000":"X","station_street_address":"2090 LINCOLN HWY E","station_city":"LANCASTER","station_zip":"17602","station_zip_plus_4":"17602-3395","station_name_slug":"automotive-masters-llc","city":"Lancaster","county":"Lancaster","county_slug":"lancaster","city_slug":"lancaster"},{"id":208,"station_county":"ALLEGHENY","station_name":"Automotive Medic","ois_number":"AV80","station_address":"5036 2ND AVE , PITTSBURGH PA\n15207","mailing_address":"5036 2ND AVE , PITTSBURGH PA\n15207","phone_number":"412-422-2886","passenger_cars_and_light_trucks":"X","medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":"X","trailer_greater_10000":null,"station_street_address":"5036 2ND AVE","station_city":"PITTSBURGH","station_zip":"15207","station_zip_plus_4":"15207","station_name_slug":"automotive-medic","city":"Pittsburgh","county":"Allegheny","county_slug":"allegheny","city_slug":"pittsburgh"},{"id":7692,"station_county":"LEBANON","station_name":"Automotive Performance Tuning","ois_number":"AP56","station_address":"30 SOUTH 5TH AVENUE , LEBANON PA 17042","mailing_address":"30 SOUTH 5TH AVENUE , LEBANON PA 17042","phone_number":"717-272-0916","passenger_cars_and_light_trucks":null,"medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"30 SOUTH 5TH AVENUE","station_city":"LEBANON","station_zip":"17042","station_zip_plus_4":"17042","station_name_slug":"automotive-performance-tuning","city":"Lebanon","county":"Lebanon","county_slug":"lebanon","city_slug":"lebanon"},{"id":2305,"station_county":"BUCKS","station_name":"Automotive Plus","ois_number":"9289","station_address":"1004 BLUE SCHOOL RD , PERKASIE PA 18944-3160","mailing_address":"PO BOX 236 , DUBLIN PA 18917-0236","phone_number":"215-249-8466","passenger_cars_and_light_trucks":"X","medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"1004 BLUE SCHOOL RD","station_city":"PERKASIE","station_zip":"18944","station_zip_plus_4":"18944-3160","station_name_slug":"automotive-plus","city":"Perkasie","county":"Bucks","county_slug":"bucks","city_slug":"perkasie"},{"id":5027,"station_county":"DELAWARE","station_name":"Automotive Pwertrain Ind Inc","ois_number":"KR63","station_address":"2311 DARBY RD , HAVERTOWN PA\n19083-2200","mailing_address":"2311 DARBY RD , HAVERTOWN PA\n19083-2200","phone_number":"610-449-2221","passenger_cars_and_light_trucks":"X","medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"2311 DARBY RD","station_city":"HAVERTOWN","station_zip":"19083","station_zip_plus_4":"19083-2200","station_name_slug":"automotive-pwertrain-ind-inc","city":"Havertown","county":"Delaware","county_slug":"delaware","city_slug":"havertown"},{"id":11080,"station_county":"PIKE","station_name":"Automotive Revelations","ois_number":"AR74","station_address":"111 MOUNTAIN SPRINGS RD , MILFORD PA 18337-9536","mailing_address":"111 MOUNTAIN SPRINGS RD , MILFORD PA 18337-9536","phone_number":"570-296-3970","passenger_cars_and_light_trucks":"X","medium_trucks":null,"heavy_trucks":null,"motorcycle":"X","trailer_less_10000":"X","trailer_greater_10000":null,"station_street_address":"111 MOUNTAIN SPRINGS RD","station_city":"MILFORD","station_zip":"18337","station_zip_plus_4":"18337-9536","station_name_slug":"automotive-revelations","city":"Milford","county":"Pike","county_slug":"pike","city_slug":"milford"},{"id":7892,"station_county":"LEHIGH","station_name":"Automotive Ser Solutions Inc","ois_number":"1785","station_address":"50 RACE ST , MACUNGIE PA\n18062-1112","mailing_address":"50 RACE ST , MACUNGIE PA\n18062-1112","phone_number":"610-965-4877","passenger_cars_and_light_trucks":"X","medium_trucks":"X","heavy_trucks":null,"motorcycle":null,"trailer_less_10000":"X","trailer_greater_10000":null,"station_street_address":"50 RACE ST","station_city":"MACUNGIE","station_zip":"18062","station_zip_plus_4":"18062-1112","station_name_slug":"automotive-ser-solutions-inc","city":"Macungie","county":"Lehigh","county_slug":"lehigh","city_slug":"macungie"},{"id":12303,"station_county":"WESTMORELAND","station_name":"Automotive Services Inc.","ois_number":"P936","station_address":"10322 CENTER HIGHWAY , N HUNTINGDON PA 15642","mailing_address":"10322 CENTER HIGHWAY , N HUNTINGDON PA 15642","phone_number":"724-861-5166","passenger_cars_and_light_trucks":"X","medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"10322 CENTER HIGHWAY","station_city":"N HUNTINGDON","station_zip":"15642","station_zip_plus_4":"15642","station_name_slug":"automotive-services-inc","city":"N Huntingdon","county":"Westmoreland","county_slug":"westmoreland","city_slug":"n-huntingdon"},{"id":9243,"station_county":"MONTGOMERY","station_name":"Automotive Solution Inc","ois_number":"AT95","station_address":"2711 LIMEKILN PIKE , GLENSIDE PA\n19038","mailing_address":"2711 LIMEKILN PIKE , GLENSIDE PA 19038","phone_number":"215-884-9727","passenger_cars_and_light_trucks":null,"medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"2711 LIMEKILN PIKE","station_city":"GLENSIDE","station_zip":"19038","station_zip_plus_4":"19038","station_name_slug":"automotive-solution-inc","city":"Glenside","county":"Montgomery","county_slug":"montgomery","city_slug":"glenside"},{"id":2306,"station_county":"BUCKS","station_name":"Automotive Special Services Co","ois_number":"6618","station_address":"220 FRONT ST , QUAKERTOWN PA\n18951-1628","mailing_address":"220 FRONT ST , QUAKERTOWN PA\n18951-1628","phone_number":"215-536-3615","passenger_cars_and_light_trucks":"X","medium_trucks":"X","heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"220 FRONT ST","station_city":"QUAKERTOWN","station_zip":"18951","station_zip_plus_4":"18951-1628","station_name_slug":"automotive-special-services-co","city":"Quakertown","county":"Bucks","county_slug":"bucks","city_slug":"quakertown"},{"id":5028,"station_county":"DELAWARE","station_name":"Automotive Specilites Of Del","ois_number":"N347","station_address":"660 13TH AVE BLDG 10D&E , PROSPECT PARK PA 19076","mailing_address":"660 13TH AVE BLDG 10D&E , PROSPECT PARK PA 19076","phone_number":"610-586-5866","passenger_cars_and_light_trucks":null,"medium_trucks":null,"heavy_trucks":null,"motorcycle":null,"trailer_less_10000":"X","trailer_greater_10000":"X","station_street_address":"660 13TH AVE BLDG 10D&E","station_city":"PROSPECT PARK","station_zip":"19076","station_zip_plus_4":"19076","station_name_slug":"automotive-specilites-of-del","city":"Prospect Park","county":"Delaware","county_slug":"delaware","city_slug":"prospect-park"},{"id":9877,"station_county":"MONTOUR","station_name":"Automotive Technologies","ois_number":"D528","station_address":"491 RAILROAD ST , DANVILLE PA\n17821","mailing_address":"491 RAILROAD ST , DANVILLE PA\n17821","phone_number":"570-275-3299","passenger_cars_and_light_trucks":"X","medium_trucks":"X","heavy_trucks":null,"motorcycle":null,"trailer_less_10000":null,"trailer_greater_10000":null,"station_street_address":"491 RAILROAD ST","station_city":"DANVILLE","station_zip":"17821","station_zip_plus_4":"17821","station_name_slug":"automotive-technologies","city":"Danville","county":"Montour","county_slug":"montour","city_slug":"danville"}],"type":"name"};
export default {

    data: () => {
        return {
            placeholderText: 'Search by name...',
            searchType: 'name',
            searchText: 'automotive',
            resultData: {
                emptyResult: null,
                results: defaultResults['results'],
                type: null,
                error: null
            },
            searchIsLoading: false,
            emptyText: false,
            responseError: false,
            responseErrorText: ''

        }
    },
    methods: {

        changePlaceholderText() {
            this.placeholderText = 'Search by ' + this.searchType + '...';
        },
        redirectStation(event) {
            window.location.href = event.target.children[0].children[0].href;
        },
        async submitSearch() {
            if(this.searchText.length == 0){
                this.emptyText = true;
            }
            else{
            this.emptyText = false;
            this.responseError = '';
            this.resultData.emptyResult = null;
            this.resultData.results = null;
            this.resultData.type = null;
            this.resultData.error = null;
            this.searchIsLoading = true;
            await axios.get('/api/stations', {
                params: {
                    search: this.searchText,
                    type: this.searchType
                }
            }).then(response => {
                this.searchIsLoading = false;
                this.resultData = response.data;
            })
                .catch(error => {
                    this.searchIsLoading = false;
                    if (error.response.status == 429) {
                        'Too many searches have been made. Please wait a minute to try again.'
                    } else {
                        this.responseError = 'A system error has occurred. Please try again later.';
                    }

                });
        }
    },

    },
    /* async mounted(){
        this.searchText = 'auto';
        this.searchType = 'name';
        await axios.get('/api/stations', {
                params: {
                    search: this.searchText = 'auto',
                    type: this.searchType = 'name'
                }
            }).then(response => {
                this.searchIsLoading = false;
                this.resultData = response.data;
            })
                .catch(error => {
                    this.searchIsLoading = false;
                    if (error.response.status == 429) {
                        'Too many searches have been made. Please wait a minute to try again.'
                    } else {
                        this.responseError = 'A system error has occurred. Please try again later.';
                    }

                });
    } */

}
</script>



