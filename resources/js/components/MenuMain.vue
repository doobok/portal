<template>
  <ul class="uk-navbar-nav uk-visible@s">
    <li class="uk-card-hover uk-visible@m"><a href="/"><i class="fas fa-home"></i></a></li>

    <template v-for="item in menu">
      <li class="uk-card-hover"><a href=""><span class=""><b>{{item.title}}</b></span></a></li>

    </template>

    <li class="uk-card-hover">
      <a href="#"><i class="fas fa-power-off"></i></a>
      <div class="uk-navbar-dropdown" uk-dropdown="pos: bottom-right; offset: 0">
        <ul class="uk-nav uk-navbar-dropdown-nav">
          <li><a href="#"><i class="fas fa-sign-in-alt uk-margin-right"></i>Вхід</a></li>
          <li><a href="#"><i class="fas fa-user-plus uk-margin-right"></i>Реєстрація</a></li>
        </ul>
      </div>
    </li>

  </ul>
</template>

<script>
export default{
  data(){
      return{
          items: []
      }
  },
  mounted: function () {
      axios
          .get('/serv-data/menu')
          .then(response => {
              this.items = response.data;
          });
  },
  computed: {
    menu () {
    return  this.items.filter(i => i.parent_id == null);

    }
  }
}
</script>
