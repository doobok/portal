import Axios from 'axios';

export default {
  state: {
    items: []
  },
  getters: {
    ITEMS (state) {
      return state.items
    }
  },
  mutations: {
    // создание состояния корзины
    SET_BACKET: (state, payload) => {
      state.items = payload;
    },
    ADD_ITEM: (state, payload) => {
      // проверяем наличие артикла в состоянии
      const item = state.items.find(i => {
        return i.article_id === payload.article_id
      });
      //если есть до добавляем количество
      if (item) {
        item.count++
      // если нет - пушим
      } else {
        state.items.push(payload);
      }
    },

    // убрать из состояния
    REMOVE_ITEM(state, id){
      var index = state.items.findIndex(item => item.id === id);
      state.items.splice(index, 1);
    },
    CLEAR_BACKET: (state) => {
      // очистить состояние
      state.items = [];
    },
  },
  actions: {
    // получение состояния корзины из БД
    GET_BACKET : (context, payload) => {
      return Axios.get('/serv-data/backet-get')
      .then((response) => {
        context.commit('SET_BACKET', response.data);
        return response.data
      })
      .catch(error => {
        return error;
      });
    },
    // добавление елемента в корзину
    ADD_TO_BACKET : (context, payload) => {
      console.log(payload);
      return Axios.post('/serv-data/backet-add', payload)
      .then((response) => {
        // проверяем ответ
        if (response.data) {
          context.commit('ADD_ITEM', response.data);
          return true;
        }
      })
      .catch(error => {
        return error;
      });
    },
    // Удаление позиции из корзины
    REM_FROM_BACKET: async (context, payload) => {
      // console.log(payload);
      let {data} = await Axios.patch('/serv-data/backet-remove/' + payload.id, {status: payload.status});
      context.commit('REMOVE_ITEM', payload.id);
    },
    // добавление елемента в корзину
    BOOKING_BACKET : (context, payload) => {
      return Axios.post('/serv-data/backet-book', payload)
      .then((response) => {
          context.commit('CLEAR_BACKET');
          return response;

      })
      .catch(error => {
        return error;
      });
    },

  },
}
