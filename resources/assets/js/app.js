require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');

Vue.component('autocomplete',require('./components/Autocomplete.vue'));

new Vue({
  el: '#app'
});
