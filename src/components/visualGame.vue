<template>
  <div
    class="wrapper"
    @mousemove="getClient"
    :class="{
      wrapperChangePositionLeft: change,
    }"
  >
    <div
      class="shadow"
      :style="{ transform: `translate(${x}px, ${y}px)` }"
      ref="shadow"
    ></div>
  </div>
</template>

<script>
export default {
  name: "product",
  data() {
    return {
      x: 0,
      y: 0,
      change: false,
    };
  },
  methods: {
    getClient(e) {
      let x = e.clientX - document.documentElement.clientWidth * 1.5;
      let y = e.clientY - document.documentElement.clientHeight * 1.5;

      this.x = x;
      this.y = y;

      if (y > -600) {
        this.change = true;
      } else {
        this.change = false;
      }

      //   this.$refs.shadow.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
    },
    changeBkPosition() {
      let x = e.clientX - document.documentElement.clientWidth * 1.5;
      let y = e.clientY - document.documentElement.clientHeight * 1.5;
    },
  },
  mounted() {
    document.addEventListener("mousemove", this.getClient);
    document.addEventListener("touchmove", this.getClient);
  },
};
</script>

<style scoped lang="scss">
body {
  margin: 0;
  padding: 0;
}

.wrapper {
  height: 100vh;
  background-image: url("https://churaumi.okinawa/userfiles/images/area/kuroshio/media-03.jpg");
  background-size: cover;
  position: relative;
  overflow: hidden;
  background-position: top;
  transition: 2s;
}
.wrapperChangePositionLeft {
  background-position: bottom;
}

.shadow {
  position: absolute;
  width: 200vw;
  height: 200vh;
  left: 50%;
  top: 50%;
  transform: translateX(-50%) translateY(-50%);
  background-image: radial-gradient(circle at center, transparent, #000 20%);
}
</style>

<!-- const shadow = document.querySelector('.shadow');

document.addEventListener('mousemove', (e) => {
  let x = e.clientX - (document.documentElement.clientWidth * 1.5);
  let y = e.clientY - (document.documentElement.clientHeight * 1.5);
  shadow.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
}) -->
