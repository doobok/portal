<template>
  <div>

        <button
        class="uk-button uk-button-large uk-width-1-1 bg-green uk-light"
        @click="addToBacket"
        ><i class="fas fa-receipt"></i> Додати в кошик</button>

    <div ref="modalbuy" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header uk-text-center">
              <p class="uk-h5 uk-margin-remove-vertical uk-text-muted">Ваше замовлення:</p>
              <p class="uk-h3 uk-margin-remove-vertical">{{title}}</p>
              <p class="uk-h5 uk-margin-remove-vertical uk-text-muted">успішно додано в кошик</p>
            </div>
            <div class="uk-modal-body uk-flex uk-flex-center">

              <div class="uk-grid-small uk-flex-middle" uk-grid>
                  <div class="uk-width-expand">
                    <p class="uk-text-meta">Тепер Ви можете перейти в кошик і завершити процедуру оформлення, або повернутися до перегляду сайту. Продовжити оформлення можна в будь-який зручний момент.</p>
                  </div>
              </div>
            </div>
            <div class="uk-modal-footer uk-flex uk-flex-center">
              <a class="uk-button uk-button-danger" href="/user/backet">Оформити</a>
              <button class="uk-button uk-button-default uk-modal-close uk-text-truncate" type="button">Приховати</button>
            </div>
        </div>
    </div>

  </div>

</template>

<script>
    export default {
        props: ['title',
                'price',
                'model',
                'model_id'
            ],
        methods: {
          addToBacket() {
            this.$store.dispatch('ADD_TO_BACKET', this.collect)
            .then((res) => {
              if (res) {
                // console.log('ok');
                UIkit.modal(this.$refs.modalbuy).show();
              }
            })
          }
       },
       computed: {
         collect: function() {
           let itm = {
             title: this.title,
             price: this.price,
             model: this.model,
             model_id: this.model_id
           };
           return itm;
         },
       }
    }

</script>
