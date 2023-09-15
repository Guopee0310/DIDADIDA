<template>
  <div class="resultAll">
    <div class="imgDiv">
      <img :src="require('../assets/images/dida_logo.png')" alt="" />
    </div>
    <div class="finalAnsAll">
      <div class="ansTitle">恭喜完成問卷</div>
      <div class="getPoint">
        您共獲得{{ this.$store.state.quizScore }}點紅利點數
      </div>
      <div></div>
    </div>
    <router-link to="/?section=hide" class="toPoint"
      >我的紅利點數 >
    </router-link>
  </div>
</template>

<script>
export default {
  name: "gameResult",
  data() {
    return {};
  },
  mounted() {},
  methods: {},
  computed: {},
};
</script>
<style scoped lang="scss">
.resultAll {
  @include LQ;
  display: flex;
  padding: 40px;
  border-radius: 5px;
  justify-content: center;
  align-items: center;
  position: relative;
  .imgDiv {
    width: 150px;
    height: 150px;
    margin-right: 50px;
    background-color: aqua;
    img {
      width: 100%;
    }
  }
  .finalAnsAll {
    margin-left: 50px;
    .ansTitle {
      font-size: map-get($fontSizes, "h4");
      font-weight: 700;
    }
    .getPoint {
      font-size: map-get($fontSizes, "p");
    }
  }
  .toPoint {
    position: absolute;
    bottom: 10px;
    right: 20px;
  }
}
</style>
