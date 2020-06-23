<template>
  <p uk-margin>
    <template v-for="(tag, index) in sortedTags">
      <span v-if="index === 7" class="uk-button uk-tile-muted uk-button-small uk-margin-small-right"
        @click="showmore = !showmore">
        <template v-if="!showmore">
          більше тегів
        </template>
        <template v-else>
          приховати
        </template>
      </span>

      <a v-if="index < 7 || showmore" :key="tag.id" class="uk-button uk-button-default uk-button-small uk-margin-small-right"
      v-bind:class="{ 'uk-button-primary': tag.slug === activtag }"
      v-bind:href="'/' + segment + '?tag=' + tag.slug">
      {{tag.title}}</a>
    </template>
  </p>
</template>

<script>
export default{
  props:['activtag', 'segment'],
  data(){
      return{
          tags: [],
          showmore: false,
      }
  },
  mounted: function () {
    axios
        .get('/serv-data/tags', { params: { segment: this.segment }})
        .then(response => {
            this.tags = response.data;
        });
  },
  computed: {
     sortedTags: function() {
       function compare(a, b) {
         if (a.count < b.count)
           return 1;
         if (a.count > b.count)
           return -1;
         return 0;
       }

       return this.tags.sort(compare);
     }
   }
}
</script>
