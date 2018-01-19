require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');
window.collection = require('collect.js');
window.fingerprint = require('fingerprintjs2');

var VueCookie = require('vue-cookie');
// Tell Vue to use the plugin
Vue.use(VueCookie);

global.$ = global.jQuery = require('jquery');

Vue.component('search-results',require('./components/SearchResults.vue'));
Vue.component('user-fingerprint',require('./components/UserFingerprint.vue'));

new Vue({
  el: '#app'
});


