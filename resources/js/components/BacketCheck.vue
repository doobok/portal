<template>
  <a class="uk-link-reset" href="/user/backet">
    <i v-if="backet" class="fas fa-shopping-cart uk-margin-small-left bounceInLeft"></i>
  </a>
</template>

<script>
export default{

  mounted() {
    this.$store.dispatch('GET_BACKET');
  },

  computed: {
    backet () {
      if (this.$store.getters.ITEMS.length > 0) {
        return true;
      }
    },
  },

}
</script>
