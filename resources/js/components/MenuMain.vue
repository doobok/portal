<template>
  <ul class="uk-navbar-nav uk-visible@s">
    <li class="uk-card-hover uk-visible@m"><a href="/"><i class="fas fa-home"></i></a></li>

    <template v-for="item in menu">
       <template v-if="item.children">
         <li class="uk-card-hover" :key="item.id">
           <a href="#">
             <span class="">{{item.title}}
               <i class="fas fa-angle-down uk-margin-small-left"></i>
             </span>
           </a>
           <div class="uk-navbar-dropdown">
             <ul class="uk-nav uk-navbar-dropdown-nav">

               <li v-for="subitem in item.children">
                 <a v-bind:href="'/' + subitem.url"><i class="uk-margin-right" v-bind:class="subitem.icon_class"></i>{{subitem.title}}</a>
               </li>

             </ul>
           </div>
         </li>
        </template>
        <template v-else>
          <li class="uk-card-hover" :key="item.id"><a v-bind:href="'/' + item.url">{{item.title}}</a></li>
        </template>
    </template>

      <li class="uk-card-hover">
        <a href="#">
          <i v-if="!user" class="fas fa-user"></i>
          <i v-if="user" class="fas fa-user-shield">
            <msg-check></msg-check>
            <backet-check></backet-check>
          </i>
        </a>
        <div class="uk-navbar-dropdown" uk-dropdown="pos: bottom-right; offset: 0">

          <menu-user-nav :user="user"></menu-user-nav>

        </div>
      </li>

  </ul>
</template>

<script>
export default{
  props:['user'],
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
      let selected = [];
      this.items.forEach(function(item, i, arr) {
        let elm = arr.filter(e => e.parent_id === item.id);

        if (elm.length === 0 && item.parent_id === null) {
          // console.log('is not parent');
          selected.push(item);
        } else if (item.parent_id === null) {
          // console.log('is parent with childs');
          selected.push({
            title: item.title,
            children: elm
          });
        } else{
        }

      });
      return selected;
    }
  }
}
</script>
