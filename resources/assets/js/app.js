require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');
window.collection = require('collect.js');

Vue.component('search-results',require('./components/SearchResults.vue'));
//Vue.component('products-all',require('./components/ProductsAll.vue'));
//Vue.component('product-gallery', require('./components/ProductGallery.vue'));
new Vue({
  el: '#app'
});

