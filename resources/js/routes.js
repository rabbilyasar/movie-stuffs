import Home from './components/Home.vue'
import Movie from './components/Movie.vue'

export default {
  mode: 'history',

  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/movie/:id',
      name: 'movie',
      props: true,
      component: Movie
    }
  ]
}