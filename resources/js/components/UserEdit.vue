<template>
  <div class="uk-form-stacked uk-flex uk-flex-center">

    <div class="uk-tile-muted uk-padding uk-width-2-3@m">

      <template>
        <form @submit.prevent="send" enctype='multipart/form-data'>

          <div class="uk-flex uk-flex-center">
            <img class="uk-border-circle" width="200" height="200" :src="'/storage/' + avatar">
          </div>

          <div class="uk-margin uk-text-center">
            <div uk-form-custom="target: true">
                <input id="file" ref="file" type="file" @change="onAttachmentChange">
                <input class="uk-input uk-width-medium" type="text" placeholder="Завантажте зображення профілю" disabled>
            </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">E-mail</label>
              <div class="uk-form-controls">
                  <input v-model="email" class="uk-input" type="text" disabled>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Імʼя користувача</label>
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
              <label class="uk-text-muted">Коротко про себе
              </label>
              <div class="uk-form-controls">
                  <textarea v-model="teaser" class="uk-textarea" rows="4"></textarea>
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
              >Зберегти <i class="fas fa-save uk-margin-small-left"></i></button>
          </div>
        </form>
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
        name: '',
        email: '',
        teaser: '',
        avatar: '',
        errors: '',
      }
  },
  mounted: function () {
    let usr = JSON.parse(this.user);
    this.user_id = usr.id;
    this.name = usr.name;
    this.email = usr.email;
    this.avatar = usr.avatar;
  },
  methods: {
    send() {
      console.log(this.collectedForm);
      axios
          .post('/serv-data/user-update/' + this.user_id, this.collectedForm)
          .then(response => {
            if (response.status === 201) {
              window.location.href = '/home'
            }
          })
          .catch(err => {
            let e = { ...err    }
            alert('Щось пішло не так, перевірте форму і спробуйте ще ;)');
            this.errors = e.response.data.errors;
            // console.log(e.response.data);
          });
    },
    onAttachmentChange (e) {
            // this.imgselected = true;
            this.image = e.target.files[0]
        }
  },
  computed: {
    collectedForm: function() {
      const data = new FormData();
        data.append('name', this.name)
        data.append('teaser', this.teaser)
        data.append('body', this.body)
        if (this.image) {
          data.append('avatarprsnt', true)
        }
        data.append('avatar', this.image)
        data.append('user_id', this.user_id)
      return data;
    },
  },
  validations: {
        name: {
          required,
          maxLength: maxLength(50),
        },
      },
}
</script>
