import Home from './components/Home.vue'
import Movie from './components/Movie.vue'
import TopRated from './components/TopRated.vue'
import LatestMovie from './components/LatestMovie.vue'
import SearchResults from './components/SearchResults.vue'

export default {
  mode: 'history',

  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/topRated',
      name: 'topRated',
      component: TopRated
    },
    {
      path: '/latestMovie',
      name: 'latestMovie',
      component: LatestMovie
    },
    {
      path: '/movie/:id',
      name: 'movie',
      props: true,
      component: Movie
    },
    {
      path: '/search/:query',
      name: 'search',
      props: true,
      component: SearchResults
    }
  ]
}