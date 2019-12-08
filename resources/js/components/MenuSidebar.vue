<template>
  <ul class="uk-nav uk-nav-primary uk-margin-auto-vertical">
    <li class="uk-active"><a href="/">Головна</a></li>

    <template v-for="item in menu">
       <template v-if="item.children">
         <li class="uk-parent uk-active" :key="item.id">
           <a href="#">
             <span class="uk-active">{{item.title}}
               <i class="fas fa-angle-down uk-margin-small-left"></i>
             </span>
           </a>
             <ul class="uk-nav-sub">

               <li class="uk-active" v-for="subitem in item.children">
                 <a v-bind:href="'/' + subitem.url"><i class="uk-margin-right" v-bind:class="subitem.icon_class"></i>{{subitem.title}}</a>
               </li>

             </ul>
         </li>
        </template>
        <template v-else>
          <li class="uk-active" :key="item.id"><a v-bind:href="'/' + item.url">{{item.title}}</a></li>
        </template>
    </template>
    <li class="uk-nav-divider uk-margin"></li>

    <menu-user-nav :user="user"></menu-user-nav>

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
