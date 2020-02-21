<template>
<div>

  <div v-for="(item, index) in events" :key="item.id">
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-cover-container"
        v-bind:class="{ 'uk-flex-last@s uk-card-media-right': multipleIndex(index), 'uk-card-media-left': !multipleIndex(index) }">
          <a class="uk-link-reset" :href="'/initiatives/' + item.id">
            <img :src="'/storage/' + item.image" uk-cover>
            <div class="uk-position-cover uk-flex uk-flex-top"
            v-bind:class="{ 'uk-flex-left': multipleIndex(index), 'uk-flex-right@s': !multipleIndex(index) }">
              <div v-html="eventStatus(item)" id="status"></div>
            </div>

            <div class="uk-position-cover uk-flex uk-flex-bottom">
              <span class="uk-heading-small uk-margin-remove uk-tile-secondary uk-text-center uk-width-1-1" style="opacity: 0.7"><i class="far fa-calendar-check uk-margin-small-right"></i> {{item.date_start.substring(0,10)}} </span>
            </div>
          </a>
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
                  <i class="far fa-clock uk-margin-small-right"></i> Початок: <b>{{item.date_start.substring(11,16)}}</b>

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
          nowtime: '',
          oldperiod: '',
      }
  },
  mounted: function () {
    this.getNowTime();
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
    getNowTime() {
      axios
          .get('/serv-data/now-time')
          .then(response => {
              this.nowtime = response.data;
          });
    },
    loadData() {
                this.loading = true;
                setTimeout(e => {
                    axios
                        .get('/serv-data/initiatives', { params: { skip: this.count, period: this.oldperiod } })
                        .then(response => {
                            if (response.data.length != 0) {
                                this.events = [].concat(this.events, response.data);
                                if (response.data.length < 4 && this.oldperiod) {
                                  this.lastdata = true;
                                }
                            } else {
                              if (this.oldperiod) {
                                this.lastdata = true;
                              } else {
                                this.count = -4;
                                this.oldperiod = true;
                              }
                            }
                            this.count = this.count+4;
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
      },
      eventStatus(e) {
        let status
        if (e.date_start < this.nowtime) {
          status = '<span class="uk-label uk-label-danger">Завершена</span>'
        } else {
          status = '<span class="uk-label uk-label-success">Активна</span>'
        }
        return status;
      }
  },

}
</script>
