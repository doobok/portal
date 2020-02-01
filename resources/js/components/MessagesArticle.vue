<template>
  <div>

    <div v-for="item in messages">
      <div class="uk-card uk-card-default uk-card-small uk-margin-small-bottom"
        v-bind:class="{ 'uk-card-primary': !item.read }">

        <div class="uk-card-header">
          <div class="uk-grid-small uk-flex-middle" data-uk-grid>
            <div class="uk-width-auto uk-h2">
              <i class="fas fa-user-tie"></i>
            </div>
            <div class="uk-width-expand">
              <h4 class="uk-margin-remove-bottom uk-text-bold">Username <i class="fas fa-external-link-alt uk-text-meta"></i></h4>
              <p class="uk-text-meta uk-margin-remove-top uk-text-small">
                {{item.created_at}}
              </p>
            </div>
          </div>
        </div>
        <div class="uk-card-body" uk-grid>
          <div class="uk-width-expand@m">
            <!-- <h5 class="uk-margin-small-bottom uk-text-bold">lor</h5> -->
            <p class="uk-text-small">{{item.message}}</p>
          </div>
          <div class="uk-width-auto@m uk-h2 uk-text-muted">
            <i class="fas fa-reply uk-margin-right"></i>
            <i class="fas fa-trash-alt uk-float-right"></i>
          </div>
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
