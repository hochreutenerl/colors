<template>
  <div id="app">
    <Colors/>
  </div>
</template>

<script>
import Colors from './components/Colors.vue'

export default {
  name: 'App',
  components: {
    Colors
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
