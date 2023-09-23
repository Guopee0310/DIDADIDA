<template>
  <div class="explore">

    <div class="wapper">
      <!-- 表層海洋帶 -->
      <div class="slot" id="one"></div>
      <h1 data="0m">0m</h1>

      <!-- 動物們 -->
      <div v-for="(animal, index) in animals" :key="index" :ref="`parallaxScene${index}`" :id="`scene${index}`"
        data-relative-input="true" :class="animal.category">
        <img :src="animal.image" :alt="animal.name" :data-depth="animal.depth">
        <h4 :data-depth="animal.depth">{{ animal.name }}</h4>
      </div>


      <!-- 中層海洋帶 -->
      <div class="slot" id="two"></div>
      <h1 data="200m">200m</h1>
      <!-- 深層海洋帶 -->
      <div class="slot" id="three"></div>
      <h1 data="1000m">1000m</h1>
      <!-- 深淵層海洋帶 -->
      <div class="slot" id="four"></div>
      <h1 data="4000m">4000m</h1>
      <!-- 超深淵層海洋帶 -->
      <div class="slot" id="five"></div>
      <h1 data="6000m">6000m</h1>
    </div>
  </div>

  <div class="navBar">
    <ul>
      <li><router-link to="#" @click.prevent="btnScroll('表層海洋帶')">0m
          <div class="drop"></div>
        </router-link>
      </li>
      <li><router-link to="#" @click.prevent="btnScroll('中層海洋帶')">200m
          <div class="drop"></div>
        </router-link>
      </li>
      <li><router-link to="#" @click.prevent="btnScroll('深層海洋帶')">1000m
          <div class="drop"></div>
        </router-link>
      </li>
      <li><router-link to="#" @click.prevent="btnScroll('深淵層海洋帶')">4000m
          <div class="drop"></div>
        </router-link>
      </li>
      <li><router-link to="#" @click.prevent="btnScroll('超深淵層海洋帶')">6000m
          <div class="drop"></div>
        </router-link>
      </li>
    </ul>
    <div class="line"></div>
  </div>
</template>

<script>
import Parallax from 'parallax-js';
import VueParallax from 'vue-parallax';

export default {
  data() {
    return {
      parallaxValue: 30,
      animals: [
        { name: '黃金魚', image: require('../../public/all_images/animal/goldfish.png'), depth: '0.2', category: 'goldfish' },
        { name: '綠海龜', image: require('../../public/all_images/animal/turtle.png'), depth: '0.5', category: 'turtle' },
        { name: '藍藻魚', image: require('../../public/all_images/animal/dory.png'), depth: '0.4', category: 'dory' },
        { name: '小丑魚', image: require('../../public/all_images/animal/nimo.png'), depth: '0.2', category: 'nimo' },
        { name: '河豚', image: require('../../public/all_images/animal/angryfish.png'), depth: '0.3', category: 'angryfish' },
        { name: '鯨鯊', image: require('../../public/all_images/animal/whale.png'), depth: '0.4', category: 'whale' },
        { name: '海星', image: require('../../public/all_images/animal/star.png'), depth: '0.2', category: 'star' },
        { name: '獅子魚', image: require('../../public/all_images/animal/leofish.png'), depth: '0.4', category: 'leofish' },
        { name: '鯊魚', image: require('../../public/all_images/animal/shark.png'), depth: '0.7', category: 'shark' },
        { name: '白鯨', image: require('../../public/all_images/animal/white.png'), depth: '0.1', category: 'white' },
      ],
    }
  },
  methods: {
    btnScroll(name) {

      if (name == "表層海洋帶") {
        // this.$router.push({ path: '/product', query: { article: 'footer' } });
        this.$router.push({ path: "/explore", query: { article: "one" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("one");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "中層海洋帶") {
        this.$router.push({ path: "/explore", query: { article: "two" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("two");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "深層海洋帶") {
        this.$router.push({ path: "/explore", query: { article: "three" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("three");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "深淵層海洋帶") {
        this.$router.push({ path: "/explore", query: { article: "four" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("four");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "超深淵層海洋帶") {
        this.$router.push({ path: "/explore", query: { article: "five" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("five");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      }
    },
  },
  mounted() {
    this.animals.forEach((animal, index) => {
      const scene = document.getElementById(`scene${index}`);
      const parallaxInstance = new Parallax(scene, {
        relativeInput: true
      });
    });


  },
  components: {
    VueParallax,
    Parallax,
  },
}
</script>

<style lang="scss">
.header {
  background-color: #ECF0F3;
}

// 導覽頁 ------------------------------------------------------------
.navBar {
  position: fixed;
  top: 40%;
  right: 40px;
  text-align: right;
  z-index: 1;


  ul {
    position: relative;
  }

  li {
    padding: 10px 0px;
    // border: 1px solid red;

    a {
      color: map-get($colors, light);
      padding: 0 10px;
    }

    .drop {
      display: inline-block;
      width: 15px;
      height: 15px;
      border: 3px solid #0b2f4a;
      border-radius: 50%;
      background-color: #93B7CD;
      border-top-right-radius: 0;
      transform: rotate(-45deg);
      margin-bottom: -5px;
    }
  }

  ul::after {
    content: "";
    border: 1px solid #0b2f4a;
    position: absolute;
    height: 85%;
    top: 12px;
    right: 17px;
    z-index: -1;
  }

}

// 探索動物 ------------------------------------------------------------
.explore {
  width: 100%;
  background-image: linear-gradient(to bottom, #93B7CD, #285f9d, #114466, #0b2f4a);
  position: relative;

  .slot {
    width: 100%;
    height: 100px;
    position: absolute;
    top: -100px;
    border: 1px solid red;
  }

  h1 {
    font-size: 75px;
    color: map-get($colors, light);
    font-family: Helvetica, Arial, sans-serif, 'Lucida Sans Regular', Geneva;
    font-weight: 800;
    color: transparent;
    -webkit-text-stroke: 3px #eee;
    position: relative;
  }

  h4 {
    font-size: map-get($fontSizes, h4);
    color: map-get($colors , light);
  }



  // 內容 ------------------------------------------------------------
  .wapper {
    width: 100%;
    margin: auto;
    text-align: center;
    background-image: url(../../public/all_images/animal/sea4.png);
    background-repeat: no-repeat;
    background-size: 100%;
    background-position: top center;
    overflow: hidden;

    // 表層海域 ------------------------------------------------------------
    .turtle {
      cursor: pointer;
      width: 450px;
      // translate: 15em 7em;
      margin: 150px 0 0 250px;

      img {
        visibility: top;
        width: 450px;
      }

      h4 {
        margin: 10px;
      }
    }

    .goldfish {
      cursor: pointer;
      width: 180px;
      margin: 100px 350px -80px auto;
      // translate: 55em 3em;

      img {
        visibility: top;
        width: 180px;
      }

      h4 {
        // translate: 4em 6em;
        margin-left: 80px;
        margin-top: 130px;
      }
    }

  }

  // 表層 ~ 中層 ------------------------------------------------------------
  .dory {
    cursor: pointer;
    width: 130px;
    // translate: 45em 10em;
    margin: 50px 430px 0 auto;


    img {
      visibility: top;
      width: 130px;
      transform: rotate(10deg);
    }

    h4 {
      margin: 70px 0 0 60px;
    }
  }

  .nimo {
    cursor: pointer;
    width: 80px;
    // translate: 40em 10em;
    margin: 10px auto 0 730px;

    img {
      visibility: top;
      width: 80px;
    }

    h4 {
      margin: 60px 10px;
    }
  }

  .angryfish {
    cursor: pointer;
    width: 100px;
    margin: 50px 0 80px 350px;

    img {
      visibility: top;
      width: 100px;
    }

    h4 {
      margin: -30px 0;
    }
  }

  .whale {
    cursor: pointer;
    width: 1200px;
    margin: -50px 10px 0 auto;

    img {
      visibility: top;
      width: 1200px;
    }

    h4 {
      margin-top: 80px;
    }
  }

  // 中層海域 ------------------------------------------------------------
  .star {
    cursor: pointer;
    width: 130px;
    margin: 30px 0 0 350px;

    img {
      visibility: top;
      width: 130px;
    }

    h4 {
      margin-top: -10px;
    }
  }

  .leofish {
    cursor: pointer;
    width: 130px;
    margin: 0 530px 0 auto;

    img {
      visibility: top;
      width: 130px;
    }

    h4 {
      margin-top: -35px;
      margin-left: 70px;
    }
  }

  .shark {
    cursor: pointer;
    width: 700px;
    margin: -30px 0 0 60px;

    img {
      visibility: top;
      width: 700px;
    }

    h4 {
      margin-top: 100px;
      margin-left: 70px;
    }
  }

  .white {
    cursor: pointer;
    width: 700px;
    margin-left: auto;

    img {
      visibility: top;
      width: 700px;
    }
  }
}

// 深層海域 ------------------------------------------------------------

// .slot {
//   width: 100%;
//   height: 100px;
//   position: absolute;
//   top: -100px;
// }
</style>