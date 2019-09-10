<template>
  <div id="searchRe">
    <div v-if="loading" class="loader"></div>
    <div class="text-center" v-if="noData">
      <h5>
        <strong>NO MATCHED RESULT FOR "{{query}}"</strong>
      </h5>
    </div>
    <div class="movie-section p-3" v-for="totalResponse in results" :key="totalResponse.id">
      <div
        class="demo-card-wide mdl-card mdl-shadow--2dp"
        v-bind:style="{ 'background-image': 'url(' + `https://image.tmdb.org/t/p/w500${totalResponse.poster_path}` + ')' }"
      >
        <div class="mdl-card__title">
          <h1 class="mdl-card__title-text text-light">
            <strong>{{totalResponse.title}}</strong>
          </h1>
        </div>
        <div class="mdl-card__supporting-text text-light">{{totalResponse.overview}}</div>
        <div class="mdl-card__actions mdl-card--border">
          <a
            class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect text-light bg-dark"
            @click="singleMovie(totalResponse.id)"
          >Get Details</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["query"],

  data() {
    return {
      api: "5f5cc4cec8c4b74023cc7963417ca5d2",
      results: [],
      loading: true,
      noData: false
    };
  },

  methods: {
    fetchResult(value) {
      const url = `https://api.themoviedb.org/3/search/movie?api_key=${this.api}&language=en-US&query=${value}&page=1&include_adult=false`;
      axios.get(url).then(res => {
        if (res.data.total_results) {
          this.results = res.data.results;
          this.loading = false;
          this.noData = false;
        } else {
          this.noData = true;
          this.loading = false;
        }
      });
    },
    singleMovie(id) {
      this.$router.push("/movie/" + id);
    }
  },

  mounted: function() {
    this.fetchResult(this.query);
  },

  watch: {
    query(value) {
      this.fetchResult(value);
    }
  }
};
</script>

<style scoped>
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
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>