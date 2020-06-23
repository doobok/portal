import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';

import backet from './backet'

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    backet
  }
})
