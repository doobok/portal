<template>
  <div class="uk-form-stacked uk-flex uk-flex-center">

    <div class="uk-tile-muted uk-padding uk-width-2-3@m">

      <template v-if="!sended">
        <form @submit.prevent="send" enctype='multipart/form-data'>

          <legend class="uk-legend">Новина</legend>

          <div class="uk-margin">
              <label class="uk-text-muted">Назва
                <span class="uk-text-small">(максимально - {{ $v.title.$params.maxLength.max }} cимволів)</span>
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
              <label class="uk-text-muted">Вступний текст
                <span class="uk-text-small">(максимально - {{ $v.teaser.$params.maxLength.max }} cимволів)</span>
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
              <label class="uk-text-muted">Текст
                <span class="uk-text-small">({{ $v.body.$params.minLength.min }}  - {{ $v.body.$params.maxLength.max }} cимволів)</span>
              </label>
              <div class="uk-form-controls">
                  <wysiwyg v-model="body" class="uk-textarea" placeholder="Повний текст новини" rows="4" @blur="$v.body.$touch()" />
                  <div class="uk-alert uk-alert-danger" v-if="$v.body.$error">
                       <template v-if="!$v.body.maxLength">
                         Довжина не має перевищувати {{ $v.body.$params.maxLength.max }} cимволів
                       </template>
                       <template v-if="!$v.body.minLength">
                         Мінімальна довжина {{ $v.body.$params.minLength.min }} cимволів
                       </template>
                       <template v-else>
                         Поле обовʼязкове для заповнення
                       </template>
                   </div>
              </div>

          </div>

          <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Зображення в форматі jpeg розміром до 5 Мб</label>
            <div uk-form-custom="target: true">
                <input id="file" ref="file" type="file" required @change="onAttachmentChange">
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Виберіть зображення" disabled>
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
              >Відправити <i class="fas fa-share"></i></i></button>
          </div>
        </form>
      </template>

      <template v-if="sended">
        <div class="uk-alert-success uk-padding">
          <legend class="uk-legend"><i class="fas fa-check-circle uk-margin-right"></i>Новина успішно відправлена!</legend>
          <hr>
          <p>Нам потрібен деякий час, щоб її опрацювати.</p>
        </div>
      </template>

    </div>
</div>
</template>

<script>
import { required, maxLength, minLength } from "vuelidate/lib/validators";
export default{
  props:['user'],
  data(){
      return{
        user_id: '',
        title: '',
        teaser: '',
        body: '',
        image: '',
        sended: false,
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
          .post('/serv-data/news-add', this.collectedForm)
          .then(response => {
            this.sended = true;
          })
          .catch(err => {
            let e = { ...err    }
            alert('Отакої! - Ви допустили помилку. Виправте і спробуйте ще ;)');
            this.errors = e.response.data.errors;
            // console.log(e.response.data);
            console.log(e);
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
          maxLength: maxLength(200),
        },
        body: {
          required,
          minLength: minLength(300),
          maxLength: maxLength(2000),
        },
      },
}
</script>
