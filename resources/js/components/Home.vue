<template>
  <div id="home">
  <div v-if="loading" class="loader"></div>
    <div class="row">
      <div class="movie-section p-3" v-for="totalResponse in totalResponses" :key="totalResponse.id">
        <div class="col-md-4">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp" v-bind:style="{ 'background-image': 'url(' + `https://image.tmdb.org/t/p/w500${totalResponse.poster_path}` + ')' }" >
            <div class="mdl-card__title">
              <h1 class="mdl-card__title-text text-light"><strong>{{totalResponse.title}}</strong></h1>
            </div>
            <div class="mdl-card__supporting-text text-light">
              {{totalResponse.overview}}
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect text-light bg-dark" @click="singleMovie(totalResponse.id)">Get Details</a>
            </div>
          </div>
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
      api_key: '5f5cc4cec8c4b74023cc7963417ca5d2',
      popular_movie: 'https://api.themoviedb.org/3/movie/popular',
      totalResponses: [],
      loading: true
    };
  },

  mounted() {
    axios
      .get(
        `${this.popular_movie}?api_key=${this.api_key}&language=en-US&page=1`
      )
      .then(res => {
        this.totalResponses = res.data.results
        this.loading = false
      })
      .catch(err => console.log(err));
  },
  methods: {
    singleMovie (id) {
      this.$router.push('/movie/' + id)
    }
  }
};
</script>

<style scoped>
/* #home{
  background: gray;
} */
.demo-card-wide.mdl-card {
  width: 500px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 500px;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid black; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>