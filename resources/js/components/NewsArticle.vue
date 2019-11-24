<template>
  <div class="uk-grid uk-margin-top uk-child-width-1-2@s" uk-grid>
    <div v-for="item in news">
      <div class="uk-card uk-card-default uk-card-hover uk-card-small">
        <div class="uk-card-media-top">
          <a :href="'/news/' + item.slug"><img :data-src="'/storage/' + item.image" data-width="620" data-height="350" data-uk-img="target: !.uk-slideshow-items" alt=""></a>
        </div>
        <div class="uk-card-header">
          <div class="uk-grid-small uk-flex-middle" data-uk-grid>
            <div class="uk-width-auto">
              <img class="uk-border-circle" alt="" width="40" height="40" src="https://unsplash.it/60/60/?random">
            </div>
            <div class="uk-width-expand">
              <h6 class="uk-margin-remove-bottom uk-text-bold">Future in Bucha</h6>
              <p class="uk-text-meta uk-margin-remove-top uk-text-small"><time>{{item.created_at}}</time></p>
            </div>
          </div>
        </div>
        <div class="uk-card-body">
          <h4 class="uk-margin-small-bottom uk-text-bold">{{item.title}}</h4>
          <p class="uk-text-small">{{item.teaser}}</p>
          <a class="uk-button uk-button-default uk-text-bold uk-margin-remove uk-width-1-1" :href="'/news/' + item.slug">Читати далі...</a>
        </div>
      </div>
    </div>
  </div>


</template>

<script>
export default{
  data(){
      return{
          news: []
      }
  },
  mounted: function () {
      axios
          .get('/serv-data/news')
          .then(response => {
              this.news = response.data;
          });
  },
  computed: {

  }
}
</script>
