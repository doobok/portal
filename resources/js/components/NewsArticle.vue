<template>
  <div>

    <news-tags :activtag="tag"></news-tags>

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
                <p class="uk-text-meta uk-margin-remove-top uk-text-small">
                  <time>Опубліковано
                    <span class="uk-text-italic">{{item.created_at.substring(0,10)}}</span> о
                    <span class="uk-text-italic">{{item.created_at.substring(11,16)}}</span>
                  </time>
                </p>
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
    <div v-if="loading" class="uk-margin-large-top">
      <p class="uk-heading-medium uk-text-center uk-text-muted"><i class="fas fa-circle-notch spin"></i></p>
    </div>
    <div v-if="lastdata && news.length === 0" class="uk-margin-large-top uk-text-center uk-text-muted">
      <p><span class="uk-heading-medium"><i class="fas fa-exclamation-triangle uk-text-warning"></i></span><span class="uk-heading-small uk-text-muted">Не знайдено жодної публікації</span></p>
      <p>Спробуйте повернутись до <a href="/news">головної категорії</a></p>
    </div>
  </div>



</template>

<script>
export default{
  props:['tag'],
  data(){
      return{
          news: [],
          loading: false,
          count: 0,
          lastdata: false,
      }
  },
  mounted: function () {
    this.loadData();
    document.addEventListener('scroll', e => {
                var scrollHeight = Math.max(
                      document.body.scrollHeight, document.documentElement.scrollHeight,
                      document.body.offsetHeight, document.documentElement.offsetHeight,
                      document.body.clientHeight, document.documentElement.clientHeight
                  )-400;

                if(document.documentElement.scrollTop + document.documentElement.clientHeight >= scrollHeight && !this.loading && !this.lastdata) {
                    this.loadData();
                }
            });
  },
  methods: {
    loadData() {
                this.loading = true;
                setTimeout(e => {
                    axios
                        .get('/serv-data/news', { params: { tag: this.tag, skip: this.count } })
                        .then(response => {
                            if (response.data.length != 0) {
                                this.news = [].concat(this.news, response.data);
                                if (response.data.length < 4) {
                                  this.lastdata = true;
                                }
                            } else {
                                this.lastdata = true;
                            }
                            this.count = this.count+4;
                            this.loading = false;
                        });

                }, 400);

            },
  },
  computed: {

  }
}
</script>
