<template>
  <div id="home">
    <div class="movie-section p-3" v-for="totalResponse in totalResponses" :key="totalResponse.id">
      <div class="demo-card-wide mdl-card mdl-shadow--2dp" v-bind:style="{ 'background-image': 'url(' + `https://image.tmdb.org/t/p/w500${totalResponse.backdrop_path}` + ')' }" >
        <div class="mdl-card__title">
          <h2 class="mdl-card__title-text text-light">{{totalResponse.title}}</h2>
        </div>
        <div class="mdl-card__supporting-text text-light">
          {{totalResponse.overview}}
        </div>
        <div class="mdl-card__actions mdl-card--border">
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect text-light" @click="singleMovie(totalResponse.id)">Get Details</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: function() {
    return {
      totalResponses: []
    };
  },

  mounted() {
    axios
      .get(
        "https://api.themoviedb.org/3/movie/popular?api_key=5f5cc4cec8c4b74023cc7963417ca5d2&language=en-US&page=1"
      )
      .then(res => (this.totalResponses = res.data.results))
      .catch(err => console.log(err));
  },
  methods: {
    singleMovie (id) {
      this.$router.push('/movie/' + id)
    }
  }
};
</script>

<style>
.demo-card-wide.mdl-card {
  width: 500px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 60px;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>