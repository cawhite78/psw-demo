require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');
window.collection = require('collect.js');
global.$ = global.jQuery = require('jquery');

Vue.component('search-results',require('./components/SearchResults.vue'));

new Vue({
  el: '#app'
});

