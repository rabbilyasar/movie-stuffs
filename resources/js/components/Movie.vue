<template>
  <div id="singleMovie">
    <div
      class="demo-card-wide mdl-card mdl-shadow--2dp"
      v-bind:style="{ 'background-image': 'url(' + `https://image.tmdb.org/t/p/original${singleMovie.backdrop_path}` + ')' }"
    >
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text text-center">{{singleMovie.title}}</h2>
      </div>
      <div class="mdl-card__supporting-text m-auto">
        <iframe
          width="800"
          height="400"
          :src="createLink"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen
        ></iframe>
      </div>
    </div>
    <div class="section bg-dark">
      <div class="mdl-card__supporting-text text-light m-auto">
        <span class="text-bold">
          <h4>Overview:</h4>
        </span>
        {{singleMovie.overview}}
      </div>
      <div class="mdl-card__supporting-text text-light m-auto">
        <span class="text-bold">
          <h4>Rating:</h4>
        </span>
        <h5>{{singleMovie.vote_average}}/10 ({{singleMovie.vote_count}})</h5>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["id"],

  data: function() {
    return {
      movie_url: "http://api.themoviedb.org/3/movie",
      api: "5f5cc4cec8c4b74023cc7963417ca5d2",
      tubeLink: "https://www.youtube.com/embed/",
      singleMovie: "",
      fullLink: "",
      key: "",
      loading: true
    };
  },

  mounted() {
    axios
      .get(
        `${this.movie_url}/${this.id}?api_key=${this.api}&append_to_response=videos`
      )
      .then(res => {
        this.singleMovie = res.data;
        this.loading = false;
      });
  },
  computed: {
    createLink() {
      return this.tubeLink + this.singleMovie.videos.results[0].key;
    }
  }
};
</script>

<style scoped>
.demo-card-wide.mdl-card {
  width: auto;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: auto;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>