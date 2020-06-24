<template>
  <div class="uk-form-stacked uk-flex uk-flex-center">

    <div class="uk-tile-muted uk-padding uk-width-2-3@m">

      <template v-if="!sended">
        <form @submit.prevent="send" enctype='multipart/form-data'>

          <legend class="uk-legend">Заявка експерта</legend>

          <div v-if="!user" class="uk-alert-danger" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p>Ви не зможете відправити форму доки не авторизуєтесь</p>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Прізвище та Імʼя
                <span class="uk-text-small">(максимально - {{ $v.name.$params.maxLength.max }} cимволів)</span>
              </label>
              <div class="uk-form-controls">
                  <input v-model="name" class="uk-input" type="text" @blur="$v.name.$touch()">
                  <div class="uk-alert uk-alert-danger" v-if="$v.name.$error">
                       <template v-if="!$v.name.maxLength">
                         Довжина не має перевищувати {{ $v.name.$params.maxLength.max }} cимволів
                       </template>
                       <template v-else>
                         Поле обовʼязкове для заповнення
                       </template>
                   </div>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Спеціалізація
                <span class="uk-text-small">(максимально - {{ $v.speciality.$params.maxLength.max }} cимволів)</span>
              </label>
              <div class="uk-form-controls">
                  <input v-model="speciality" class="uk-input" type="text" @blur="$v.speciality.$touch()">
                  <div class="uk-alert uk-alert-danger" v-if="$v.speciality.$error">
                       <template v-if="!$v.speciality.maxLength">
                         Довжина не має перевищувати {{ $v.speciality.$params.maxLength.max }} cимволів
                       </template>
                       <template v-else>
                         Поле обовʼязкове для заповнення
                       </template>
                   </div>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Навики - перерахуйте через кому
                <span class="uk-text-small">(максимально - {{ $v.skills.$params.maxLength.max }} cимволів)</span>
              </label>
              <div class="uk-form-controls">
                  <input v-model="skills" class="uk-input" type="text" @blur="$v.skills.$touch()">
                  <div class="uk-alert uk-alert-danger" v-if="$v.skills.$error">
                       <template v-if="!$v.skills.maxLength">
                         Довжина не має перевищувати {{ $v.skills.$params.maxLength.max }} cимволів
                       </template>
                       <template v-else>
                         Поле обовʼязкове для заповнення
                       </template>
                   </div>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">BIO
                <span class="uk-text-small">({{ $v.bio.$params.minLength.min }}  - {{ $v.bio.$params.maxLength.max }} cимволів)</span>
              </label>
              <div class="uk-form-controls">
                  <wysiwyg v-model="bio" class="uk-textarea" placeholder="Коротко про себе" rows="3" @blur="$v.bio.$touch()" />
                  <div class="uk-alert uk-alert-danger" v-if="$v.bio.$error">
                       <template v-if="!$v.bio.maxLength">
                         Довжина не має перевищувати {{ $v.bio.$params.maxLength.max }} cимволів
                       </template>
                       <template v-if="!$v.bio.minLength">
                         Мінімальна довжина {{ $v.bio.$params.minLength.min }} cимволів
                       </template>
                       <template v-else>
                         Поле обовʼязкове для заповнення
                       </template>
                   </div>
              </div>

          </div>

          <div class="uk-margin">
            <label class="uk-form-label uk-text-muted">Фото в форматі jpeg розміром до 5 Мб</label>
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
              >Стати експертом <i class="fas fa-share"></i></i></button>
          </div>
        </form>
      </template>

      <template v-if="sended">
        <div class="uk-alert-success uk-padding">
          <legend class="uk-legend"><i class="fas fa-check-circle uk-margin-right"></i>Заявка успішно відправлена!</legend>
          <hr>
          <p>Ви успішно сформували заявку! Нам потрібен деякий час, щоб опрацювати її.</p>
          <p>При позитивному рішенні ви побачите це на сторінці <a class="uk-link-text" href="/home"><b>профілю</b></a>. </p>
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
        name: '',
        speciality: '',
        skills: '',
        bio: '',
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
          .post('/serv-data/expert-add', this.collectedForm)
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
        data.append('name', this.name)
        data.append('speciality', this.speciality)
        data.append('skills', this.skills)
        data.append('bio', this.bio)
        data.append('image', this.image)
        data.append('user_id', this.user_id)
      return data;
    },
  },
  validations: {
        name: {
          required,
          maxLength: maxLength(50),
        },
        speciality: {
          required,
          maxLength: maxLength(30),
        },
        skills: {
          required,
          maxLength: maxLength(100),
        },
        bio: {
          required,
          minLength: minLength(200),
          maxLength: maxLength(500),
        },
      },
}
</script>
