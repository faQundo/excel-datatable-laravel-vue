<template>
  <v-app>
    <!-- <div id="nav">
      <router-link to="/">Welcome</router-link>
      <router-link to="/upload">Upload</router-link>
      <router-link to="/contracts">Contracts</router-link>
      <router-link to="/rates">Rates</router-link>

    </div> -->
 <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="/">
    <img src="https://cargofive.com/wp-content/uploads/2018/07/logo.svg" width="100" height="50" alt="logo">
  </a>
</nav>
    <router-view/>
  </v-app>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>

<script>
import HelloWorld from './components/HelloWorld';

export default {
  name: 'App',

  components: {
    HelloWorld,
  },

  data: () => ({
    //
  }),
};
</script>
