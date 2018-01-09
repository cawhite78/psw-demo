<template>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <input type="text" placeholder="what are you looking for?" v-model="q" v-on:keyup="autoComplete"
                       class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4 text-left">
                <span v-if="q.length && !suggests.length">Search for <em>{{q}}</em></span>
                <span v-else-if="q.length && suggests.length">Did you mean <em>{{ suggests }}</em>  <button v-on:click="q=suggests; suggestsClick()">Yes</button></span>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-right"> <span v-if="results.length">{{results.length}} result</span><span v-else>0 results</span>
            </div>
        </div>

        <div v-if="results.length" class="row" style="border:1px solid blue">
            <div class="col-lg-6 mb-4 mt-4 p-3" v-if="results.length " v-for="result in results">
                <div style="border:1px solid black" class="p2">
                    <h6>{{ result.brand }}</h6>
                    {{ result.name }}
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
            this.getSpellCheck(this.q);
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