<template>
  <div class="explore">
    <div class="wapper">
      <!-- 表層海洋帶 -->
      <div class="slot" id="one"></div>
      <h1 data="0m">0m</h1>

      <!-- 動物們 -->
      <div v-for="(animal, index) in animals" :key="index" :ref="`parallaxScene${index}`" :id="`scene${index}`"
        data-relative-input="true" :class="animal.category" @click="showCard(animal)">
        <img :src="animal.image" :alt="animal.name" :data-depth="animal.depth" />
        <h4 :data-depth="animal.depth">{{ animal.name }}</h4>
      </div>

      <!-- 中層海洋帶 -->
      <div class="line middle">
        <div class="slot" id="two"></div>
        <h1 data="200m">200m</h1>
      </div>
      <!-- 深層海洋帶 -->
      <div class="line deep">
        <div class="slot" id="three"></div>
        <h1 data="1000m">1000m</h1>
      </div>
      <!-- 深淵層海洋帶 -->
      <div class="line verydeep">
        <div class="slot" id="four"></div>
        <h1 data="4000m">4000m</h1>
      </div>
      <!-- 超深淵層海洋帶 -->
      <div class="line supperdeep">
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

    <div class="card" v-if="showText">
      <div v-for="(introduce, index) in introduce">
        <img :src="introduce.image" alt="" />
        <h4>{{ introduce.name }}</h4>
        <span>{{ introduce.enName }}</span>
        <p>{{ introduce.p }}</p>
        <ul v-for="(feature, index) in introduce.features">
          <li>{{ feature }}</li>
        </ul>
      </div>
      <div class="close" @click="closeCard">
        <i class="fa-solid fa-xmark" style="color: #062f4a"></i>
      </div>
    </div>
  </div>

  <div class="navBar">
    <ul>
      <li>
        <a href="#" @click.prevent="btnScroll('表層海洋帶')">0m
          <div class="drop"></div>
        </a>
      </li>
      <li>
        <a href="#" @click.prevent="btnScroll('中層海洋帶')">200m
          <div class="drop"></div>
        </a>
      </li>
      <li>
        <a href="#" @click.prevent="btnScroll('深層海洋帶')">1000m
          <div class="drop"></div>
        </a>
      </li>
      <li>
        <a href="#" @click.prevent="btnScroll('深淵層海洋帶')">4000m
          <div class="drop"></div>
        </a>
      </li>
      <li>
        <a href="#" @click.prevent="btnScroll('超深淵層海洋帶')">6000m
          <div class="drop"></div>
        </a>
      </li>
    </ul>
    <div class="line"></div>
  </div>
</template>

<script>
import Parallax from "parallax-js";
import VueParallax from "vue-parallax";

export default {
  data() {
    return {
      parallaxValue: 30,
      showText: false,
      selectedAnimal: null,
      animals: [
        { name: '黃金魚', image: require('../../public/all_images/animal/goldfish.png'), depth: '0.2', category: 'goldfish' },
        { name: '玳瑁', image: require('../../public/all_images/animal/turtle.png'), depth: '0.5', category: 'turtle' },
        { name: '魚魚', image: require('../../public/all_images/animal/jokfish.png'), depth: '0.1', category: 'jokfish' },
        { name: '藍藻魚', image: require('../../public/all_images/animal/dory.png'), depth: '0.4', category: 'dory' },
        { name: '小丑魚', image: require('../../public/all_images/animal/nimo.png'), depth: '0.2', category: 'nimo' },
        { name: '河豚', image: require('../../public/all_images/animal/angryfish.png'), depth: '0.3', category: 'angryfish' },
        { name: '鯨鯊', image: require('../../public/all_images/animal/whale.png'), depth: '0.4', category: 'whale' },
        { name: '海星', image: require('../../public/all_images/animal/star.png'), depth: '0.2', category: 'star' },
        { name: '獅子魚', image: require('../../public/all_images/animal/leofish.png'), depth: '0.4', category: 'leofish' },
        { name: '魚魚', image: require('../../public/all_images/animal/linefish.png'), depth: '0.4', category: 'linefish' },
        { name: '鯊魚', image: require('../../public/all_images/animal/shark.png'), depth: '0.7', category: 'shark' },
        { name: '白鯨', image: require('../../public/all_images/animal/white.png'), depth: '0.1', category: 'white' },
        { name: '劍魚', image: require('../../public/all_images/animal/nosefish.png'), depth: '0.1', category: 'nosefish' },
        { name: '儒艮', image: require('../../public/all_images/animal/manatee.png'), depth: '0.1', category: 'manatee' },
        { name: '章魚', image: require('../../public/all_images/animal/taco.png'), depth: '0.1', category: 'taco' },
        { name: '水母', image: require('../../public/all_images/animal/jellyfish.png'), depth: '0.1', category: 'jellyfish' },
        { name: '深海魚', image: require('../../public/all_images/animal/ohpsfish.png'), depth: '0.1', category: 'ohpsfish' },
        { name: '藍鯨', image: require('../../public/all_images/animal/Blue whale.png'), depth: '0.1', category: 'blueWhale' },
      ],
      introduce: [
        // { name: '黃金魚', image: require('../../public/all_images/animal/goldfish.png'), enName: '', p: 'goldfish' },
        {
          name: "玳瑁",
          image: require("../../public/all_images/animal/turtle.png"),
          enName: "Hawksbill Turtle",
          p: "是一種海龜物種，屬於海洋爬行動物，被廣泛認為是美麗而又瀕危的物種。",
          features: [
            "— 外觀特徵 —",
            "玳瑁的外殼呈現五角形的形狀，有許多彎曲的甲板，讓牠們在水中更靈活。這些甲板上通常有不規則的金黃色、紅棕色或綠色的斑紋，為牠們提供了極佳的保護色。",
            "— 棲息地 —",
            "玳瑁廣泛分佈於熱帶和亞熱帶海域，包括大西洋、印度洋和太平洋。牠們在珊瑚礁、海草床、潟湖等地找到適合的棲息地。",
          ],
        },
        // { name: '藍藻魚', image: require('../../public/all_images/animal/dory.png'), enName: '0.4', p: 'dory' },
        // { name: '小丑魚', image: require('../../public/all_images/animal/nimo.png'), enName: '0.2', p: 'nimo' },
        // { name: '河豚', image: require('../../public/all_images/animal/angryfish.png'), enName: '0.3', p: 'angryfish' },
        // { name: '鯨鯊', image: require('../../public/all_images/animal/whale.png'), enName: '0.4', p: 'whale' },
        // { name: '海星', image: require('../../public/all_images/animal/star.png'), enName: '0.2', p: 'star' },
        // { name: '獅子魚', image: require('../../public/all_images/animal/leofish.png'), enName: '0.4', p: 'leofish' },
        // { name: '鯊魚', image: require('../../public/all_images/animal/shark.png'), enName: '0.7', p: 'shark' },
        // { name: '白鯨', image: require('../../public/all_images/animal/white.png'), enName: '0.1', p: 'white' },
      ],
    };
  },
  methods: {
    btnScroll(name) {
      if (name == "表層海洋帶") {
        // this.$router.push({ path: '/product', query: { article: 'footer' } });
        // this.$router.push({ path: "/explore", query: { article: "one" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("one");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "中層海洋帶") {
        // this.$router.push({ path: "/explore", query: { article: "two" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("two");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "深層海洋帶") {
        // this.$router.push({ path: "/explore", query: { article: "three" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("three");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "深淵層海洋帶") {
        // this.$router.push({ path: "/explore", query: { article: "four" } });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("four");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 100);
      } else if (name == "超深淵層海洋帶") {
        // this.$router.push({ path: "/explore", query: { article: "five" } });
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
    showCard(animal) {
      // if (name == "玳瑁") {
      this.showText = true;
      this.selectedAnimal = animal;
      // }
    },
    closeCard() {
      this.showText = false;
      this.selectedAnimal = null;
    },
  },
  mounted() {
    this.animals.forEach((animal, index) => {
      const scene = document.getElementById(`scene${index}`);
      const parallaxInstance = new Parallax(scene, {
        relativeInput: true,
        pointerEvents: true
      });
    });
  },
  components: {
    VueParallax,
    Parallax,
  },
};
</script>

<style lang="scss">
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
      background-color: #93b7cd;
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
  background-image: linear-gradient(to bottom, #93b4cd, #114166, #0b2f4a, #082033);
  position: relative;
  pointer-events: none;
  // #285f9d

  .slot {
    width: 100%;
    height: 100px;
    position: absolute;
    top: -100px;
  }

  .line {
    position: absolute;
    width: 100%;
    height: 100px;
  }

  .middle {
    top: 25%;
  }

  .deep {
    top: 50%;
  }

  .verydeep {
    top: 70%;
  }

  .superdeep {
    top: 80%;
  }

  h1 {
    font-size: 75px;
    color: map-get($colors, light);
    font-family: Helvetica, Arial, sans-serif, "Lucida Sans Regular", Geneva;
    font-weight: 800;
    color: transparent;
    -webkit-text-stroke: 3px #eee;
    position: relative;
  }

  h4 {
    font-size: map-get($fontSizes, h4);
    color: map-get($colors, light);
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

    // 動物們 ------------------------------------------------------------
    .turtle {
      cursor: pointer;
      width: 450px;
      translate: 15em 12em;
      // margin: 150px 0 0 250px;

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
      // margin: 100px 350px -80px auto;
      translate: 55em 8em;

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

    .dory {
      cursor: pointer;
      width: 130px;
      translate: 53em 10em;
      // margin: 0 530px -10px auto;

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
      translate: 45em 7em;
      // margin: -40px auto 0 730px;

      img {
        visibility: top;
        width: 80px;
      }

      h4 {
        margin: -30px 10px;
      }
    }

    .angryfish {
      cursor: pointer;
      width: 100px;
      translate: 20em 10em;
      // margin: 50px 0 80px 350px;

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
      translate: 20em 15em;
      // margin: -50px 10px 0 auto;

      img {
        visibility: top;
        width: 1200px;
      }

      h4 {
        margin-top: 80px;
      }
    }

    .star {
      cursor: pointer;
      width: 130px;
      translate: 18em 15em;
      // margin: 30px 0 0 350px;

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
      translate: 55em 20em;
      // margin: 0 530px 0 auto;

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
      translate: 3em 5em;
      // margin: -30px 0 0 60px;

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

    .linefish {
      cursor: pointer;
      width: 130px;
      translate: 70em 5em;
      // margin: 100px 230px 0 auto;

      img {
        visibility: top;
        width: 130px;
      }

      h4 {
        margin-top: -25px;
        margin-left: 80px;
      }
    }

    .jokfish {
      cursor: pointer;
      width: 130px;
      translate: 65em 3em;
      // margin: 0 550px 80px auto;

      img {
        visibility: top;
        width: 130px;
      }

      h4 {
        margin-top: -15px;
        margin-left: 90px;
      }
    }


    .manatee {
      cursor: pointer;
      width: 450px;
      margin: 80px auto 0 530px;

      img {
        visibility: top;
        width: 450px;
      }

      h4 {
        margin-top: 150px;
        margin-left: 30px;
      }
    }

    .nosefish {
      cursor: pointer;
      width: 300px;
      margin: -200px auto 0 330px;

      img {
        visibility: top;
        width: 300px;
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .taco {
      cursor: pointer;
      width: 300px;
      margin: 0 280px 0 auto;

      img {
        visibility: top;
        width: 300px;
        transform: rotate(30deg);
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .jellyfish {
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

    .ohpsfish {
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

    .blueWhale {
      cursor: pointer;
      width: 700px;
      margin: 30px auto 60px 0;
      // translate: 10em 10em;

      img {
        visibility: top;
        width: 700px;
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }
  }

  .card {
    width: 700px;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    background-color: rgba(40, 61, 84, 0.8);
    backdrop-filter: blur(3px);
    border-radius: 20px;
    color: #eee;
    position: fixed;
    top: 25%;
    left: 0;
    right: 0;
    z-index: 10;

    img {
      vertical-align: top;
      width: 35%;
      margin: -50px auto 15px;
      display: block;
    }

    h4 {
      width: 700px;
      text-align: center;
      margin: 10px 0;
      position: relative;
      // border: 1px solid red;
    }

    h4::after {
      content: "";
      position: absolute;
      width: 50px;
      border-bottom: 3px solid #93b7cd;
      bottom: -20%;
      left: 46.5%;
    }

    span {
      display: block;
      width: 700px;
      text-align: center;
      color: #aaa;
      font-style: italic;
      // border: 1px solid red;
    }

    p {
      margin: 15px auto 30px;
      text-align: center;
    }

    ul {
      margin: 15px;
      line-height: 1.5;
    }

    li {
      text-align: center;
      font-size: 17px;
    }

    li:nth-child(2n) {
      text-align: left;
      font-size: 15px;
      margin-bottom: 20px;
    }

    .close {
      width: 45px;
      height: 45px;
      background-color: #93b7cd;
      border-radius: 50%;
      text-align: center;
      margin-bottom: -20px;
      cursor: pointer;

      i {
        line-height: 45px;
        font-size: 30px;
      }
    }
  }
}
</style>
