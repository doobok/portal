<template>
<div>

  <div v-for="(item, index) in events" :key="item.id">
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-cover-container"
        v-bind:class="{ 'uk-flex-last@s uk-card-media-right': multipleIndex(index), 'uk-card-media-left': !multipleIndex(index) }">
            <img :src="'/storage/' + item.image" uk-cover>
            <!-- <img src="/dum.jpg" alt="" uk-cover> -->
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                <h3 class="uk-card-title uk-heading-divider">{{item.title}}</h3>
                <span class="uk-text-meta uk-text-italic uk-padding-remove-vertical">
                  <span class="" v-if="item.vac_num">
                    <i class="fas fa-exclamation-triangle uk-text-warning uk-margin-small-right"></i>
                    Кількість учасників обмежена, доступних місць: <b>{{item.vac_num - item.vac_res}}</b><br>
                  </span>
                  <i class="far fa-clock uk-margin-small-right"></i> Початок: <b>{{item.date_start.substring(0,16)}}</b>

                </span>
                <hr>
                <p>{{item.teaser}}</p>
                <a class="uk-button uk-button-default uk-margin-remove uk-width-1-1" :href="'/initiatives/' + item.id">Ознайомитися з подробицями...</a>                
            </div>
            <!-- <div class="bg-green uk-light"> -->
            <!-- </div> -->

        </div>
      </div>
    </div>
    <div v-if="loading" class="uk-margin-large-top">
      <p class="uk-heading-medium uk-text-center uk-text-muted"><i class="fas fa-circle-notch spin"></i></p>
    </div>

  </div>



</template>

<script>
export default{
  props:['tag'],
  data(){
      return{
          events: [],
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
                        .get('/serv-data/initiatives', { params: { skip: this.count } })
                        .then(response => {
                            if (response.data.length != 0) {
                                this.events = [].concat(this.events, response.data);
                                if (response.data.length < 3) {
                                  this.lastdata = true;
                                }
                            } else {
                                this.lastdata = true;
                            }
                            this.count = this.count+3;
                            this.loading = false;
                        });

                }, 400);

            },
      multipleIndex(i) {
        let multipli = i % 2;
        if (multipli === 1) {
          return true;
        } else {
          return false;
        }
      }
  },
  computed: {

  }
}
</script>
