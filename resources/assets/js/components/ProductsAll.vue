<template>
    <div class="container">
        <div v-if="results.length" class="row search-container">
            <div class="col-12 col-lg-12 mb-1 mt-2 p-3" v-if="results.length " v-for="result in results">
                <div class="search-card p-3">
                    <div class="row">
                        <div class="col-3">
                            <img v-bind:src="result.primary_image"
                                 style="width:90%; height:auto; float:right;">
                        </div>
                        <div class="col-9">
                            <span class="brand">{{ result.brand }}</span>
                            <h3>{{ result.name }}</h3>
                            <span :class="['category-' + result.type, 'product-category', 'rounded-1']">{{result.type}}</span>
                            <p class="description">{{ highlight(result.description.split(" ").splice(0,25).join(" ")) }}
                                ... <a class="more" v-bind:href="'/product/' + result.id">more</a>

                            </p>
                            <button type="button" class="btn btn-outline-primary btn-sm"><a class="product-button"
                                                                                            v-bind:href="'/product/' + result.id">View
                                product</a></button>
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
        brand: brand,
        type: type,
        endpoint: '/api/products',
      }
    },
    mounted: function () {
        this.getSearch();
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
      getSearch() {
        axios.get(this.endpoint).then(response => {
          console.log(response.data.results);
          this.results = response.data.results;
        });

      },
    }
  }
</script>