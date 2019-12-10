<template>
  <div class="uk-form-stacked uk-flex uk-flex-center">

    <div class="uk-tile-muted uk-padding uk-width-2-3@m">

      <template v-if="!sended">
        <legend class="uk-legend">Форма створення ініціативи</legend>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Заголовок</label>
            <div class="uk-form-controls">
                <input v-model="title" class="uk-input" type="text">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Короткий опис</label>
            <div class="uk-form-controls">
                <textarea v-model="teaser" class="uk-textarea" rows="3"></textarea>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Повний опис</label>
            <div class="uk-form-controls">
                <textarea v-model="body" class="uk-textarea" rows="5"></textarea>
            </div>
        </div>

        <div class="uk-margin">
            <div uk-form-custom>
                <input type="file">
                <button class="uk-button uk-button-default" type="button" tabindex="-1">Виберіть зображення</button>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Максимальна кількість учасників</label>
            <div class="uk-form-controls">
              <input v-model="vac_num" class="uk-input uk-width-medium" type="number">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Час початку</label>
            <div class="uk-form-controls">
              <input v-model="date_start" class="uk-input uk-width-medium" type="datetime-local">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Час завершення реєстрації</label>
            <div class="uk-form-controls">
              <input v-model="date_regfinish" class="uk-input uk-width-medium" type="datetime-local">
            </div>
        </div>

        <div class="uk-margin-medium-top uk-text-center">
            <button @click="send" class="uk-button uk-button-primary uk-width-1-2@m">Подати ініціативу <i class="fas fa-file-import"></i></button>
        </div>
      </template>

      <template v-if="sended">
        <legend class="uk-legend">Ініціатива успішно відправлена! <i class="fas fa-check-circle"></i></legend>
        <p>Вітаємо! Ви успішно сформували майбутню ініціативу! Нам потрібен деякий час, щоб перевірити її на відповідність вимогам.</p>
        <p>Ви можете відслідковувати статуси усіх поданих Вами ініціатив на сторінці <a href="/home">власного профілю</a>. </p>
      </template>

    </div>
</div>
</template>

<script>
export default{
  props:['user_id'],
  data(){
      return{
        title: '',
        teaser: '',
        body: '',
        image: '',
        vac_num: '',
        date_start: '',
        date_regfinish: '',
        sended: false,
      }
  },
  mounted: function () {

  },
  methods: {
    send() {
      axios
          .post('/serv-data/initiative-add', this.collectedForm)
          .then(response => {
            this.sended = true;
            console.log(response);
            if (response.data.status === 201) {
              alert('Ініціатива відправлена! Очікуйте розгляду модератором')
            }
          })
          .catch(err => {
              let e = { ...err    }
              alert('Error! - ' + e.response.data.message)
            });
    }
  },
  computed: {
    collectedForm: function() {
            return {
              title: this.title,
              teaser: this.teaser,
              body: this.body,
              image: this.image,
              vac_num: this.vac_num,
              date_start: this.date_start,
              date_regfinish: this.date_regfinish,
              user_id: this.user_id
            };
          },

  }
}
</script>
