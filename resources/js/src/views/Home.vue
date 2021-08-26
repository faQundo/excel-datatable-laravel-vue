<template>
  <div class="home">
    <!-- <img alt="Vue logo" :src="logo" /> -->
    <HelloWorld msg="Welcome to Your Vue.js App" />
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "../components/HelloWorld.vue";
import logo from '../assets/logo.svg';

export default {
  name: "Home",
  components: {
    HelloWorld,
  },

  data: () => ({
    logo: logo,
  }),
};
</script>
