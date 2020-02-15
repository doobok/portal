<template>
  <div>
    <template v-if="!empty">
      <div class="uk-overflow-auto">
        <table class="uk-table uk-table-divider uk-table-middle uk-table-small">
          <thead>
              <tr>
                  <th class="uk-table-expand">Назва</th>
                  <th class="uk-width-auto">Ціна (грн)</th>
                  <th class="uk-table-shrink"></th>
              </tr>
          </thead>
          <tbody>
            <template v-for="item in backet">
              <tr>

                  <td><a class="uk-link-muted" :href="item.uri">{{item.title}}</a></td>
                  <td><b>{{item.price.toLocaleString()}}</b> </td>
                  <td><a class="uk-link-reset" title="Видалити позицію"><i class="fas fa-trash-alt" @click="removeEl(item)"></i></a></td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
      <hr>
      <div class="uk-flex uk-flex-right uk-margin-top">
        <span class="uk-text-large">Вартість: <b>{{priceCalc.toLocaleString()}}</b> грн. </span>
        <button class="uk-button uk-button-danger uk-margin-left" @click="ordered">Оплатити</button>
      </div>
    </template>
    <template v-if="empty">
      <div class="uk-flex uk-text-center uk-flex-center">
          <div class="uk-card uk-card-default uk-card-small uk-width-1-1">
            <div class="uk-card-header">
                <h2 class="uk-h3">Кошик порожній <i class="far fa-times-circle"></i></h2>
            </div>
            <div class="uk-card-body">
                <p>Для початку додайте товари</p>
            </div>
           </div>
      </div>

    </template>

    <div ref="orderform" uk-modal>

        <!-- <store-cart-form :items="backet" :price="priceCalc"></store-cart-form> -->

    </div>
  </div>


</template>

<script>
export default {

    data(){
        return{
            // name: '',

        }
    },
    methods: {

      removeEl(item) {
        if (confirm('Ви дійсно бажаєте видалити ' + item.title + ' із кошика?')) {
          this.$store.dispatch('REM_FROM_BACKET', { id: item.id });
        }
      },
      ordered () {
        this.$store.dispatch('BOOKING_BACKET', { price: this.priceCalc})
        .then((res) => {
          if (res.status === 202) {
            console.log('ok');
          }
        });
      }
    },
    computed: {
      backet () {
      return this.$store.getters.ITEMS;
      },
      priceCalc () {
        let summ = this.backet.reduce(function(prev, itm) {
          return prev + itm.price;
        }, 0);
        return summ;
      },
      empty () {
        if (this.backet.length > 0) {
          return false;
        } else {
          return true;
        }
      }
    }
  }

</script>
