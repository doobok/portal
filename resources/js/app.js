require('./bootstrap');

// Vue
window.Vue = require('vue');

// store
import store from './store/index';

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
Vue.component('initiative-article-subscribe', require('./components/InitiativesArticleSubscribe.vue').default);
Vue.component('initiative-article-moder', require('./components/InitiativesArticleModerate.vue').default);
Vue.component('initiative-add', require('./components/InitiativesAddForm.vue').default);
Vue.component('msg-send', require('./components/MessageSend.vue').default);
Vue.component('msg-check', require('./components/MessageCheck.vue').default);
Vue.component('msg-article', require('./components/MessagesArticle.vue').default);
Vue.component('backet-check', require('./components/BacketCheck.vue').default);
Vue.component('backet-main', require('./components/BacketMain.vue').default);
Vue.component('backet-add', require('./components/BacketAddItem.vue').default);


const app = new Vue({
   el: '#app',
   store
});
