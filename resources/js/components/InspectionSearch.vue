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
                                <a class="text-dark" :href="'/stations/' + result.station_name_slug">{{
                                    result.station_name }}</a>
                            </p>
                            <p>
                                County:
                                <a class="text-dark" :href="'/counties/' + result.county_slug">{{ result.county
                                }}</a>
                            </p>
                            <p>
                                City:
                                <a class="text-dark" :href="'/cities/' + result.city_slug">{{ result.city }}</a>
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

export default {

    data: () => {
        return {
            placeholderText: 'Search by name...',
            searchType: 'name',
            searchText: '',
            resultData: {
                emptyResult: null,
                results: null,
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

    }
}
</script>



