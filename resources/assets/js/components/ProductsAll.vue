<template>
    <div class="container">
        <div v-if="results.length" class="row search-container">
            <div class="col-lg-6 mb-1 mt-2 p-3" v-if="results.length " v-for="result in results">
                <div class="search-card p-3">
                    <div class="row">
                        <div class="col-12">
                            <span class="brand">{{ result.brand }}</span>
                            <h3>{{ result.name }}</h3>
                            <span :class="['category-' + result.type, 'product-category', 'rounded-1']">{{result.type}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        results: [],
        dsmysql: dsmysql,
        loading: false,
        filters: [],
        endpoint: '/api/products',
      }
    },
    mounted: function () {
        this.getSearch();
    },
    methods: {
      getSearch() {
        axios.get(this.endpoint).then(response => {
          console.log(response.data.results);
          this.results = response.data.results;
        });

      },
    }
  }
</script>