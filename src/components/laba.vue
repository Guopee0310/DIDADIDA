<template>
  <div class="labaAll">
    <div class="containerPic" v-if="this.$store.state.questionPic">
      <img :src="require('../../public/all_images/laba/question_mark.jpg')" alt="" />
    </div>

    <div class="containerPic" v-else>
      <img :src="i" v-for="i in labaPicALL" :class="{
        resetImg: randomStart,
        resetImg2: guessNum == 1,
        resetImg3: guessNum == 2,
        resetImg4: guessNum == 3,
        resetImg5: guessNum == 4,
        resetImg6: guessNum == 5,
        resetImg7: guessNum == 6,
      }" />
    </div>
    <labaBtn @click="movePic" v-if="randomStart"></labaBtn>
    <labaResult v-if="!randomStart" :imgSrc1="imgSrc" :title1="title" :post1="post" :point1="point"
      :finalShow1="finalShow"></labaResult>
    <div class="rePlay" v-if="!randomStart" @click="resetAll">再玩一次</div>
  </div>
</template>

<script>
import labaBtn from "../components/labaBtn.vue";
import labaResult from "../components/labaResult.vue";
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
          imgSrc: require("../assets/images/dolphin_pillow.jpg"),
          title: "小丑魚1111111",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "15",
        },
        {
          imgSrc: require("../assets/images/dolphin_pillow.jpg"),
          title: "小丑魚222222222",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "30",
        },
        {
          imgSrc: require("../assets/images/dolphin_pillow.jpg"),
          title: "小丑魚33333333",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "50",
        },
        {
          imgSrc: require("../assets/images/dolphin_pillow.jpg"),
          title: "小丑魚444444",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "5",
        },
        {
          imgSrc: require("../assets/images/dolphin_pillow.jpg"),
          title: "小丑魚5555555",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "5",
        },
        {
          imgSrc: require("../assets/images/dolphin_pillow.jpg"),
          title: "小丑魚66666666",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "5",
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
        }, 1000);
      }, 50);
    },
  },
  components: {
    labaBtn,
    labaResult,
  },
};
</script>
<style scoped lang="scss">
* {
  box-sizing: border-box;
}

.labaAll {
  @include LQ;
  padding: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  // background-image: url("../../public/all_images/laba_bg.gif");
  /* 其他背景属性，如背景颜色、大小、重复方式等可以继续添加 */
  background-color: #f0f0f0;
  background-size: cover;
  background-repeat: no-repeat;

  .containerPic {
    width: 474px;
    height: 474px;
    border-radius: 20px;
    // border: 5px #172c40 solid;
    // clip-path: ellipse(50% 50% at 50% 40%);
    margin: 0 auto;
    overflow: hidden;

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
    @include selectBtn;
    padding: 5px 35px;
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
}</style>
