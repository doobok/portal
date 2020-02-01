<template>
  <div>
    <button class="uk-button uk-button-small uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-msg-send">
      <i class="fas fa-paper-plane uk-margin-small-right"></i> Надіслати повідомлення
    </button>

    <div id="modal-msg-send" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
          <template v-if="!sended">
            <form @submit.prevent="send">
              <p class="uk-modal-title">Повідомлення</p>
              <div class="uk-margin">
                <textarea
                  v-model="msg"
                  class="uk-textarea"
                  placeholder="Введіть текст повідомлення"
                  rows="5"
                  @blur="$v.msg.$touch()">
                </textarea>
                <div class="uk-alert uk-alert-danger" v-if="$v.msg.$error">
                     Довжина повідомлення має бути в межах {{ $v.msg.$params.minLength.min }} - {{ $v.msg.$params.maxLength.max }} символів
                 </div>
              </div>
              <p class="uk-text-center">
                  <button class="uk-button uk-button-small uk-button-default uk-modal-close" type="button">Скасувати</button>
                  <button class="uk-button uk-button-small uk-button-primary"
                  type="submit"
                  :disabled="$v.$invalid"
                  >Відправити</button>
              </p>
            </form>
          </template>
          <template v-if="sended">
            <div class="uk-alert-success" uk-alert>
                <p><i class="fas fa-check uk-margin-small-right"></i> Ваше повідомлення успішно відправлено</p>
            </div>

          </template>

        </div>
    </div>

  </div>
</template>

<script>
import { required, minLength, maxLength } from "vuelidate/lib/validators";
export default{
  props:['to'],
  data(){
      return{
          msg: '',
          sended: false
      }
  },
  methods: {
    send() {
      axios
          .post('/serv-data/msg-send', {to: this.to, message: this.msg})
          .then(response => {
            this.sended = true;
          })
          .catch(err => {
            let e = { ...err    }
            alert('Помилка відправки, спробуйте повторити спробу через деякий час.');
          });
    },
  },
  validations: {
        msg: {
          required,
          maxLength: maxLength(200),
          minLength: minLength(10),
        },
      },

}
</script>
