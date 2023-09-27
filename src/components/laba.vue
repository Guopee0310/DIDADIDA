<template>
  <div class="labaAll">
    <div class="containerPic" v-if="this.$store.state.questionPic">
      <img
        :src="require('../../public/all_images/laba/question_mark.jpg')"
        alt=""
      />
    </div>

    <div class="containerPic" v-else>
      <img
        :src="i"
        v-for="i in labaPicALL"
        :class="{
          resetImg: randomStart,
          resetImg2: guessNum == 1,
          resetImg3: guessNum == 2,
          resetImg4: guessNum == 3,
          resetImg5: guessNum == 4,
          resetImg6: guessNum == 5,
          resetImg7: guessNum == 6,
        }"
      />
    </div>

    <labaBtn @click="movePic" v-if="randomStart"></labaBtn>
    <labaResult
      v-if="!randomStart"
      :imgSrc1="imgSrc"
      :title1="title"
      :post1="post"
      :point1="point"
      :finalShow1="finalShow"
    >
  </labaResult>
  <replayBtn  class="rePlay" v-if="!randomStart" @click="resetAll"></replayBtn>
 
    <!-- <div class="rePlay" v-if="!randomStart" @click="resetAll">再玩一次</div> -->
  </div>
</template>

<script>
import labaBtn from "../components/labaBtn.vue";
import labaResult from "../components/labaResult.vue";
import replayBtn from "../components/replayBtn.vue";

export default {
  data() {
    return {
      randomStart: true,
      guessNum: 0,
      imgSrc: "",
      title: "",
      post: "",
      point: "",
      finalShow: false,
      labaPicALL: [
        // 三組一樣的
        require("../../public/all_images/laba/bluewhale.jpg"),
        require("../../public/all_images/laba/bluewhale.jpg"),
        require("../../public/all_images/laba/dolphin.jpg"),
        require("../../public/all_images/laba/jellyfish.jpg"),
        require("../../public/all_images/laba/sailfish.jpg"),
        require("../../public/all_images/laba/whiteshark.jpg"),

        require("../../public/all_images/laba/bluewhale.jpg"),
        require("../../public/all_images/laba/bluewhale.jpg"),
        require("../../public/all_images/laba/dolphin.jpg"),
        require("../../public/all_images/laba/jellyfish.jpg"),
        require("../../public/all_images/laba/sailfish.jpg"),
        require("../../public/all_images/laba/whiteshark.jpg"),

        require("../../public/all_images/laba/bluewhale.jpg"),
        require("../../public/all_images/laba/bluewhale.jpg"),
        require("../../public/all_images/laba/dolphin.jpg"),
        require("../../public/all_images/laba/jellyfish.jpg"),
        require("../../public/all_images/laba/sailfish.jpg"),
        require("../../public/all_images/laba/whiteshark.jpg"),
      ],
      introArr: [
        {
          imgSrc: require("../../public/all_images/laba/whiteshark.jpg"),
          title: "大白鯊（Great White Shark）",
          post: "世界上最大的食肉魚，擁有強大的咬合力，是海洋中的頂級掠食者。",
          point: "5",
        },
        {
          imgSrc: require("../../public/all_images/laba/sailfish.jpg"),
          title: "帆尾魚（Sailfish）",
          post: "身材修長的魚類，背鰭形似帆，是速度飛快的追逐者，出現在溫暖的海域。",
          point: "5",
        },

        // 3是水母
        {
          imgSrc: require("../../public/all_images/laba/jellyfish.jpg"),
          title: "水母（Jellyfish）",
          post: "透明的海洋生物，觸手有毒性，具有優雅的漂浮方式，是海洋中的美麗生物。",
          point: "50",
        },
        // 4 海豚
        {
          imgSrc: require("../../public/all_images/laba/dolphin.jpg"),
          title: "海豚（Dolphin）",
          post: "聰明的哺乳動物，具有獨特的笑聲，以魚類為食，是海洋中的友善伴侶。",
          point: "5",
        },
        // 5藍鯨
        {
          imgSrc: require("../../public/all_images/laba/bluewhale.jpg"),
          title: "藍鯨（Blue Whale）",
          post: "地球上最大的哺乳動物，體型龐大，以浮游生物為食，是海洋中的巨無霸。",
          point: "30",
        },

        {
          imgSrc: require("../../public/all_images/laba/bluewhale.jpg"),
          title: "藍鯨（Blue Whale）",
          post: "地球上最大的哺乳動物，體型龐大，以浮游生物為食，是海洋中的巨無霸。",
          point: "15",
        },
      ],
    };
  },
  methods: {
    resetAll() {
      this.randomStart = !this.randomStart;
      this.randomStart = true;
      this.guessNum = 0;
      this.finalShow = false;
      this.$store.state.questionPic = true;
    },
    movePic() {
      this.$store.state.questionPic = false;

      setTimeout(() => {
        const min = 1;
        const max = 6;

        const randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
        this.randomStart = false;
        if (randomNum == 1) {
          this.guessNum = 1;
          this.imgSrc = this.introArr[0].imgSrc;
          this.title = this.introArr[0].title;
          this.post = this.introArr[0].post;
          if (this.$store.state.userName) {
            this.point = this.introArr[0].point;
          }

          this.$store.state.labaScore = parseInt(this.introArr[0].point);
        } else if (randomNum == 2) {
          this.guessNum = 2;
          this.imgSrc = this.introArr[1].imgSrc;
          this.title = this.introArr[1].title;
          this.post = this.introArr[1].post;
          if (this.$store.state.userName) {
            this.point = this.introArr[1].point;
          }
          this.$store.state.labaScore = parseInt(this.introArr[0].point);
        } else if (randomNum == 3) {
          this.guessNum = 3;
          this.imgSrc = this.introArr[2].imgSrc;
          this.title = this.introArr[2].title;
          this.post = this.introArr[2].post;
          if (this.$store.state.userName) {
            this.point = this.introArr[2].point;
          }
          this.$store.state.labaScore = parseInt(this.introArr[0].point);
        } else if (randomNum == 4) {
          this.guessNum = 4;
          this.imgSrc = this.introArr[3].imgSrc;
          this.title = this.introArr[3].title;
          this.post = this.introArr[3].post;
          if (this.$store.state.userName) {
            this.point = this.introArr[3].point;
          }
          this.$store.state.labaScore = parseInt(this.introArr[0].point);
        } else if (randomNum == 5) {
          this.guessNum = 5;
          this.imgSrc = this.introArr[4].imgSrc;
          this.title = this.introArr[4].title;
          this.post = this.introArr[4].post;
          if (this.$store.state.userName) {
            this.point = this.introArr[4].point;
          }
          this.$store.state.labaScore = parseInt(this.introArr[0].point);
        } else if (randomNum == 6) {
          this.guessNum = 6;
          this.imgSrc = this.introArr[5].imgSrc;
          this.title = this.introArr[5].title;
          this.post = this.introArr[5].post;
          if (this.$store.state.userName) {
            this.point = this.introArr[5].point;
          }
          this.$store.state.labaScore = parseInt(this.introArr[0].point);
        }
        setTimeout(() => {
          this.finalShow = true;
        }, 3000);
      }, 50);
    },
  },
  components: {
    labaBtn,
    labaResult,
    replayBtn,
  },
};
</script>
<style scoped lang="scss">
* {
  box-sizing: border-box;
}

.labaAll {
  z-index: 100;
  // @include LQ;
  padding: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: transparent;
  /* 其他背景属性，如背景颜色、大小、重复方式等可以继续添加 */
  background-size: cover;
  background-repeat: no-repeat;

  .containerPic {
    width: 474px;
    height: 474px;
    border-radius: 5px;
    // border: 5px #172c40 solid;
    // clip-path: ellipse(50% 50% at 50% 40%);
    margin: 0 auto;
    overflow: hidden;
    // transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
    // box-shadow: 0 1px 10px #a7cbec;

    .resetImg {
      vertical-align: top;
      translate: 0px -8058px;
    }

    .resetImg2 {
      vertical-align: top;
      translate: 0px -2370px;
      transition: 3s;
    }

    .resetImg3 {
      vertical-align: top;
      translate: 0px -1896px;
      transition: 3s;
    }

    .resetImg4 {
      vertical-align: top;
      translate: 0px -1422px;
      transition: 3s;
    }

    .resetImg5 {
      vertical-align: top;
      translate: 0px -948px;
      transition: 3s;
    }

    .resetImg6 {
      vertical-align: top;
      translate: 0px -474px;
      transition: 3s;
    }

    .resetImg7 {
      vertical-align: top;
      translate: 0px 0px;
      transition: 3s;
    }
  }

  a {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 200px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: 0.5s;
    letter-spacing: 4px;
    margin-top: 50px;

    &:hover {
      background: #03e9f4;
      color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4,
        0 0 100px #03e9f4;
    }

    span {
      position: absolute;
      display: block;

      &:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #03e9f4);
        animation: btn-anim1 1s linear infinite;
      }

      &:nth-child(2) {
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #03e9f4);
        animation: btn-anim2 1s linear infinite;
        animation-delay: 0.25s;
      }

      &:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, #03e9f4);
        animation: btn-anim3 1s linear infinite;
        animation-delay: 0.5s;
      }

      &:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #03e9f4);
        animation: btn-anim4 1s linear infinite;
        animation-delay: 0.75s;
      }
    }
  }

  .rePlay {
    // @include selectBtn;
    // padding: 5px 35px;
    // transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
    // box-shadow: 0 0.5px 5px #a7cbec;
  }
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }

  50%,
  100% {
    left: 100%;
  }
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }

  50%,
  100% {
    top: 100%;
  }
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }

  50%,
  100% {
    right: 100%;
  }
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }

  50%,
  100% {
    bottom: 100%;
  }
}
</style>
