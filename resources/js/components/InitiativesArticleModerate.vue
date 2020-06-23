<template>
  <div v-if="status === 'new'" class="uk-alert-primary" uk-alert>
      <h3><i class="fas fa-unlock-alt uk-margin-small-right"></i>Ініціатива на розгляді</h3>
      <p>Користувачі не зможуть перереглядати цей матеріал доки ви не опублікуєте його.</p>
      <div class="uk-text-center">
        <template v-if="confirmed">
          <p class="uk-text-lead uk-light"><i class="fas fa-check uk-margin-small-right"></i>Статус успішно змінено!</p>
        </template>
        <template v-else>
          <button class="uk-button uk-alert-success" type="button" @click="setStatus('published')">Опублікувати</button>
          <button class="uk-button uk-alert-danger" type="button" @click="setStatus('deleted')">Видалити</button>
        </template>
      </div>
  </div>
</template>

<script>
export default{
  props:['id', 'status'],
  data(){
      return{
          confirmed: false,
      }
  },
  methods: {
    setStatus(s) {
        confirm('Ви дійсно бажаєте змінити статус на ' + s)
        axios
          .post('/serv-data/initiative-upd/' + this.id, { status: s })
          .then(response => {
            this.confirmed = true;
          })
          .catch(e => {
            console.log(e.response.data);
          });
      },
  },

}
</script>
