<template>
  <div class="interact">
    <div class="titleAll">
      <interactBtn
        @click="showQuiz"
        :quiz1="quizz"
        class="titleChangeBtn"
      ></interactBtn>
      <interactBtn
        @click="showLaba"
        :laba1="labaa"
        class="titleChangeBtn"
      ></interactBtn>
      <!-- <span >問卷</span>
      <span >拉霸</span> -->
    </div>
    <div class="mainpart">
    <quiz2 v-if="isQuiz"></quiz2>
    <laba v-if="isLaba"></laba>
    </div>
    <!-- <button @click="this.$route.path('../')"></button> -->
    <div class="deco">
         <memAreaBG></memAreaBG>
    </div>

  </div>
 
</template>
<script>
import quiz2 from "../components/quiz2.vue";
import laba from "../components/laba.vue";
import interactBtn from "../components/interactBtn.vue";
import memAreaBG from "../components/memAreaBG.vue";

export default {
  name: "product",
  data() {
    return {
      isQuiz: true,
      isLaba: false,
      quizz: "問卷",
      labaa: "拉霸",
    };
  },
  props: {},
  components: {
    laba,
    quiz2,
    interactBtn,
    memAreaBG,
  },
  computed: {},
  watch: {},
  methods: {
    showQuiz() {
      this.isQuiz = true;
      this.isLaba = false;
      this.$store.state.questionPic = true;
    },
    showLaba() {
      this.isQuiz = false;
      this.isLaba = true;
    },
  },
  mounted() {},
};
</script>
<style lang="scss" scoped>
*{
  background-color: #1D3D5B;
}
.body{
  background-color: #1D3D5B;
}
.interact {
  position: relative;
  .titleAll {
    z-index: 50;
    // border: 1px red solid;
    background-color: #1D3D5B;
    display: flex;
    justify-content: center;
    align-items: center;
    span {
      border: 1px black solid;
      padding: 10px;
      cursor: pointer;
    }
    .titleChangeBtn {
      margin: 15px;
    }
  }
  .mainpart{
    z-index: 100;
    background-color: #1D3D5B;
  }
  .deco{
    background-color:  #1D3D5B;
    z-index: 0;
    width:100%;
    position: absolute;
    top: 70%;
    left: 0;
  }
}
</style>
