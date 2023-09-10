<template>
    <div class="col-sm-10 mx-auto bg-white my-4 p-4 text-center shadow">
        <h2>Inspection Search Tool</h2>
        <p>Use this tool to search for a station, county or city, up to 20 characters.
            <br>To change between search type, use the dropdown to change.
            <br> After typing your query, hit the search icon to run the search.
        </p>
        <div class="col-sm-10 mx-auto">

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
                    class="form-control" :placeholder="placeholderText">
                <button type="button" class="input-group-text" id="searchBtn" @click="submitSearch" :disabled="searchIsLoading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>

        </div>
        <div id="resultDisplay" class="col-sm-10 mx-auto my-4">
            <div v-if="searchIsLoading">
                <div class="spinner-border spinner-border-sm"></div> Loading...
            </div>
            <div v-else>
                <div v-if="resultData.emptyResult" id="emptyMessageBox"
                    class="alert alert-danger container text-center mx-auto my-4">No results from search. Try changing your
                    search
                    text.</div>
                <div v-else-if="resultData.result">
                    <div class="alert alert-success container text-center mx-auto my-4">
                        <b>{{ resultData.result.length }}</b> results matched your search!
                    </div>
                    <div>
                        <table class="table table-response-sm table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Station Name</th>
                                    <th>County</th>
                                    <th>City</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="result in resultData.result">

                                    <td><a class="text-dark" :href="'/stations/' + result.station_name_slug">{{
                                        result.station_name }}</a>
                                    </td>
                                    <td><a class="text-dark" :href="'/counties/' + result.county_slug">{{ result.county
                                    }}</a></td>
                                    <td><a class="text-dark" :href="'/cities/' + result.city_slug">{{ result.city }}</a>
                                    </td>
                                    <td>{{ result.phone_number }}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['stations'],
    data: () => {
        return {
            placeholderText: 'Search by name...',
            searchType: 'name',
            searchText: '',
            resultData: {
                emptyResult: null,
                result: null,
            },
            searchIsLoading: false,

        }
    },
    methods: {
        
        changePlaceholderText() {
            this.placeholderText = 'Search by ' + this.searchType + '...';
        },

        submitSearch() {
            this.searchIsLoading = true;
            this.resultData.emptyResult = null;
            this.resultData.results = null;
            
            var search = this.searchText.toLowerCase(); //make lowercase for begins with matching
            var type = this.searchType;
            var results = [];
            if(type == 'name'){ type = 'station_name'; }
            this.stations.forEach((station) => {
                var value = station[type].toLowerCase();
                if(value.startsWith(search)){
                    results.push(station);
                }
            });

            if(results.length == 0){
                this.resultData.emptyResult = true;
            }
            else{
                this.resultData.result = results;
                this.resultData.type = type;
            }
            /* this.responseError = '';
            this.resultData.emptyResult = null;
            this.resultData.results = null;
            this.resultData.type = null;
            this.resultData.error = null;

            this.searchIsLoading = true;
            axios.get('/searchTool', {
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
                    this.responseError = 'A system error has occurred. Please try again later.';
                }); */
            this.searchIsLoading = false;
        },
    }
}
</script>

<style></style>

