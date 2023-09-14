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
    <labaBtn @click="movePic"></labaBtn>
  </div>
</template>

<script>
import labaBtn from "../components/labaBtn.vue";

export default {
  data() {
    return {
      randomStart: true,
      guessNum: 0,
    };
  },
  methods: {
    movePic() {
      const min = 1;
      const max = 4;

      const randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
      this.randomStart = false;
      if (randomNum == 1) {
        this.guessNum = 1;
      } else if (randomNum == 2) {
        this.guessNum = 2;
      } else if (randomNum == 3) {
        this.guessNum = 3;
      } else if (randomNum == 4) {
        this.guessNum = 4;
      }
    },
  },
  components: {
    labaBtn,
  },
};
</script>
<style scoped lang="scss">
* {
  box-sizing: border-box;
}
.labaAll {
  @include LQ;
  border: 1px #03e9f4 solid;
  background-color: rgb(35, 45, 71);
  padding: 50px;
  display: flex;
  flex-direction: column;
  .containerPic {
    width: 474px;
    height: 474px;

    border: 5px #03e9f4 solid;
    margin: 0 auto;
    overflow: hidden;
    .resetImg {
      vertical-align: top;
      translate: 0px -2370px;
      transition: 1.5s;
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
    padding: 10px 20px;
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
