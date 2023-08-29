<template>
    <div class="card col-sm-10 text-center mx-auto my-4">
        <div class="card-header custom-blue-bg text-white fw-bold">Inspection Station Search</div>
        <div class="card-body">
            <div class="col-sm-8 mx-auto">
                <div class="input-group">
                    <span>
                        <select v-model="searchType" class="input-group-text" name="searchType" id="searchType" @change="changePlaceholderText" >
                            <option selected value="station">Station</option>
                            <option value="county">County</option>
                            <option value="city">City</option>

                        </select>
                    </span>
                    <input type="text" name="searchInput" id="searchInput" maxlength="20" class="form-control"
                    :placeholder="placeholderText">
                    <button type="button" class="input-group-text" id="searchBtn"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="resultDisplay" class="col-sm-8 mx-auto my-2">

            </div>
        </div>
    </div>
</template>

<script>

export default {

    data: () => {
        return {
            placeholderText: 'Search for a station...',
            searchType: 'station',
        }
    },
    methods: {

         changePlaceholderText(){
            this.placeholderText = 'Search for a ' + this.searchType + '...';
        }

    }
}
</script>

<style></style>

<!-- axios.get('', {
    params: {
      
    }
  }).then(
    response => {
     
    })
    .catch(error => {
      
    }); -->
