<template>
  <div id="searc">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <div class="mdl-layout-spacer"></div>
        <div
          class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
          <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
            <i class="material-icons">search</i>
          </label>
          <div class="mdl-textfield__expandable-holder">
            <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp" v-model="input" placeholder="Search for movies.."/>
            <button class="btn text-white" @click="searchResult(results)">Search</button>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  // name: 'search',

  data: function () {
    return {
      input: '',
      results: []
    }
  },

  computed: {
    filteredSearch: function() {
      return this.input.trim()
    }
  },

  method: {
    searchResult(results) {
      console.log(results)
      // this.$router.push('/movie/search/' + results)
    }
  },

  mounted() {
    axios.get(`https://api.themoviedb.org/3/search/movie?api_key=5f5cc4cec8c4b74023cc7963417ca5d2&language=en-US&query=${this.filteredSearch}&page=1&include_adult=false`)
    .then(res => 
      this.results = res.data 
    )
  }
};
</script>

<style>
</style>