<template>
  <div>

    <div v-for="item in experts" class="uk-card uk-card-default uk-grid-collapse uk-margin" :key="item.id" uk-grid>
        <div class="uk-width-1-2@m uk-width-1-3@l uk-cover-container uk-card-media-right">
          <img :src="'/storage/' + item.photo" uk-cover>
          <div class="uk-position-cover uk-flex uk-flex-bottom">
            <span class="uk-heading-small uk-margin-remove uk-tile-secondary uk-text-center uk-width-1-1" style="opacity: 0.7">
              <!-- send msg -->
              <button class="uk-button uk-button-large uk-button-link uk-width-1-1 uk-margin-small-bottom" type="button" uk-toggle="target: #modal-msg-send">
                <i class="fas fa-paper-plane uk-margin-small-right"></i> Надіслати повідомлення
              </button>
              <msg-send :to="item.id"></msg-send>

            </span>
          </div>
          <canvas width="400" height="500"></canvas>
        </div>
        <div class="uk-width-expand">
            <div class="uk-card-body">
                <img class="uk-border-circle uk-float-right" alt="" width="40" height="40" src="/logo-circle.png">
                <h3 class="uk-heading-small uk-heading-divider uk-margin-remove-top">{{item.name}}</h3>
                <p class="uk-h4 uk-margin-remove-top"><span class="uk-text-muted">Спеціалізація:</span> {{item.speciality}}</p>
                <p class="uk-h4 uk-margin-remove-top"><span class="uk-text-muted">Навики:</span> {{item.skills}}</p>
                <span class="uk-text-muted uk-float-left uk-margin-medium uk-margin-right">BIO: </span>
                <div class="uk-text-justify" v-html="item.bio"></div>

                <div class="uk-flex uk-flex-center uk-grid-small" uk-grid>
                  <div>
                    <span>
                      <a class="uk-button uk-button-primary" href="/news">
                        <i class="far fa-newspaper"></i>
                        Мої публікації
                      </a>
                    </span>
                  </div>
                  <div>
                    <span>
                      <a class="uk-button uk-button-primary" href="/courses">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Мої курси
                      </a>
                    </span>
                  </div>

                </div>

            </div>
        </div>
      </div>





    <div v-if="loading" class="uk-margin-large-top">
      <p class="uk-heading-medium uk-text-center uk-text-muted"><i class="fas fa-circle-notch spin"></i></p>
    </div>
    <div v-if="lastdata && experts.length === 0" class="uk-margin-large-top uk-text-center uk-text-muted">
      <p><span class="uk-heading-medium"><i class="fas fa-exclamation-triangle uk-text-warning"></i></span><span class="uk-heading-small uk-text-muted">Не знайдено жодного експерта</span></p>
    </div>
  </div>



</template>

<script>
export default{
  // props:['tag'],
  data(){
      return{
          experts: [],
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
                        .get('/serv-data/experts', { params: { tag: this.tag, skip: this.count } })
                        .then(response => {
                            if (response.data.length != 0) {
                                this.experts = [].concat(this.experts, response.data);
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

}
</script>
