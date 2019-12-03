<template>
  <p uk-margin>
    <template v-for="tag in tags">
      <a :key="tag.id" class="uk-button uk-button-default uk-button-small uk-margin-small-right"
      v-bind:class="{ 'uk-button-primary': tag.slug === activtag }"
      v-bind:href="'/news?tag=' + tag.slug">
      <i class="fas fa-tag"></i>
      {{tag.title}}</a>
    </template>
  </p>
</template>

<script>
export default{
  props:['activtag'],
  data(){
      return{
          tags: [],
      }
  },
  mounted: function () {
    axios
        .get('/serv-data/tags')
        .then(response => {
            this.tags = response.data;
        });
  },
  methods: {
  },
}
</script>
