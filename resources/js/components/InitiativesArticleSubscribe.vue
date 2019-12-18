<template>
  <div class="uk-text-center uk-margin">
        <button @click="subscribe" class="uk-button uk-button-default uk-alert-success uk-button-large" type="button" :disabled="closed"><i class="fas fa-puzzle-piece uk-margin-small-right"></i>{{msg}}</button>
        <button @click="unsubscribe" v-if="subscribed" class="uk-button uk-button-large uk-button-danger" type="button">Відписатись</button>
  </div>
</template>

<script>
export default{
  props:['item'],
  data(){
      return{
          msg: 'Долучитися до ініціативи',
          closed: false,
          subscribed: false,
      }
  },
  mounted: function () {
    axios
      .post('/serv-data/initiative-status', { id: this.item.id })
      .then(response => {
        console.log(response);
        if (response.status === 201) {
          // console.log('доступно');
        } else if (response.status === 202) {
          this.msg = response.data;
          this.closed = true;
          this.subscribed = true;
        } else {
          this.msg = response.data;
          this.closed = true;
        }
      })
      .catch(e => {
        console.log(e.response.data);
      });

  },
  methods: {
    subscribe() {
        axios
          .post('/serv-data/initiative-subscribe', { id: this.item.id })
          .then(response => {
            console.log(response);
            this.msg = response.data;
          })
          .catch(e => {
            console.log(e.response.data);
          });
      },
    unsubscribe() {
        confirm('Ви дійсно бажаєте відписатись від цієї ініціативи?');
        axios
          .post('/serv-data/initiative-unsubscribe', { id: this.item.id })
          .then(response => {
            console.log(response);
            this.msg = 'Долучитися до ініціативи';
            this.closed = false;
            this.subscribed = false;
          })
          .catch(e => {
            console.log(e.response.data);
          });
      },
  },

}
</script>
