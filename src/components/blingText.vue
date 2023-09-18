<template>
  <p>{{ $t('DIDADIDA海洋館') }}</p>
</template>

<script>
export default {
  data() {
    return {};
  },
  mounted() { },
  methods: {},
};
</script>

<style scoped lang="scss">
body {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #000;
}

p {
  position: relative;
  //   font-family: sans-serif;
  text-transform: uppercase;
  font-size: 2em;
  letter-spacing: 4px;
  overflow: hidden;
  background: linear-gradient(90deg, rgba(255, 255, 255, 0), #fff, rgba(255, 255, 255, 0));
  background-repeat: no-repeat;
  background-size: 80%;
  font-weight: 700;
  animation: animate 5s linear infinite;
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(255, 255, 255, 0);
}

@keyframes animate {
  0% {
    background-position: -300%;
  }

  100% {
    background-position: 300%;
  }
}
</style>
