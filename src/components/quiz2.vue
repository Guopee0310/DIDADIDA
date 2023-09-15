<template>
  <div class="quizAll">
    <div
      v-for="(i, index) in randomQuestions"
      :key="index"
      class="singelQuestion"
    >
      <div class="questionTitle">第{{ indexPlus(index) }}題</div>
      <div class="questionPost">{{ i.question }}</div>
      <div>
        <label class="testPoition">
          <input
            type="radio"
            :name="i.index"
            @click="pushInArr(i.index, i.ans, '是')"
          />
          是
        </label>
        <label class="testPoition">
          <input
            type="radio"
            :name="i.index"
            @click="pushInArr(i.index, i.ans, '否')"
          />
          否
        </label>
        <!-- <div class="ansBtn" @click="pushInArr(i.index, i.ans, $event)">是</div>
        <div class="ansBtn" @click="pushInArr(i.index, i.ans, $event)">否</div> -->
      </div>
    </div>

    <div @click="complete" class="cmpBtn" v-if="!showResult">完成問卷</div>
    <div
      v-if="notComplete"
      class="notCmpBtn"
      :class="{ notCmpBtnFrames: moveSideKeyFrames }"
    >
      尚未完成
      <!-- <span @click="notComplete = false">X</span> -->
    </div>

    <gameResult v-if="showResult"></gameResult>
  </div>
</template>

<script>
import gameResult from "../components/gameResult.vue";
export default {
  data() {
    return {
      quesAndAns: [
        { question: "鯊魚是魚嗎", ans: "是", index: 0 },
        { question: "魚是魚嗎", ans: "是", index: 1 },
        { question: "斑馬是魚嗎", ans: "否", index: 2 },
        { question: "烏賊是魚嗎", ans: "否", index: 3 },
        { question: "金魚是魚嗎", ans: "是", index: 4 },
        { question: "牛是魚嗎", ans: "否", index: 5 },
        { question: "狗是魚嗎", ans: "否", index: 6 },
        { question: "人是魚嗎", ans: "否", index: 7 },
        { question: "美人魚是魚嗎", ans: "是", index: 8 },
        { question: "綿羊是魚嗎", ans: "否", index: 9 },
      ],
      randomQuestions: [],
      finalAns: [],
      notComplete: false,
      totalPoint: 0,
      showResult: false,
      moveSideKeyFrames: false,
    };
  },
  mounted() {
    this.shuffleArray();
  },
  components: {
    gameResult,
  },
  computed: {},
  methods: {
    complete() {
      if (this.finalAns.length < 5) {
        this.notComplete = true;
        this.moveSideKeyFrames = true;
        setTimeout(() => {
          this.moveSideKeyFrames = false;
        }, 500);
      }
      for (let i = 0; i < this.finalAns.length; i++) {
        if (this.finalAns[i][1] == this.finalAns[i][2]) {
          this.totalPoint++;
        }
      }
      this.$store.state.quizScore = this.totalPoint;
      if (this.finalAns.length >= 5) {
        this.showResult = true;

        this.notComplete = false;
        this.moveSideKeyFrames = true;
        setTimeout(() => {
          this.moveSideKeyFrames = false;
        }, 500);
      }
    },
    pushInArr(index, ans, e) {
      for (let i = 0; i < this.finalAns.length; i++) {
        if (this.finalAns[i][0] == index) {
          this.finalAns.splice(i, 1);
        }
      }

      console.log(e);
      this.finalAns.push([index, ans, e]);
      if (this.finalAns.length >= 5) {
        this.notComplete = false;
      }
    },
    indexPlus(index) {
      return index + 1;
    },
    shuffleArray() {
      const shuffled = this.quesAndAns.slice().sort(() => Math.random() - 0.5);
      this.randomQuestions = shuffled.slice(0, 5);
    },
  },
};
</script>
<style scoped lang="scss">
.quizAll {
  @include LQ;

  .singelQuestion {
    // border: 1px red solid;
    padding: 15px 0px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.16);
    div {
      .ansBtn {
        border: 1px black solid;
        cursor: pointer;
      }
    }
    .questionTitle {
      font-size: map-get($fontSizes, "h4");
      font-weight: bold;
    }
    .questionPost {
      font-size: 18px;
      letter-spacing: 2px;
      margin: 3px 0px;
    }
    div {
      .testPoition {
        cursor: pointer;
        margin: 0 5px;
      }
    }
  }
  .cmpBtn {
    @include selectBtn;
    border: 1px black solid;
    cursor: pointer;

    width: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    margin-top: 20px;
  }
  .notCmpBtn {
    color: red;
    font-size: 14px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .notCmpBtnFrames {
    animation: moveSide 0.3s;
  }
  @keyframes moveSide {
    0% {
      translate: 0px;
    }
    25% {
      translate: 10px 0px;
    }
    50% {
      translate: 0px;
    }
    75% {
      translate: -10px 0px;
    }
    100% {
      translate: 0px;
    }
  }
}
</style>
