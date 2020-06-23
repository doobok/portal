<template>
  <a class="uk-link-reset" href="/user/messages">
    <i v-if="info" class="fas fa-bell uk-margin-small-left swing"></i>
  </a>
</template>

<script>
export default{
  data(){
      return{
          info: false
      }
  },
  mounted: function () {
      axios
          .get('/serv-data/msg-check')
          .then(response => {
            if (response.status === 201) {
              this.info = true;
            }
          });
  },

}
</script>
