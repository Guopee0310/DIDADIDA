<template>
  <div class="explore">

    <div class="wapper">
      <!-- 表層海洋帶 -->
      <div class="epipelagic">
        <div class="slot" id="one"></div>
        <h1 data="0m">0m</h1>

        <div class="goldfish">
          <img src="../../public/all_images/animal/goldfish.png" alt="goldfish">
          <h4>黃金魚</h4>
        </div>

        <div class="turtle">
          <img src="../../public/all_images/animal/turtle.png" alt="turtle">
          <h4>綠海龜</h4>
        </div>
      </div>

      <div class="angryfish">
        <img src="../../public/all_images/animal/angryfish.png" alt="turtle">
        <h4>河豚</h4>
      </div>

      <div class="whale">
        <img src="../../public/all_images/animal/whale.png" alt="">
        <h4>鯨魚</h4>
      </div>

      <!-- 中層海洋帶 -->
      <div class="Mesopelagic">
        <div class="slot" id="two"></div>
        <h1 data="200m">200m</h1>

        <div class="star">
          <img src="../../public/all_images/animal/star.png" alt="">
          <h4>海星</h4>
        </div>

        <div class="harifish">
          <img src="../../public/all_images/animal/harifish.png" alt="">
          <h4>獅子魚</h4>
        </div>


      </div>
      <!-- 深層海洋帶 -->
      <div class="bathypelagic">
        <div class="slot" id="three"></div>
        <h1 data="1000m">1000m</h1>
      </div>
      <!-- 深淵層海洋帶 -->
      <div class="Abyssopelagic">
        <div class="slot" id="four"></div>
        <h1 data="4000m">4000m</h1>
      </div>
      <!-- 超深淵層海洋帶 -->
      <div class="Hadopelagic">
        <div class="slot" id="five"></div>
        <h1 data="6000m">6000m</h1>
      </div>
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
export default {
  data() {
    return {

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
    }
  }
}
</script>

<style lang="scss">
.header {
  background-color: #ECF0F3;
}

// 導覽頁 ------------------------------------------------------------
.navBar {
  position: fixed;
  top: 50%;
  right: 40px;
  text-align: right;


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
  background-image: linear-gradient(to bottom, #ECF0F3, #93B7CD, #285f9d, #114466, #0b2f4a);
  position: relative;

  .slot {
    width: 100%;
    height: 100px;
    position: absolute;
    top: -100px;
  }

  h1 {
    font-size: 75px;
    // font-size: map-get($fontSizes , h3);
    color: map-get($colors, light);
    font-family: Helvetica, Arial, sans-serif, 'Lucida Sans Regular', Geneva;
    font-weight: 800;
    color: transparent;
    -webkit-text-stroke: 3px #eee;
  }

  h4 {
    font-size: map-get($fontSizes, h4);
    color: map-get($colors , light);
  }



  // 內容 ------------------------------------------------------------
  .wapper {
    margin: auto;
    text-align: center;

    // 表層海域 ------------------------------------------------------------
    .epipelagic {
      background-image: url(../../public/all_images/animal/sea4.png);
      width: 100%;
      background-size: cover;
      background-position: top center;

      .turtle {
        cursor: pointer;
        width: 450px;
        margin: 150px 0 0 250px;

        img {
          visibility: top;
          width: 450px;
        }

        h4 {
          margin-right: 200px;
        }
      }

      .goldfish {
        cursor: pointer;
        width: 180px;
        margin: 100px 350px -80px auto;

        img {
          visibility: top;
          width: 180px;
        }

        h4 {
          margin-left: 70px;
          margin-top: 10px;
        }
      }

    }

    // 表層 ~ 中層 ------------------------------------------------------------
    .angryfish {
      cursor: pointer;
      width: 130px;
      margin: 150px 0 0 180px;

      img {
        visibility: top;
        width: 130px;
      }

      h4 {
        margin: 15px 70px 0 0;
      }
    }

    .whale {
      cursor: pointer;
      width: 700px;
      margin: -100px 150px 0 auto;

      img {
        visibility: top;
        width: 700px;
      }

      h4 {
        margin-right: 130px;
        margin-top: -30px;
      }
    }

    // 中層海域 ------------------------------------------------------------
    .Mesopelagic {
      position: relative;

      .slot {
        width: 100%;
        height: 100px;
        position: absolute;
        top: -100px;
      }

      .star {
        cursor: pointer;
        width: 130px;
        margin: 30px 0 0 350px;

        img {
          visibility: top;
          width: 130px;
        }

        h4 {
          margin: 10px 70px 0 0;
        }
      }

      .harifish {
        cursor: pointer;
        width: 130px;
        margin: -30px 350px 0 auto;

        img {
          visibility: top;
          width: 130px;
        }
      }
    }

    // 深層海域 ------------------------------------------------------------
    .bathypelagic {
      position: relative;

      .slot {
        width: 100%;
        height: 100px;
        position: absolute;
        top: -100px;
      }
    }
  }

}
</style>