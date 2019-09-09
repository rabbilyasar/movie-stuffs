<template>
  <div id="singleMovie">
    {{id}}
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: ['id'],

  data: function() {
    return {
      singleMovie: ''
    }
  }
}
</script>

<style>

</style>