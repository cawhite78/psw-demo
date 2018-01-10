require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');

Vue.component('autocomplete',require('./components/Autocomplete.vue'));
//Vue.component('product-gallery', require('./components/ProductGallery.vue'));
new Vue({
  el: '#app'
});
