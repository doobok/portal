<template>
  <div class="uk-form-stacked uk-flex uk-flex-center">

    <div class="uk-tile-muted uk-padding uk-width-2-3@m">

      <template v-if="!sended">
        <form @submit.prevent="send" enctype='multipart/form-data'>

          <legend class="uk-legend">Форма створення ініціативи</legend>

          <div v-if="!user" class="uk-alert-danger" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p>Ви не зможете відправити форму доки не авторизуєтесь</p>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Заголовок
                <span class="uk-text-small">(максимальна довжина тексту - {{ $v.title.$params.maxLength.max }} cимволів)</span>
              </label>
              <div class="uk-form-controls">
                  <input v-model="title" class="uk-input" type="text" @blur="$v.title.$touch()">
                  <div class="uk-alert uk-alert-danger" v-if="$v.title.$error">
                       <template v-if="!$v.title.maxLength">
                         Довжина не має перевищувати {{ $v.title.$params.maxLength.max }} cимволів
                       </template>
                       <template v-else>
                         Поле обовʼязкове для заповнення
                       </template>
                   </div>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Короткий опис
                <span class="uk-text-small">(максимальна довжина тексту - {{ $v.teaser.$params.maxLength.max }} cимволів)</span>
              </label>
              <div class="uk-form-controls">
                  <textarea v-model="teaser" class="uk-textarea" rows="3" @blur="$v.teaser.$touch()"></textarea>
                  <div class="uk-alert uk-alert-danger" v-if="$v.teaser.$error">
                       <template v-if="!$v.teaser.maxLength">
                         Довжина не має перевищувати {{ $v.teaser.$params.maxLength.max }} cимволів
                       </template>
                       <template v-else>
                         Поле обовʼязкове для заповнення
                       </template>
                   </div>
              </div>

          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Повний опис</label>
              <div class="uk-form-controls">
                  <wysiwyg v-model="body" class="uk-textarea" placeholder="Детально опишіть ініціативу" @blur="$v.body.$touch()" />
                  <div class="uk-alert uk-alert-danger" v-if="$v.body.$error">
                      Поле обовʼязкове для заповнення
                   </div>
              </div>
          </div>

          <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Оберіть зображення в форматі jpeg, png, bmp або gif, та розміром до 5 Мб</label>
            <div uk-form-custom="target: true">
                <input id="file" ref="file" type="file" required @change="onAttachmentChange">
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Виберіть зображення" disabled>
            </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Максимальна кількість учасників</label><br>
              <label><input v-model="unlim" class="uk-checkbox" type="checkbox"> не обмежувати</label>
              <template v-if="!unlim">
                <div class="uk-form-controls">
                  <input v-model="vac_num" class="uk-input uk-width-medium" type="number">
                </div>
              </template>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Час початку</label>
              <div class="uk-form-controls">
                <input v-model="date_start" class="uk-input uk-width-medium" type="datetime-local">
              </div>
          </div>

          <div class="uk-margin">
              <label><input v-model="limited" class="uk-checkbox" type="checkbox"> вказати час завершення реєстрації (інакше буде використовуватись час початку)</label>
          </div>

          <div v-if="limited" class="uk-margin">
              <label class="uk-text-muted">Час завершення реєстрації</label>
              <div class="uk-form-controls">
                <input v-model="date_regfinish" class="uk-input uk-width-medium" type="datetime-local">
              </div>
          </div>

          <div class="uk-alert uk-alert-danger" v-if="errors">
            <ul class="uk-list">
              <li v-for="err in errors">{{err}}</li>
            </ul>
           </div>

          <div class="uk-margin-medium-top uk-text-center">
              <button
              class="uk-button uk-button-primary uk-width-1-2@m"
              type="submit"
              :disabled="$v.$invalid"
              >Подати ініціативу <i class="fas fa-file-import"></i></button>
          </div>
        </form>
      </template>

      <template v-if="sended">
        <div class="uk-alert-success uk-padding">
          <legend class="uk-legend"><i class="fas fa-check-circle uk-margin-right"></i>Ініціатива успішно відправлена!</legend>
          <hr>
          <p>Вітаємо! Ви успішно сформували майбутню ініціативу! Нам потрібен деякий час, щоб перевірити її на відповідність вимогам.</p>
          <p>Ви можете відслідковувати статуси усіх поданих Вами ініціатив на сторінці <a class="uk-link-text" href="/home"><b>профілю</b></a>. </p>
        </div>
      </template>

    </div>
</div>
</template>

<script>
import { required, maxLength } from "vuelidate/lib/validators";
export default{
  props:['user'],
  data(){
      return{
        user_id: '',
        title: '',
        teaser: '',
        body: '',
        image: '',
        vac_num: '',
        date_start: '',
        date_regfinish: '',
        sended: false,
        unlim: false,
        limited: false,
        errors: '',
      }
  },
  mounted: function () {
    let uid = JSON.parse(this.user);
    this.user_id = uid.id;
  },
  methods: {
    send() {
      axios
          .post('/serv-data/initiative-add', this.collectedForm)
          .then(response => {
            this.sended = true;
          })
          .catch(err => {
            let e = { ...err    }
            alert('Отакої! - Ви допустили помилку. Виправте і спробуйте ще ;)');
            this.errors = e.response.data.errors;
            // console.log(e.response.data);
          });
    },
    onAttachmentChange (e) {
            this.image = e.target.files[0]
        }
  },
  computed: {
    collectedForm: function() {
      const data = new FormData();
        data.append('title', this.title)
        data.append('teaser', this.teaser)
        data.append('body', this.body)
        data.append('image', this.image)
        if (this.vac_num && !this.unlim) {
          data.append('vac_num', this.vac_num)
        }
        data.append('date_start', this.date_start)
        if (this.date_regfinish && this.limited) {
          data.append('date_regfinish', this.date_regfinish)
        }
        data.append('user_id', this.user_id)
      return data;
    },
  },
  validations: {
        title: {
          required,
          maxLength: maxLength(50),
        },
        teaser: {
          required,
          maxLength: maxLength(400),
        },
        body: {
          required,
        },
        date_start: {
          required,
        },
      },
}
</script>
