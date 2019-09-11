<template>
  <div id="singleMovie">
    <div v-if="loading" class="loader"></div>
    <div
      class="demo-card-wide mdl-card mdl-shadow--2dp"
      v-bind:style="{ 'background-image': 'url(' + `https://image.tmdb.org/t/p/original${singleMovie.backdrop_path}` + ')' }"
    >
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text text-center text-primary">
          <a :href="homepageLink" target="blank">{{singleMovie.title}}</a>
        </h2>
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
        <span class="text-bold text-success">
          <h4>Overview:</h4>
        </span>
        {{singleMovie.overview}}
      </div>
      <div class="mdl-card__supporting-text text-light m-auto">
        <span class="text-bold text-success">
          <h4>Rating:</h4>
        </span>
        <h5 class="text-info">
          <span>{{singleMovie.vote_average}}/10</span>
          ({{singleMovie.vote_count}})
        </h5>
        <Rating @ratingValue="rateResult"></Rating>
        <button @click="clicked">Rate it!</button>
        <!-- <StarRating v-model="ratingValue"></StarRating> -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Rating from "./Rating";
import StarRating from 'vue-star-rating'

export default {
  props: ["id"],

  components: {
    Rating,
    StarRating
  },

  data: function() {
    return {
      homepage: "",
      movie_url: "http://api.themoviedb.org/3/movie",
      api: "5f5cc4cec8c4b74023cc7963417ca5d2",
      tubeLink: "https://www.youtube.com/embed/",
      singleMovie: "",
      fullLink: "",
      key: "",
      token: this.$route.query.request_token,
      loading: true,
      ratingValue: ''
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
      })
      .then(function() {
        if (!this.session_id) {
        }
      });

    if (this.token) {
      axios
        .post(
          `https://api.themoviedb.org/3/authentication/guest_session/new?api_key=${this.api}`,
          { "request_token": this.token }
        )
        .then(res => {
          // if (typeof this.ratingValue == 'string') {
          //   this.ratingValue =JSON.parse(this.ratingValue)
          // }

          console.log(this.ratingValue)

          axios
            .post(
              `https://api.themoviedb.org/3/movie/${this.id}/rating?api_key=${this.api}&guest_session_id=${res.data.guest_session_id}`,
              { "value": this.ratingValue }
            )
            .then(res => "entry succesful")
            .catch(err => console.log(err));
        });
    }
  },

  methods: {
    clicked() {
      axios
        .get(
          `https://api.themoviedb.org/3/authentication/token/new?api_key=${this.api}`
        )
        .then(
          function(resp) {
            let data = resp.data;
            window.location.href = `https://www.themoviedb.org/authenticate/${data.request_token}?redirect_to=${location.protocol}//${location.host}/movie/${this.id}`;
          }.bind(this)
        );
    },
    rateResult(data) {
      this.ratingValue = data;
    }
  },

  computed: {
    homepageLink() {
      return (this.homepage = this.singleMovie.homepage);
    },
    createLink() {
      return this.tubeLink + this.singleMovie.videos.results[0].key;
    },

  }
};
</script>

<style scoped>
.green {
  color: green;
}

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
.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid black; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

a {
  text-decoration: none;
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