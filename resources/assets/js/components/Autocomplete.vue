<template>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <input type="text" placeholder=" What are you looking for?" v-model="q" v-on:keyup="autoComplete"
                       class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4 text-left">
                <span v-if="q.length && !suggests.length">Search for <em>{{q}}</em></span>
                <span v-else-if="q.length && suggests.length">Did you mean <em>{{ suggests }}</em>  <button
                        v-on:click="q=suggests; suggestsClick()">Yes</button></span>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-right"><span v-if="results.length == 1">{{results.length}} result</span><span v-else>{{results.length}} results</span>
            </div>
        </div>

        <div v-if="results.length" class="row">
            <div class="col-lg-6 mb-1 mt-2 p-3" v-if="results.length " v-for="result in results">
                <div class="search-card p-3">
                    <div class="row">
                        <div class="col-12">
                            <span class="brand">{{ result.brand }}</span>
                            <h3>{{ result.name }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="description">{{ highlight(result.description.split(" ").splice(0,35).join(" ")) }} ... <a class="more" v-bind:href="'/product/' + result.id">more</a></p>
                            <button  type="button" class="btn btn-outline-primary btn-sm"><a class="product-button" v-bind:href="'/product/' + result.id">View product</a></button>

                        </div>
                        <div class="col-6">
                            <img v-bind:src="'http://edc.poolsupplyworld.com/wimages/product_image/' + result.primary_image"
                                 style="width:200px; height:auto; float:right;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>

        </div>

    </div>
</template>
<script>
  export default {
    data() {
      return {
        q: '',
        suggests: '',
        results: [],
      }
    },
    methods: {
      highlight(description) {
        return description;
        let text = this.q;

        let index = description.indexOf(text);
        if (index >= 0) {
          let preRender = description.substring(0, index) + "<span class='highlight'>" + description.substring(
            index, index + text.length) + "</span>" + description.substring(index + text.length);


        }
        return description.replace(/</g,"&lt;").replace(/>/g,"&gt;");
      },
      autoComplete() {
        this.results = [];
        if (this.q.length > 2) {
          this.getSearch();
        }
      },
      suggestsClick() {
        this.q = this.suggests;
        this.getSearch();
      },
      getSearch() {
        axios.get('/api/search', {params: {q: this.q}}).then(response => {
          this.results = response.data.results;
          console.log(response.data.results);
          if (!this.results) {
            //this.getSpellCheck(this.q);
          }
        });
      },
      getSpellCheck() {
        axios.get('/api/spelling', {params: {q: this.q}}).then(response => {

          this.suggests = response.data.results;
//          this.results = null;
          console.log(response.data.results);
        });
      }
    }
  }
</script>