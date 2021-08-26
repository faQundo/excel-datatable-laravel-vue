<template>
  <div>
    <v-img
      lazy-src="https://cargofive.com/wp-content/uploads/2019/04/01Header_FCL-shipping_2.jpg"
      max-height="517"
      max-width="1366"
      content-class="background"
      src="https://cargofive.com/wp-content/uploads/2019/04/01Header_FCL-shipping_2.jpg"
    ></v-img>
    <div class="button-img">
        <v-img
        :src="logo"
        class="my-3"
        contain
        position="center center"
        height="50"
        content-class="button-img"
        @click="start()"
        />

    </div>
  </div>
</template>

<style scoped>
.background {
    position: absolute;
}
.button-img {
    position: absolute;
    top:300px;
    left:45%;
    cursor:pointer
}
</style>

<script>
import logo from "../assets/getStarted2.png";

export default {
  data: () => ({
    logo: logo,
  }),
  methods:{
      start(){
          this.$router.push("/contracts").catch(() => {});
      }
  }
};
</script>
