require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');

Vue.component('search-results',require('./components/SearchResults.vue'));
//Vue.component('product-gallery', require('./components/ProductGallery.vue'));
new Vue({
  el: '#app'
});