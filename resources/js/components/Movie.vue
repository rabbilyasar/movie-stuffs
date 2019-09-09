<template>
  <div id="singleMovie">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp" v-bind:style="{ 'background-image': 'url(' + `https://image.tmdb.org/t/p/w500${singleMovie.backdrop_path}` + ')' }">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">{{singleMovie.title}}</h2>
      </div>
      <div class="mdl-card__supporting-text m-auto">
        <iframe width="800" height="315" 
          :src="createLink"
          frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        </iframe>
      </div>
      <div class="mdl-card__supporting-text text-dark">
        {{singleMovie.overview}}
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
      singleMovie: "",
      fullLink: '',
      key: '',
      tubeLink:'https://www.youtube.com/embed/'
    };
  },

  mounted() {
    axios
      .get(
        `http://api.themoviedb.org/3/movie/${this.id}?api_key=5f5cc4cec8c4b74023cc7963417ca5d2&append_to_response=videos`
      )
      .then(res => 
        this.singleMovie = res.data
        // console.log(res.data)
      );
  },
  computed: {
    createLink() {
     return this.tubeLink + this.singleMovie.videos.results[0].key
    }
  }
};
</script>

<style>
</style>