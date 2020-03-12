<template>
   <li class="uk-parent uk-active" :key="item.id">
     <a>
       <span class="uk-active" v-on:click="show = !show">{{item.title}}
         <i class="fas fa-angle-down uk-margin-small-left"></i>
       </span>
     </a>
     <transition name="fade">
       <ul class="uk-nav-sub" v-if="show">
         <li class="uk-active" v-for="subitem in item.children">
           <a v-bind:href="'/' + subitem.url"><i class="uk-margin-right" v-bind:class="subitem.icon_class"></i>{{subitem.title}}</a>
         </li>
       </ul>
     </transition>
   </li>
</template>

<script>
export default{
  props:['item'],
  data(){
      return{
          show: false
      }
  },

}
</script>
