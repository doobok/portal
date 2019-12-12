require('./bootstrap');

// Vue
window.Vue = require('vue');

// Vuelidate
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

// Components
Vue.component('menu-main', require('./components/MenuMain.vue').default);
Vue.component('menu-sidebar', require('./components/MenuSidebar.vue').default);
Vue.component('menu-user-nav', require('./components/MenuUserNav.vue').default);
Vue.component('news-tags', require('./components/NewsTags.vue').default);
Vue.component('news-article', require('./components/NewsArticle.vue').default);
Vue.component('initiative-article', require('./components/InitiativesArticle.vue').default);
Vue.component('initiative-add', require('./components/InitiativesAddForm.vue').default);


const app = new Vue({
   el: '#app',
});
