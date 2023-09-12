<template>
  <div class="interact">
    <div class="titleAll">
      <span @click="showQuiz">問卷</span>
      <span @click="showLaba">拉霸</span>
    </div>
    <quiz v-if="isQuiz"></quiz>
    <button @click="this.$route.path('../')"></button>
  </div>
</template>
<script>
import quiz from "../components/quiz.vue";
export default {
  name: "product",
  data() {
    return {
      isQuiz: true,
      isLaba: false,
    };
  },
  props: {},
  components: {
    quiz,
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
