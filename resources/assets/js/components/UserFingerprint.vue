<template></template>
<script>
  export default {
    data() {
      return {
        anonId: ''
      }
    },

    mounted() {
        this.getAnonIdCookie();
    },
    methods: {
        getAnonIdCookie() {
          let anonIdCookieId = this.$cookie.get('_anon_uuid');
          if(anonIdCookieId === null) {
            this.generateAnonId();
          }
        },
        generateAnonId()
        {
          new fingerprint().get(function (result, components) {
            document.cookie = "_psw_anonId=" + result;
          });
        },
    }
  }
</script>