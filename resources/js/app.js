require('./bootstrap');

window.Vue = require('vue');

Vue.component('menu-main', require('./components/MenuMain.vue').default);
Vue.component('menu-sidebar', require('./components/MenuSidebar.vue').default);
Vue.component('menu-user-nav', require('./components/MenuUserNav.vue').default);
Vue.component('news-tags', require('./components/NewsTags.vue').default);
Vue.component('news-article', require('./components/NewsArticle.vue').default);


const app = new Vue({
   el: '#app',
});
