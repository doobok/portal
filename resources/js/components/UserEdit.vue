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
              <label class="uk-text-muted">Імʼя користувача</label>
              <div class="uk-form-controls">
                  <input v-model="name" class="uk-input" type="text" disabled>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">E-mail</label>
              <div class="uk-form-controls">
                  <input v-model="email" class="uk-input" type="text" disabled>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Ваше імʼя</label>
              <div class="uk-form-controls">
                  <input v-model="first_name" class="uk-input" type="text" @blur="$v.first_name.$touch()">
                  <div class="uk-alert uk-alert-danger" v-if="$v.first_name.$error">
                      Довжина не має перевищувати {{ $v.first_name.$params.maxLength.max }} cимволів
                   </div>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Прізвище</label>
              <div class="uk-form-controls">
                  <input v-model="last_name" class="uk-input" type="text" @blur="$v.last_name.$touch()">
                  <div class="uk-alert uk-alert-danger" v-if="$v.last_name.$error">
                      Довжина не має перевищувати {{ $v.last_name.$params.maxLength.max }} cимволів
                   </div>
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-text-muted">Номер телефону</label>
              <div class="uk-form-controls">
                  <input
                      ref="phoneNum"
                      id="phone"
                      type="text"
                      name="phone"
                      class="uk-input"
                      placeholder="Контактний номер"
                      v-model="phone"
                  >
              </div>
          </div>


          <div class="uk-margin">
              <label class="uk-text-muted">Коротко про себе
              </label>
              <div class="uk-form-controls">
                  <textarea v-model="salute" class="uk-textarea" rows="5" @blur="$v.salute.$touch()"></textarea>
              </div>
              <div class="uk-alert uk-alert-danger" v-if="$v.salute.$error">
                  Не поспішай, в це поле можна додати максимум {{ $v.salute.$params.maxLength.max }} cимволів
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
import Inputmask from 'inputmask';
import { required, maxLength } from "vuelidate/lib/validators";
export default{
  props:['user'],
  data(){
      return{
        user_id: '',
        name: '',
        first_name: '',
        last_name: '',
        phone: '',
        email: '',
        salute: '',
        avatar: '',
        errors: '',
      }
  },
  mounted: function () {
    let usr = JSON.parse(this.user);
    this.user_id = usr.id;
    this.name = usr.name;
    this.first_name = usr.first_name;
    this.last_name = usr.last_name;
    this.phone = usr.phone;
    this.salute = usr.salute;
    this.email = usr.email;
    this.avatar = usr.avatar;

    var im = new Inputmask('+99 '+'(999) 999-9999');
    im.mask(this.$refs.phoneNum);
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
          });
    },
    onAttachmentChange (e) {
            this.image = e.target.files[0]
        }
  },
  computed: {
    collectedForm: function() {
      const data = new FormData();
        if (this.first_name) {
          data.append('first_name', this.first_name)
        }
        if (this.last_name) {
          data.append('last_name', this.last_name)
        }
        if (this.phoneComp) {
          data.append('phone', this.phoneComp)
        }
        if (this.salute) {
          data.append('salute', this.salute)
        }
        if (this.image) {
          data.append('avatarprsnt', true)
        }
        data.append('avatar', this.image)
        data.append('user_id', this.user_id)
      return data;
    },
    phoneComp: function() {
        var str = this.phone;
        str = str.replace(/[^0-9.]/g, '');
        // str = str.substring(2);
        return str;
    }
  },
  validations: {
        first_name: {
          maxLength: maxLength(20),
        },
        last_name: {
          maxLength: maxLength(30),
        },
        salute: {
          maxLength: maxLength(300),
        },
      },
}
</script>
