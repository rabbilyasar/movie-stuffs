<template>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <Search></Search>
    <div class="mdl-layout__drawer">
        <router-link :to="{name: 'home'}" class="mdl-layout-title title">MOVIE&STUFFS</router-link>
      <nav class="mdl-navigation">
        <router-link :to="{name: 'home'}" class="mdl-navigation__link">Home</router-link>
        <router-link :to="{name: 'topRated'}" class="mdl-navigation__link">Top Rated</router-link>
        <router-link :to="{name: 'latestMovie'}" class="mdl-navigation__link">Latest Movies</router-link>
      </nav>
    </div>
    <main class="mdl-layout__content">
      <div class="page-content">
        <div class="container">
          <div class="d-flex justify-content-center">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Search from "./components/SearchMovie";
export default {
  components: {
    Search
  }
};
</script>

<style scoped>

.title{
  text-decoration: none;
}

</style>