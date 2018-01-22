<template></template>
<script>
  export default {
    data() {
      return {
        anonId: '',
        endpoint: '',
      }
    },

    mounted() {
      this.getAnonIdCookie();
    },
    methods: {
      getAnonIdCookie() {
        let anonIdCookieId = this.$cookie.get('_anon_uuid');
        if (anonIdCookieId === null) {
          this.generateAnonId();
        }
      },
      generateAnonId() {
        new fingerprint().get(function (result, components) {
          if (result.length) {
            let endpoint = '/api/anon-user/' + result;
            axios.get(endpoint,{params: {
              view: window.location.pathname
            }}).then(response => {
              console.log(response);
              if (!response) {
                console.log(response);
                document.cookie = "_psw_anonId=" + result;
              }
            });
          }
        });
      },
    }
  }
</script>