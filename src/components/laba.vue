<template>
  <div class="labaAll">
    <div class="containerPic">
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        :class="{
          resetImg: randomStart,
          resetImg2: guessNum == 1,
          resetImg3: guessNum == 2,
          resetImg4: guessNum == 3,
          resetImg5: guessNum == 4,
        }"
        alt=""
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        :class="{
          resetImg: randomStart,
          resetImg2: guessNum == 1,
          resetImg3: guessNum == 2,
          resetImg4: guessNum == 3,
          resetImg5: guessNum == 4,
        }"
        alt=""
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        :class="{
          resetImg: randomStart,
          resetImg2: guessNum == 1,
          resetImg3: guessNum == 2,
          resetImg4: guessNum == 3,
          resetImg5: guessNum == 4,
        }"
        alt=""
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        :class="{
          resetImg: randomStart,
          resetImg2: guessNum == 1,
          resetImg3: guessNum == 2,
          resetImg4: guessNum == 3,
          resetImg5: guessNum == 4,
        }"
        alt=""
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        :class="{
          resetImg: randomStart,
          resetImg2: guessNum == 1,
          resetImg3: guessNum == 2,
          resetImg4: guessNum == 3,
          resetImg5: guessNum == 4,
        }"
        alt=""
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        :class="{
          resetImg: randomStart,
          resetImg2: guessNum == 1,
          resetImg3: guessNum == 2,
          resetImg4: guessNum == 3,
          resetImg5: guessNum == 4,
        }"
        alt=""
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
    ></labaResult>
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
      introArr: [
        {
          imgSrc: "../assets/images/dolphin_pillow.jpg",
          title: "小丑魚1111111",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "15",
        },
        {
          imgSrc: "../assets/images/dolphin_pillow.jpg",
          title: "小丑魚222222222",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "30",
        },
        {
          imgSrc: "../assets/images/dolphin_pillow.jpg",
          title: "小丑魚33333333",
          post: "小丑魚生活在淺海珊瑚礁區域，以互利共生的方式與海葵相處，保護海葵免受掠食者，生活深度通常在3到15米之間。",
          point: "50",
        },
        {
          imgSrc: "../assets/images/dolphin_pillow.jpg",
          title: "小丑魚444444",
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
    },
    movePic() {
      const min = 1;
      const max = 4;

      const randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
      this.randomStart = false;
      if (randomNum == 1) {
        this.guessNum = 1;
        this.imgSrc = this.introArr[0].imgSrc;
        this.title = this.introArr[0].title;
        this.post = this.introArr[0].post;
        this.point = this.introArr[0].point;
        this.$store.state.labaScore = parseInt(this.introArr[0].point);
      } else if (randomNum == 2) {
        this.guessNum = 2;
        this.imgSrc = this.introArr[1].imgSrc;
        this.title = this.introArr[1].title;
        this.post = this.introArr[1].post;
        this.point = this.introArr[1].point;
        this.$store.state.labaScore = parseInt(this.introArr[0].point);
      } else if (randomNum == 3) {
        this.guessNum = 3;
        this.imgSrc = this.introArr[2].imgSrc;
        this.title = this.introArr[2].title;
        this.post = this.introArr[2].post;
        this.point = this.introArr[2].point;
        this.$store.state.labaScore = parseInt(this.introArr[0].point);
      } else if (randomNum == 4) {
        this.guessNum = 4;
        this.imgSrc = this.introArr[3].imgSrc;
        this.title = this.introArr[3].title;
        this.post = this.introArr[3].post;
        this.point = this.introArr[3].point;
        this.$store.state.labaScore = parseInt(this.introArr[0].point);
      }
      setTimeout(() => {
        this.finalShow = true;
      }, 1000);
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
  background-color: #232d47;
  .containerPic {
    width: 474px;
    height: 474px;

    border: 5px #03e9f4 solid;
    margin: 0 auto;
    overflow: hidden;
    .resetImg {
      vertical-align: top;
      translate: 0px -2370px;
    }
    .resetImg2 {
      vertical-align: top;
      translate: 0px -1896px;
      transition: 1.5s;
    }
    .resetImg3 {
      vertical-align: top;
      translate: 0px -1422px;
      transition: 1.5s;
    }
    .resetImg4 {
      vertical-align: top;
      translate: 0px -948px;
      transition: 1.5s;
    }
    .resetImg5 {
      vertical-align: top;
      translate: 0px -474px;
      transition: 1.5s;
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
}
</style>
