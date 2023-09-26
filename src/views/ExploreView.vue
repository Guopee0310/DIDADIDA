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

      <div class="ship"><img src="../../public/all_images/animal/ship.png" alt=""></div>
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

    <!-- ↓↓↓ 商品彈窗 ↓↓↓ -->
    <transition name="fade">
      <div class="card" v-if="selectedAnimal">
        <div class="shadow" @click="closeCard"></div>
        <div class="card_content">
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
    </transition>
    <!-- ↑↑↑ 商品彈窗 ↑↑↑ -->
  </div>
</template>

<script>
import Parallax from "parallax-js";
import VueParallax from "vue-parallax";

export default {
  data() {
    return {
      parallaxValue: 30,
      // showText: false,
      selectedAnimal: null,
      animals: [
        { name: '黃高鰭刺尾魚', image: require('../../public/all_images/animal/goldfish.png'), depth: '0.2', category: 'goldfish' },

        {
          name: '玳瑁',
          image: require('../../public/all_images/animal/turtle.png'),
          depth: '0.5',
          category: 'turtle',
          enName: 'Hawksbill Turtle',
          p: '是一種海龜物種，屬於海洋爬行動物，被廣泛認為是美麗而又瀕危的物種。',
          features: [
            "— 外觀特徵 —",
            "玳瑁的外殼呈現五角形的形狀，有許多彎曲的甲板，讓牠們在水中更靈活。這些甲板上通常有不規則的金黃色、紅棕色或綠色的斑紋，為牠們提供了極佳的保護色。",
            "— 棲息地 —",
            "玳瑁廣泛分佈於熱帶和亞熱帶海域，包括大西洋、印度洋和太平洋。牠們在珊瑚礁、海草床、潟湖等地找到適合的棲息地。"]
        },
        { name: '藍藻魚', image: require('../../public/all_images/animal/dory.png'), depth: '0.4', category: 'dory' },
        { name: '小丑魚', image: require('../../public/all_images/animal/nimo.png'), depth: '0.2', category: 'nimo' },
        { name: '河豚', image: require('../../public/all_images/animal/angryfish.png'), depth: '0.3', category: 'angryfish' },
        { name: '黃顱刺蓋魚', image: require('../../public/all_images/animal/blueyellow.png'), depth: '0.1', category: 'blueyellow' },
        { name: '鯨鯊', image: require('../../public/all_images/animal/whale.png'), depth: '0.4', category: 'whale' },
        { name: '海星', image: require('../../public/all_images/animal/star.png'), depth: '0.2', category: 'star' },
        { name: '獅子魚', image: require('../../public/all_images/animal/leofish.png'), depth: '0.4', category: 'leofish' },
        { name: '鑽嘴魚', image: require('../../public/all_images/animal/linefish.png'), depth: '0.4', category: 'linefish' },
        { name: '鯊魚', image: require('../../public/all_images/animal/shark.png'), depth: '0.7', category: 'shark' },
        { name: '白鯨', image: require('../../public/all_images/animal/white.png'), depth: '0.1', category: 'white' },
        { name: '鋸鯊', image: require('../../public/all_images/animal/nosefish.png'), depth: '0.1', category: 'nosefish' },
        { name: '儒艮', image: require('../../public/all_images/animal/manatee.png'), depth: '0.1', category: 'manatee' },
        { name: '大王烏賊', image: require('../../public/all_images/animal/taco.png'), depth: '0.1', category: 'taco' },
        { name: '藍鯨', image: require('../../public/all_images/animal/Blue whale.png'), depth: '0.1', category: 'blueWhale' },
        { name: '水母', image: require('../../public/all_images/animal/jellyfish.png'), depth: '0.1', category: 'jellyfish' },
        { name: '章魚', image: require('../../public/all_images/animal/cutefish.png'), depth: '0.1', category: 'cutefish' },
        { name: '白斑烏賊', image: require('../../public/all_images/animal/ETfish.png'), depth: '0.1', category: 'ETfish' },
        { name: '圓鱗四鰭旗魚', image: require('../../public/all_images/animal/harinose.png'), depth: '0.1', category: 'harinose' },
        { name: '大白鯊', image: require('../../public/all_images/animal/great white shark.png'), depth: '0.1', category: 'greatwhiteshark' },
        { name: '突角鼻魚', image: require('../../public/all_images/animal/longnose.png'), depth: '0.1', category: 'longnose' },
        { name: '魟魚', image: require('../../public/all_images/animal/smile.png'), depth: '0.1', category: 'smile' },
        { name: '翻車魚', image: require('../../public/all_images/animal/moonfish.png'), depth: '0.1', category: 'moonfish' },
        { name: '抹香鯨', image: require('../../public/all_images/animal/sperm whale.png'), depth: '0.1', category: 'spermwhale' },
        { name: '魟魚', image: require('../../public/all_images/animal/stingray.png'), depth: '0.1', category: 'stingray' },
        { name: '翻車魚', image: require('../../public/all_images/animal/Sunfish.png'), depth: '0.1', category: 'sunfish' },
        { name: '星魚扁鯊', image: require('../../public/all_images/animal/toad.png'), depth: '0.1', category: 'toad' },
        { name: '燈籠魚', image: require('../../public/all_images/animal/monkfish.png'), depth: '0.1', category: 'monkfish' },
        { name: '角高體金眼鯛', image: require('../../public/all_images/animal/ohpsfish.png'), depth: '0.1', category: 'ohpsfish' },
        { name: '侏儒燈籠魚', image: require('../../public/all_images/animal/flyfish.png'), depth: '0.1', category: 'flyfish' },
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
      ],
    };
  },
  mounted() {
    this.animals.forEach((animal, index) => {
      const scene = document.getElementById(`scene${index}`);
      const parallaxInstance = new Parallax(scene, {
        relativeInput: true,
        pointerEvents: true,
      });
    });
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
      // this.showText = true;
      this.selectedAnimal = animal;
      // }
    },
    closeCard() {
      // this.showText = false;
      this.selectedAnimal = null;
    },
  },
  mounted() {
    this.animals.forEach((animal, index) => {
      const scene = document.getElementById(`scene${index}`);
      const parallaxInstance = new Parallax(scene, {
        clipRelativeInput: true,
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
  top: 30%;
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
    top: 20px;
    right: 17px;
    z-index: -1;
  }
}

// 探索動物 ------------------------------------------------------------
.explore {
  width: 100%;
  height: 400em;
  background-image: linear-gradient(to bottom, #93b4cd, #114166, #0b2f4a, #082033);
  position: relative;
  // #285f9d


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
    letter-spacing: 2px;

  }

  // 內容 ------------------------------------------------------------
  .wapper {
    width: 100%;
    height: 100%;
    margin: auto;
    text-align: center;
    background-image: url(../../public/all_images/animal/sea4.png);
    background-repeat: no-repeat;
    background-size: 100%;
    background-position: top center;
    overflow: hidden;


    .slot {
      width: 100%;
      height: 100px;
      position: absolute;
      top: -100px;
    }

    .line {
      position: absolute;
      width: 100%;
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

    .supperdeep {
      top: 90%;
    }




    // 動物們 ------------------------------------------------------------
    .turtle {
      cursor: pointer;
      translate: 15em 12em;

      img {
        visibility: top;
        width: 400px;
      }

      h4 {
        margin: 10px;
      }
    }

    .goldfish {
      cursor: pointer;
      translate: 60em 8em;

      img {
        visibility: top;
        width: 100px;
      }

      h4 {
        margin-left: 30px;
        margin-top: 65px;
      }
    }

    .dory {
      cursor: pointer;
      translate: 53em 10em;

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
      translate: 25em 10em;

      img {
        visibility: top;
        width: 100px;
      }

      h4 {
        margin: -30px 0;
      }
    }

    .blueyellow {
      cursor: pointer;
      translate: 40em 15em;
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
      translate: 30em 20em;
      // margin: -50px 10px 0 auto;

      img {
        visibility: top;
        width: 700px;
      }

      h4 {
        margin-top: 25px;
      }
    }

    .star {
      cursor: pointer;
      translate: 40em 20em;
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
      translate: 12em 7em;
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
      translate: 3em 5em;

      img {
        visibility: top;
        width: 450px;
      }

      h4 {
        margin-top: 10px;
        margin-left: 60px;
      }
    }

    .white {
      cursor: pointer;
      width: 500px;
      margin-left: auto;

      img {
        visibility: top;
        width: 500px;
      }
    }

    .linefish {
      cursor: pointer;
      translate: 10em -15em;

      img {
        visibility: top;
        width: 100px;
      }

      h4 {
        margin-top: -25px;
        margin-left: 80px;
      }
    }

    .jokfish {
      cursor: pointer;
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
      margin: -35px auto 0 530px;

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
      margin: -140px auto 0 210px;

      img {
        visibility: top;
        width: 350px;
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .taco {
      cursor: pointer;
      translate: 30em 75em;
      // margin: 0 280px 0 auto;

      img {
        visibility: visible;
        width: 750px;
        transform: rotate(90deg);
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .jellyfish {
      cursor: pointer;
      translate: 55em -95em;

      img {
        visibility: top;
        width: 130px;
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .cutefish {
      cursor: pointer;
      translate: 10em -45em;

      img {
        visibility: top;
        width: 220px;
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .ETfish {
      cursor: pointer;
      translate: 60em -60em;

      img {
        visibility: top;
        width: 200px;
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .greatwhiteshark {
      cursor: pointer;
      translate: 45em -30em;

      img {
        visibility: top;
        width: 450px;
      }

      h4 {
        margin-top: 20px;
        margin-left: 70px;
      }
    }

    .harinose {
      cursor: pointer;
      translate: 3em -75em;

      img {
        visibility: top;
        width: 250px;
      }

      h4 {
        margin-left: 50px;
      }
    }

    .longnose {
      cursor: pointer;
      translate: 41em -74em;

      img {
        visibility: top;
        width: 150px;
      }

      h4 {
        margin-left: 50px;
        margin-top: -10px;
      }
    }

    .smile {
      cursor: pointer;
      translate: -2em -38em;


      img {
        visibility: top;
        width: 500px;
      }

      h4 {
        margin-left: 150px;
        margin-top: -30px;
      }
    }

    .moonfish {
      cursor: pointer;
      translate: 10em -17em;

      img {
        visibility: top;
        width: 215px;
      }

      h4 {
        margin-left: 150px;
        margin-top: -30px;
      }
    }

    .spermwhale {
      cursor: pointer;
      translate: 40em -20em;

      img {
        visibility: top;
        width: 950px;
      }

      h4 {
        margin-left: 150px;
        margin-top: 40px;
      }
    }

    .stingray {
      cursor: pointer;
      translate: 52em -20em;

      img {
        visibility: top;
        width: 500px;
      }

      h4 {
        margin-top: 305px;
        margin-left: 70px;
      }
    }

    .sunfish {
      cursor: pointer;
      translate: 10em -30em;

      img {
        visibility: top;
        width: 200px;
      }

      h4 {
        margin-left: 20px;
        margin-top: -20px;
      }
    }


    .toad {
      cursor: pointer;
      translate: 40em -30em;

      img {
        visibility: top;
        width: 200px;
      }

      h4 {
        margin-left: -30px;
        margin-top: -20px;
      }
    }


    .monkfish {
      cursor: pointer;
      translate: 34em -2em;

      img {
        visibility: top;
        width: 200px;
      }

      h4 {
        // margin-top: 10px;
        margin-left: 20px;
      }
    }

    .flyfish {
      cursor: pointer;
      translate: 20em -40em;

      img {
        visibility: top;
        width: 200px;
      }

      h4 {
        margin-top: 80px;
      }
    }

    .ohpsfish {
      cursor: pointer;
      translate: 45em -30em;

      img {
        visibility: top;
        width: 130px;
      }

      h4 {
        margin-top: 95px;
        margin-left: 70px;
      }
    }

    .blueWhale {
      cursor: pointer;
      margin: 30px auto 60px 0;
      // translate: 10em 10em;

      img {
        visibility: top;
        width: 900px;
      }

      h4 {
        margin-top: -35px;
        margin-left: 70px;
      }
    }

    .ship {
      translate: 0 -10em;
      z-index: -2;

      img {
        vertical-align: top;
        width: 100%;
        z-index: -2;
      }
    }

  }

  // 彈窗 ---------------------------------------------
  .card {
    position: fixed;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
    background-color: rgba(40, 61, 84, 0.4);
    backdrop-filter: blur(3px);
    border-radius: 20px;
    color: #eee;
    top: 0;
    // top: 20%;
    left: 0;
    right: 0;
    z-index: 10;

    .shadow {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: linear-gradient(45deg, rgba(234, 153, 153, 0.3), rgba(11, 47, 74, 0.3), rgba(255, 217, 102, 0.3));
      z-index: -1;
      /* 在蓋板下面 */
    }

    .card_content {
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
      top: 20%;
      left: 0;
      right: 0;
    }

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
      content: '';
      position: absolute;
      width: 50px;
      border-bottom: 3px solid #93B7CD;
      bottom: -20%;
      left: 46.5%;
    }


    span {
      display: block;
      width: 700px;
      text-align: center;
      color: #aaa;
      font-family: SofiaProMedium-Italic;
      // border: 1px solid red;
    }

    p {
      margin: 15px auto 30px;
      text-align: center;
    }

    ul {
      margin: 0 20px;
    }

    li {
      font-size: 17px;
      text-align: center;
    }

    ul:nth-child(2n) li {
      text-align: left;
      margin-bottom: 30px;
    }

    .close {
      width: 45px;
      height: 45px;
      background-color: #93B7CD;
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

// 彈窗顯示與隱藏延遲動畫效果
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
