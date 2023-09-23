<template>
  <div class="test1"></div>
  <div></div>
</template>
<script>
export default {
  data() {
    return {};
  },
  mounted() {},
  methods: {},
};
</script>

<style scoped lang="scss">
.test1 {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  border: 1.3px #79ddef solid;
  transition: 3s;
  animation: 5s paoPao1 infinite, 5s paoPao2 infinite linear;
  position: absolute;
  top: 50%;
}
@keyframes paoPao1 {
  0% {
    translate: 0;
    opacity: 1;
  }

  100% {
    translate: 0 -100px;
    opacity: 0;
  }
}
@keyframes paoPao2 {
  0% {
    transform: translateX(0px);
    opacity: 1;
  }
  25% {
    transform: translateX(15px);
  }
  50% {
    transform: translateX(0px);
  }
  75% {
    transform: translateX(-10px);
  }
  100% {
    transform: translateX(0px);
    opacity: 0;
  }
}
</style>
