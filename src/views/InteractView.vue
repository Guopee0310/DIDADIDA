<template>
  <div class="interact">
    <div class="titleAll">
      <interactBtn @click="showQuiz" :quiz1="quizz"></interactBtn>
      <interactBtn @click="showLaba" :laba1="labaa"></interactBtn>
      <!-- <span >問卷</span>
      <span >拉霸</span> -->
    </div>

    <quiz2 v-if="isQuiz"></quiz2>
    <laba v-if="isLaba"></laba>
    <button @click="this.$route.path('../')"></button>
  </div>
</template>
<script>
import quiz2 from "../components/quiz2.vue";
import laba from "../components/laba.vue";
import interactBtn from "../components/interactBtn.vue";

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
  },
  computed: {},
  watch: {},
  methods: {
    showQuiz() {
      this.isQuiz = true;
      this.isLaba = false;
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
.interact {
  .titleAll {
    span {
      border: 1px black solid;
      padding: 10px;
      cursor: pointer;
    }
  }
}
</style>
