<template>
  <main class="path_main">
    <div class="path_container">
      <h1>DIDA DIDA</h1>

      <div class="front">
        <router-link to="/" @click="this.$store.state.chooseFrontBack = true">
          <button>前台</button>
        </router-link>
      </div>

      <!-- 尚未建立 -->

      <div class="back">
        <router-link
          to="/backHome"
          @click="this.$store.state.chooseFrontBack = true"
        >
          <button>後台</button>
        </router-link>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  components: {},
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped lang="scss">
// @import "@/assets/sass/style.scss";

main {
  background-image: url("../../public/all_images/banner.png");
  min-height: 100vh;
  background-size: cover;
  position: relative;
}
h1 {
  font-size: map-get($fontSizes, "h1");
  text-align: center;
  padding-top: 50px;
}
.front button {
  font-size: 50px;
  width: 200px;
  height: 200px;
  font-weight: 600;
  text-align: center;
  line-height: 200px;
  border: 4px map-get($colors, "mainColor") solid;
  letter-spacing: 3px;
  border-radius: 50%;
  background-color: transparent;
  // background-color: map-get($colors, "mainColor");
  color: map-get($colors, "mainColor");
  position: absolute;
  top: 30%;
  left: 30%;
  cursor: pointer;
}

.front button:hover,
.back button:hover {
  background-color: map-get($colors, "mainColor");
  color: white;
}

.back button {
  width: 200px;
  height: 200px;
  text-align: center;
  line-height: 200px;
  font-size: 50px;
  font-weight: 600;
  letter-spacing: 3px;
  border-radius: 50%;
  //   border: 0;
  background-color: transparent;
  color: map-get($colors, "mainColor");
  border: 4px map-get($colors, "mainColor") solid;
  color: map-get($colors, "mainColor");
  //   color:white;
  position: absolute;
  top: 30%;
  left: 60%;
  cursor: pointer;
}

@media screen and (max-width: 767px) {
  main {
    background-image: url("../../public/all_images/banner1.png");
  }
  .front button {
    width: 80px;
    height: 80px;
    border: 2px map-get($colors, "mainColor") solid;
    line-height: 80px;
    font-size: 25px;
    left: 20%;
  }

  .back button {
    width: 80px;
    height: 80px;
    border: 2px map-get($colors, "mainColor") solid;
    line-height: 80px;
    text-align: center;
    font-size: 25px;

    left: 60%;
  }
}
</style>
