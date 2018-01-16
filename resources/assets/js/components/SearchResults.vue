<template>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <input type="text" placeholder=" What are you looking for?" v-model="q" v-on:keyup="initGetSearch"
                       class="form-control">
            </div>
        </div>

        <div class="row mb-3" style="min-height:30px;">
            <div class="col-4 text-left">
                <span v-if="q.length && !suggests.length">Search for <em>{{q}}</em></span>
                <!--<span v-else-if="q.length && suggests.length">Did you mean <em>{{ suggests }}</em>  <button-->
                <!--v-on:click="suggestsClick();">Yes</button></span>-->
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-right">
                <span v-if="!q.length"></span>
                <span v-else-if="results.length == 1">We found 1 result</span>
                <span v-else-if="results.length == 0 || results == null">We found 0 results</span>
                <span v-else>We found {{results.length}} results</span>
            </div>
        </div>


        <div class="row" v-if = "q.length > 2 && results.length">
            <div class="col-12">
                <div v-if="brands.length > 1">
                    <button class="btn btn-sm btn-outline-primary mr-2" v-on:click="filterByBrand('')">all</button>
                <span  v-for="brand in brands">
                    <button class="btn btn-sm btn-outline-primary mr-2" v-on:click="filterByBrand(brand)">{{brand}}</button>
                </span>
                </div>
            </div>
        </div>

        <div v-if="results.length && q.length > 2" class="row search-container">
            <div class="col-lg-6 mb-1 mt-2 p-3" v-if="results.length " v-for="result in results">
                <div class="search-card p-3">
                    <div class="row">
                        <div class="col-12">
                            <span class="brand">{{ result.brand }}</span>
                            <h3>{{ result.name }}</h3>
                            <span :class="['category-' + result.type, 'product-category', 'rounded-1']"><a v-bind:href="'/products?type=' + result.type.replace(' ', '-')">{{result.type}}</a></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="description">{{ highlight(result.description.split(" ").splice(0,25).join(" ")) }}
                                ... <a class="more" v-bind:href="'/product/' + result.id">more</a>

                            </p>


                            <button type="button" class="btn btn-outline-primary btn-sm"><a class="product-button"
                                                                                            v-bind:href="'/product/' + result.id">View
                                product</a></button>

                            <div v-if="result.score" class="m-3">Score: {{result.score}}</div>

                        </div>
                        <div class="col-6">

                            <img v-bind:src="result.primary_image"
                                 style="width:200px; height:auto; float:right;">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div v-if="q.length">
                {{otherRecommendations}}
            </div>
        </div>

    </div>
</template>
<script>
  export default {
    data() {
      return {
        q: '',
        b: '',
        t: '',
        suggests: '',
        results: [],
        otherRecommendations: '',
        dsmysql: dsmysql,
        loading: false,
        filters: [],
        endpoint: this.dsmysql ? '/api/search-mysql' : '/api/search',
      }
    },
    methods: {
      highlight(description) {
        return description;
        let text = this.q;

        let index = description.indexOf(text);
        if (index >= 0) {
          return description.substring(0, index) + "<span class='highlight'>" + description.substring(
            index, index + text.length) + "</span>" + description.substring(index + text.length);
        }
        return description.replace(/</g, "&lt;").replace(/>/g, "&gt;");
      },
      autoComplete() {
        this.results = [];
        if (this.q.length > 2) {
          this.getSearch();
        }
      },
      initGetSearch() {
        setTimeout(this.getSearch(), 500);

        if(this.q.length > 2) {
          $('.content-area').hide();
        } else {
          $('.content-area').show();
        }
      },

      getSearch() {
        axios.get(this.endpoint, {params: {
          q: this.q,
          b: this.b,
          t: this.t
        }}).then(response => {
          this.results = response.data.results;
          this.brands = response.data.brands;
          if (!this.results) {
            $('.content-area').show();
            this.otherRecommendations = "We were not able to find results for ".this.q;
            this.getSpellCheck(this.q);
          }
        });

      },
      suggestsClick() {
        let endpoint = this.dsmysql ? '/api/search-mysql' : '/api/search';
        axios.get(endpoint, {params: {q: this.suggests}}).then(response => {
          this.results = response.data.results;
          if (!this.results) {
            this.otherRecommendations = "You didn't find what you were looking for.  Would you like to browser our categories?";
            this.getSpellCheck(this.q);
          }
        });
      },
      sortByBrand(brand) {
        axios.get(this.endpoint, {params: {
          q: this.q,
          b: brand,
        }}).then(response => {
          this.results = response.data.results;

          if (!this.results) {
            this.otherRecommendations = "We were not able to find results for ".this.q;
            this.getSpellCheck(this.q);
          }
        });

      },
      filterByBrand(brand) {
        this.brand = brand;
        this.sortByBrand(brand);
      },
      getSpellCheck() {
        axios.get('/api/spelling2', {params: {q: this.q}}).then(response => {
          this.suggests = response.data.results;
        });
      }
    }
  }
</script>