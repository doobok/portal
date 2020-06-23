<template>

  <div class="uk-tile-muted s-panel">

    <a :class="{ 'uk-float-right': show}">
      <i v-on:click="show = !show, results = []"
        class="fas fa-search"
        :class="{ 'fa-times': show}">
      </i>
    </a>
    <input v-if="show" v-model="keywords" class="uk-input s-input uk-width-5-6" type="text" placeholder="Введіть пошуковий запит">

    <ul class="uk-list uk-list-bullet" v-if="results.length > 0">
        <li v-for="result in results">
            <a :href="'/' + result.uri" :key="result.id" class="uk-link-muted" v-html="highlight(result.title)"></a>
        </li>
    </ul>
  </div>

</template>

<script>

function debounce(fn, delay = 300) {
	var timeoutID = null;

    return function () {
		clearTimeout(timeoutID);

        var args = arguments;
        var that = this;

        timeoutID = setTimeout(function () {
        	fn.apply(that, args);
        }, delay);
    }
};

export default{
  data(){
      return{
          show: false,
          keywords: null,
          results: []
      }
  },
  watch: {
        keywords(after, before) {
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('/serv-data/search', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => console.log(error));
        },
        highlight(text) {
            return text.replace(new RegExp(this.keywords, 'gi'), '<span class="uk-alert-warning">$&</span>');
        },
    }

}
</script>

<style>
.s-panel {
  border-radius: 30px;
  padding:15px;
},
.s-input {
  border-radius: 15px;
}
</style>
