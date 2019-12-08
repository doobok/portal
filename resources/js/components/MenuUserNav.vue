<template>
  <ul class="uk-nav uk-navbar-dropdown-nav">
    <template v-if="user">
      <li><a href="/home"><i class="fas fa-user-circle uk-margin-right"></i>Профіль</a></li>
      <li class="uk-nav-divider"></li>
      <li><a @click="logout"><i class="fas fa-sign-out-alt uk-margin-right"></i>Вихід</a></li>
    </template>
    <template v-else>
      <li><a href="/login"><i class="fas fa-sign-in-alt uk-margin-right"></i>Вхід</a></li>
      <li><a href="/register"><i class="fas fa-user-plus uk-margin-right"></i>Реєстрація</a></li>
    </template>
  </ul>

</template>

<script>
export default{
  props:['user'],
  data(){
      return{
          // items: []
      }
  },
  methods: {
    logout() {
        axios.post('/logout')
            .then(response => {
              this.results = response.data;
              this.user = ''
            })
            .catch(error => console.log(error));
    },
  }

}
</script>
