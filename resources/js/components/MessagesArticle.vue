<template>
  <div>

    <div v-for="item in messages">
      <a v-bind:href="'/user/messages/' + item.id" class="uk-link-reset">
        <div class="uk-card uk-card-default uk-card-small uk-margin-small-bottom uk-border-rounded"
          v-bind:class="{ 'uk-alert-success uk-light': !item.read }">

          <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" data-uk-grid>
              <div class="uk-width-auto uk-h2">
                <template v-if="item.from">
                  <i class="fas fa-user-tie"></i>
                </template>
                <template v-else>
                  <i class="fas fa-info-circle"></i>
                </template>
              </div>
              <div class="uk-width-expand">
                <h4 class="uk-margin-remove-bottom uk-text-bold">
                  {{item.subject}}
                </h4>
                <p class="uk-text-meta uk-margin-remove-top uk-text-small">
                  {{item.created_at}}
                </p>
              </div>
            </div>
          </div>
          <div class="uk-card-body">
            <p>{{item.message}}</p>
          </div>
        </div>
      </a>
    </div>

    <div v-if="loading" class="uk-margin-large-top">
      <p class="uk-heading-medium uk-text-center uk-text-muted"><i class="fas fa-circle-notch spin"></i></p>
    </div>
  </div>

</template>

<script>
export default{
  data(){
      return{
          messages: [],
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
                        .get('/serv-data/messages', { params: { skip: this.count } })
                        .then(response => {
                            if (response.data.length != 0) {
                                this.messages = [].concat(this.messages, response.data);
                                if (response.data.length < 5) {
                                  this.lastdata = true;
                                }
                            } else {
                                this.lastdata = true;
                            }
                            this.count = this.count+5;
                            this.loading = false;
                        });

                }, 400);

            },
  },

}
</script>
