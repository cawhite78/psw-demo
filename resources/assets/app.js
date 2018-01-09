import Vue from 'vue';
import AlgoliaComponents from 'vue-instantsearch';
Vue.component('search-component', require('./components/SearchComponent.vue'));
Vue.config.productionTip = true;
Vue.use(AlgoliaComponents);
/* eslint-disable no-new */
window.onload = function () {
  var main = new Vue({
    el: '#app',
    data: {
      currentActivity: 'home'
    }
  });
};

