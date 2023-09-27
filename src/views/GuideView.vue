<template>
  <div class="guide">
    <h3Title>
      <template v-slot:h3>
        <h3>園區地圖</h3>
      </template>
    </h3Title>
    <div class="guide_map">
      <img src="../../public/all_images/guide/guide_map.jpg" alt="">
      <div class="mask">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100">
          <!-- 線性漸層 -->
          <defs>
            <filter id="drop-shadow-filter" x="0" y="0" width="150%" height="150%">
              <feDropShadow dx="0.1em" dy="0.2em" stdDeviation="0.1em" flood-color="rgba(0,0,0,0.5)" />
            </filter>
          </defs>
          <!-- 表層區 -->
          <g @click="scrollToSection(2)" id="section1">
            <rect x="7" y="16" width="15" height="6" rx="1" ry="1" style="fill:#67daf4a2;stroke-width:10;"></rect>
            <text x="8.5" y="20" fill="#fff" filter="url(#drop-shadow-filter)">淺層館</text>
          </g>
          <!-- 中層區 -->
          <g @click="scrollToSection(3)">
            <rect x="50" y="10" width="15" height="6" rx="1" ry="1" style="fill:#4B88FFa2;stroke-width:10;"></rect>
            <text x="51.5" y="14.2" fill="#fff" filter="url(#drop-shadow-filter)">中層館</text>
          </g>
          <!-- 深層區 -->
          <g @click="scrollToSection(4)">
            <rect x="70" y="37" width="15" height="6" rx="1" ry="1" style="fill:#0016D8a2;stroke-width:10;"></rect>
            <text x="72" y="41" fill="#fff" filter="url(#drop-shadow-filter)">深層館</text>
          </g>
        </svg>
      </div>
    </div>
  </div>
  <h3Title>
    <template v-slot:h3>
      <h3>園區導覽</h3>
    </template>
  </h3Title>

  <!-- 改版後 ------------------------------------------- -->
  <div class="tour">
    <div class="btn">
      <button @click="face()">淺層館</button>
      <button @click="middle()">中層館</button>
      <button @click="deep()">深層館</button>
    </div>

    <!-- <transition> -->
    <div class="content one" v-if="faceshow" value="tab2" id="section2">
      <div class="wrap">
        <div class="text">
          <h4>淺層館</h4>
          <p>
            海洋表層區是指地球上的海洋中的最上層部分，通常指的是水面以下的相對較薄的水層，它包括了海洋中最頂部的數百米到一千米的水深範圍。這個區域在海洋學和生態學中非常重要，因為它直接受到陽光照射、風浪、潮汐和季節變化的影響，同時也是眾多海洋生物的居住地。
          </p>
        </div>
        <div class="fish_wrap">

          <div class="fish" v-for="(item, index) in shallow_pic" :key="index">
            <div class="num">{{ index + 1 }}</div>
            <div class="pic_shape" :style="{ backgroundImage: `url(${item.pic})` }">
            </div>
            <div class="name">{{ item.name }}</div>
          </div>

        </div>
      </div>


    </div>

    <div class="content two" v-else-if="middleshow" value="tab3" id="section3">
      <div class="wrap">
        <div class="text">
          <h4>中層館</h4>
          <p>
            這個區域在海洋生態系統中非常重要，因為它承載著各種生物和生態過程。海洋中層區的深度通常位於海平面以下約200米到1000米之間。這個區域的深度可以因地理位置而異，但大致處於此範圍內。隨著深度的增加，光線變得越來越有限，所以這個區域被稱為"光線不足層"。此外，水溫也隨著深度的增加而下降。這個區域通常有一個稱為"增溫層"的區域，水溫在這個區域內會有一個較大的變化。海洋中層區擁有豐富的生物多樣性，包括各種魚類、烏賊、燈籠魚等生物。這些生物通常會遷徙到這個區域，以覓食或避開掠食者。
          </p>
        </div>
        <div class="fish_wrap">
          <div class="fish" v-for="(item, index) in middle_pic" :key="index">
            <div class="num">{{ index + 1 }}</div>
            <div class="pic_shape" :style="{ backgroundImage: `url(${item.pic})` }">
            </div>
            <div class="name">{{ item.name }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="content three" v-else-if="deepshow" value="tab4" id="section4">
      <div class="wrap">
        <div class="text">
          <h4>深層館</h4>
          <p>深海區，是地球上最神祕和未被完全探索的地方之一，隱藏着無數令人驚奇的祕密。這片深不可測的海域位於陸地架的邊緣，通常從水面下200米（656英尺）深處開始，一直延伸到世界各個海洋的深部。</p>
        </div>
        <div class="fish_wrap">
          <div class="fish" v-for="(item, index) in deep_pic" :key="index">
            <div class="num">{{ index + 1 }}</div>
            <div class="pic_shape" :style="{ backgroundImage: `url(${item.pic})` }">
            </div>
            <div class="name">{{ item.name }}</div>
          </div>
        </div>
      </div>
    </div>
    <!-- </transition> -->
  </div>



  <!-- 改版前 ------------------------------------------- -->
  <!-- <transition name="fade">
    <div class="click_scroll" v-if="isClickScrollVisible">
      <div class="click_top" @click="scrollToSection(1)">
        <i class="fa-solid fa-angles-up" style="color: #ffffff;"></i><br>
        <span>Scroll<br>Top</span>
      </div>
    </div>
  </transition> -->
  <!-- <div class="tabs">
    <h4><img v-if="selectedTab == 'tab2'" src="../../public/all_images/guide/lighthouse.png" alt="">淺層館</h4>
    <input type="radio" name="name" v-model="selectedTab" value="tab2" id="section2" />

    <div class="content">
      <div class="wrap">
        <div class="about_pic">
          <img src="../../public/all_images/guide/shallow.png" alt="">
          <p>
            海洋表層區是指地球上的海洋中的最上層部分，通常指的是水面以下的相對較薄的水層，它包括了海洋中最頂部的數百米到一千米的水深範圍。這個區域在海洋學和生態學中非常重要，因為它直接受到陽光照射、風浪、潮汐和季節變化的影響，同時也是眾多海洋生物的居住地。
          </p>
        </div>
        <div class="fish_wrap">
          <div class="fish" v-for="(item, index) in shallow_pic" :key="index">
            <div class="num">{{ index + 1 }}</div>
            <div class="pic_shape" :style="{ backgroundImage: `url(${item.pic})` }">
            </div>
            <div class="name">{{ item.name }}</div>
          </div>
        </div>
      </div>
    </div>
    <h4><img v-if="selectedTab == 'tab3'" src="../../public/all_images/guide/lighthouse.png" alt="">中層館</h4>
    <input type="radio" name="name" v-model="selectedTab" value="tab3" id="section3" />
    <div class="content">
      <div class="wrap">
        <div class="about_pic">
          <img src="../../public/all_images/guide/middle.jpg" alt="">
          <p>
            這個區域在海洋生態系統中非常重要，因為它承載著各種生物和生態過程。海洋中層區的深度通常位於海平面以下約200米到1000米之間。這個區域的深度可以因地理位置而異，但大致處於此範圍內。隨著深度的增加，光線變得越來越有限，所以這個區域被稱為"光線不足層"。此外，水溫也隨著深度的增加而下降。這個區域通常有一個稱為"增溫層"的區域，水溫在這個區域內會有一個較大的變化。海洋中層區擁有豐富的生物多樣性，包括各種魚類、烏賊、燈籠魚等生物。這些生物通常會遷徙到這個區域，以覓食或避開掠食者。
          </p>
        </div>
        <div class="fish_wrap">
          <div class="fish" v-for="(item, index) in middle_pic" :key="index">
            <div class="num">{{ index + 1 }}</div>
            <div class="pic_shape" :style="{ backgroundImage: `url(${item.pic})` }">
            </div>
            <div class="name">{{ item.name }}</div>
          </div>
        </div>
      </div>
    </div>
    <h4><img v-if="selectedTab == 'tab4'" src="../../public/all_images/guide/lighthouse.png" alt="">深層館</h4>
    <input type="radio" name="name" v-model="selectedTab" value="tab4" id="section4" />
    <div class="content">
      <div class="wrap">
        <div class="about_pic">
          <img src="../../public/all_images/guide/nature-2575575_1920.jpg" alt="">
          <p>深海區，是地球上最神祕和未被完全探索的地方之一，隱藏着無數令人驚奇的祕密。這片深不可測的海域位於陸地架的邊緣，通常從水面下200米（656英尺）深處開始，一直延伸到世界各個海洋的深部。</p>
        </div>
        <div class="fish_wrap">
          <div class="fish" v-for="(item, index) in deep_pic" :key="index">
            <div class="num">{{ index + 1 }}</div>
            <div class="pic_shape" :style="{ backgroundImage: `url(${item.pic})` }">
            </div>
            <div class="name">{{ item.name }}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="sea_bg">
      <svg width="0" height="0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="sea">
        <filter id="water">
          <feTurbulence type="fractalNoise" baseFrequency=".05 .05" numOctaves="1" result="noise1"></feTurbulence>
          <feColorMatrix in="noise1" type="hueRotate" values="0" result="noise2">
            <animate attributeName="values" from="0" to="360" dur="1s" repeatCount="indefinite" />
          </feColorMatrix>
          <feDisplacementMap xChannelSelector="R" yChannelSelector="G" scale="7" in="SourceGraphic" in2="noise2" />
        </filter>
      </svg>
      <img src="../../public/all_images/guide/tyler-lastovich-6s2fFIsyyTc-unsplash.jpg"
        alt="Hawaiian water crashes against the rocks" class="ocean">
    </div>
  </div> -->
</template>


<script>
import h3Title from "../components/h3TitleComponent.vue";

export default {
  data() {
    return {
      selectedTab: "tab2", // 默认选中的选项卡
      isClickScrollVisible: false,
      currentSection: 1,
      faceshow: "true",
      middleshow: "false",
      deepshow: "false",
      shallow_pic: [
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/pexels-francesco-ungaro-2289411.jpg`, name: '海星' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/Mark_Rosenstein,iNaturalist.org.CC_BY-NC-SA.©Sea_Cucumbers.jpg`, name: '海參' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/pexels-nirav-shah-10303342.jpg`, name: '黃邊裸胸鱔' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/jellyfish.jpg`, name: '水母' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/dolphin.jpg`, name: '海豚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/stingray.jpg`, name: '魟魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/shark_pic.jpg`, name: '鯊魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/killer_whale.jpg`, name: '虎鯨' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/lionfish-711799_1280.jpg`, name: '獅子魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/blue-5059268_1280.jpg`, name: '斑紋刺蓋魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/longhorn-cowfish-375110_1280.jpg`, name: '角箱魨' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/fish-7391851_1280.jpg`, name: '突角鼻魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/fish-2921430_1280.jpg`, name: '黃高鰭刺尾魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/pallet-doctor-fish-793369_1280.jpg`, name: '擬刺尾鯛' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/david-clode-HDVmdzQxAds-unsplash.jpg`, name: '小丑魚' }
      ],
      middle_pic: [
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/peter-boshra-j8BRxbtTwTQ-unsplash.jpg`, name: '烏賊' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/michael-worden-7hrNYNE7x44-unsplash.jpg`, name: '旗魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/noe-sardet-hp4SVuJM2-g-unsplash.jpg`, name: '櫛棘燈籠魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/ocean-sunfish-7177835_1280.jpg`, name: '翻車魨' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/sea-toad-62916_1280.jpg`, name: '斑點單棘躄魚' },

      ],
      deep_pic: [
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/Dumbo_Octopus©NOAA-Ocean-Exploration.jpg`, name: '小飛象章魚' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/Swimming_Sea_Cucumber©NOAA-Ocean-Exploration.jpg`, name: '浮游海參' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/Bobtail_Squid©Rickard_Zerpe.jpg`, name: '短尾烏賊' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/Chimaera©NOAA-Ocean-Exploration.jpg`, name: '銀鮫' },
        { pic: `${this.$store.state.chooseImgSrc}../all_images/guide/giant_isopod©NOAA-Ocean-Exploration.jpg`, name: '大王具足蟲' },

      ]
    };
  },
  components: {
    h3Title,
  },
  methods: {
    scrollToSection(sectionIndex) {
      const sectionElement = document.querySelector("#section" + sectionIndex);
      if (sectionElement) {
        sectionElement.scrollIntoView({
          behavior: "smooth",
          block: "center",
          inline: "nearest",
        });
      }
      this.selectedTab = "tab" + sectionIndex;
    },

    handleScroll() {
      const scrollY = window.scrollY;
      const tabSection = document.querySelector(".tabs");

      if (tabSection) {
        const tabSectionTop = tabSection.offsetTop;

        // 根据滚动位置和选项卡区域位置来控制按钮的显示和隐藏
        if (scrollY >= tabSectionTop - 300) {
          this.isClickScrollVisible = true;
        } else {
          this.isClickScrollVisible = false;
        }
      }
    },
    face() {
      this.faceshow = true;
      this.middleshow = false;
      this.deepshow = false;
    },
    middle() {
      this.faceshow = false;
      this.middleshow = true;
      this.deepshow = false;
    },
    deep() {
      this.faceshow = false;
      this.middleshow = false;
      this.deepshow = true;
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.handleScroll);
  },
};
</script>

<style scoped lang="scss">
h3 {
  @include h3Title();
}

/* 網頁捲軸【寬度】 */
::-webkit-scrollbar {
  width: 10px;

}

/* 網頁捲軸【背景】顏色 */
::-webkit-scrollbar-track {
  background: #9cbae0;
  margin: 5rem 25px;
  border-radius: 10px;

}

/* 網頁捲軸【把手】顏色 */
::-webkit-scrollbar-thumb {
  background: #2972b5;
  border-radius: 10px;
}

/* 網頁捲軸【滑過時】把手的顏色 */
::-webkit-scrollbar-thumb:hover {
  background: #747d86;
}

.guide {
  margin-bottom: 100px;
}

.guide_map {
  max-width: 1000px;
  margin: auto;
  position: relative;

  img {
    width: 100%;
    vertical-align: top;
  }
}

svg {
  position: absolute;
  inset: 0;

  g {
    cursor: pointer;
    opacity: 1;
    transition: opacity .3s;

    text {
      font-size: 3px;
      pointer-events: none;
    }

    &:hover {
      opacity: 0.8;
    }
  }

  .mask {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
  }
}

.tabs {
  display: flex;
  box-sizing: border-box;
  position: relative;
  max-width: 100%;
  height: 100vh;
  overflow: hidden;

  .sea+img {
    width: 110vw;
    height: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 1;
    object-fit: cover;
    filter: url(#water);
  }

  h4 {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    left: 5px;
    width: 19%;
    height: 5.3rem;
    z-index: 3;
    pointer-events: none;
    color: map-get($colors, 'light');
    font-size: map-get($fontSizes , 'div');
    text-shadow: black 0.1em 0.1em 0.1em;


    &:nth-of-type(1) {
      top: 10%;
    }

    &:nth-of-type(2) {
      top: 22%;
    }

    &:nth-of-type(3) {
      top: 35%;
    }

    img {
      position: absolute;
      vertical-align: top;
      z-index: 10;
      top: 25%;
      width: 40px;
      left: 70%;
      animation: animate 2s alternate-reverse infinite;
    }
  }

  input[type="radio"] {
    position: absolute;
    width: 20%;
    height: 5.3rem;
    appearance: none;
    cursor: pointer;
    z-index: 5;
    opacity: 1;


    &:nth-of-type(1) {
      top: 10%;
    }

    &:nth-of-type(2) {
      top: 22%;
    }

    &:nth-of-type(3) {
      top: 35%;
    }

    &:checked {
      transition: .5s;
      overflow: hidden;

    }

    &:checked+.content {
      transform: translateX(0%);
      transition: transform .5s ease 0.1s;
    }
  }

  @keyframes animate {
    0% {
      transform: translate(0%, -15%) rotate(-5deg);
    }

    100% {
      transform: translate(0%, 0%)rotate(4deg);
    }
  }

  // .content {
  //   width: 75%;
  //   height: 80%;
  //   overflow-y: scroll;
  //   padding: 1.5rem;
  //   border-radius: 2rem;
  //   position: absolute;
  //   z-index: 2;
  //   right: 1rem;
  //   transition: transform 0.2s ease-in-out;
  //   margin-top: 2rem;
  //   margin-bottom: 2rem;

  //   &:nth-of-type(1) {
  //     transform: translateX(150%);
  //     background-color: #828ca6b9;
  //   }

  //   &:nth-of-type(2) {
  //     transform: translateX(250%);
  //     background-color: #666e7ebe;
  //   }

  //   &:nth-of-type(3) {
  //     transform: translateX(300%);
  //     background-color: #40465dcd;
  //   }

  //   .wrap {
  //     display: flex;
  //     align-items: start;
  //     color: map-get($colors, 'light');
  //     line-height: 1.5em;

  //     .about_pic {
  //       width: 40%;
  //       height: 100%;

  //       img {
  //         width: 100%;
  //         vertical-align: top;
  //       }

  //       p {
  //         padding-top: 1rem;
  //         line-height: 1.5em;
  //         font-size: map-get($fontSizes, "p");
  //       }
  //     }

  //     .fish_wrap {
  //       display: flex;
  //       flex-wrap: wrap;
  //       margin-left: 1em;
  //       width: 60%;
  //       color: map-get($colors, 'light');

  //       .fish {
  //         width: calc(100%/3);
  //         position: relative;
  //         padding: 1rem;

  //         .name {
  //           width: 100%;
  //           text-align: center;
  //           margin-top: 1rem;
  //           font-size: map-get($fontSizes, "p");
  //           font-weight: 600;
  //           text-shadow: #000 0.1em 0.1em 0.1em;
  //         }

  //         .num {
  //           aspect-ratio: 1/1;
  //           width: 1.2rem;
  //           height: 1.2rem;
  //           border-radius: 50%;
  //           background-color: rgb(30, 35, 35);
  //           text-align: center;
  //           color: map-get($colors, 'light');
  //         }

  //         .pic_shape {
  //           width: 80%;
  //           margin: auto;
  //           aspect-ratio: 1/1;
  //           border-radius: 10rem;
  //           background-size: cover;
  //           background-repeat: no-repeat;
  //           background-position: center;

  //         }
  //       }
  //     }
  //   }
  // }
}




.click_scroll {
  position: fixed;
  bottom: 25%;
  right: 30px;
  z-index: 4;
  cursor: pointer;


  .click_top {
    text-align: center;
    animation: top .8s alternate infinite;

    span {
      font-size: map-get($fontSizes, 'div');
      font-weight: 600;
      color: map-get($colors, 'light');
      text-shadow: #000 0.1em 0.1em 0.1em;

      img {
        width: 2.5rem;
        vertical-align: top;
        position: absolute;
        right: 80px;
      }
    }
  }
}

@keyframes top {
  0% {
    transform: translateY(10px);
  }

  100% {
    transform: translateY(0px);
  }

}

// 改版後CSS------------------------------------------------------------------

.tour {
  max-width: 100%;
  color: map-get($colors, 'light');

  .btn {
    max-width: 396px;
    width: 100%;
    margin: 1.5rem auto;

    button {
      background-color: map-get($colors, 'lightgreen');
      color: map-get($colors, 'light');
      border: none;
      width: 7rem;
      height: 2rem;
      border-radius: 1rem;
      cursor: pointer;
      margin: 0 10px;
    }
  }

  .content {
    background-repeat: no-repeat;
    background-size: 100%;
    background-position: center center;
    overflow: hidden;
    height: 45rem;
  }

  .content.one {
    background-image: url(../../public/all_images/guide/shallow.png);
  }

  .content.two {
    background-image: url(../../public/all_images/guide/middle.jpg);
  }

  .content.three {
    background-image: url(../../public/all_images/guide/nature-2575575_1920.jpg);
  }

  .wrap {
    display: flex;
    justify-content: space-between;
  }

  .text {
    margin: 5rem;

    h4 {
      font-size: map-get($fontSizes, h4);
      font-weight: 400;
      margin-bottom: 20px;
    }

    p {
      width: 30rem;
      text-align: justify;
    }
  }

  .fish_wrap {
    display: flex;
    flex-wrap: wrap;
    width: 40%;
    height: 45rem;
    margin-left: auto;
    background-color: rgba(225, 225, 225, 0.3);
    overflow-y: auto;
    overflow-x: hidden;

    &::-webkit-scrollbar {
      widows: 10px;
    }

    &::-webkit-scrollbar-thumb {
      border-radius: 4px;
      background-color: rgba(0, 0, 0, 0.2);
    }

    &::-webkit-scrollbar-track {
      box-shadow: transparent;
    }

    &::-webkit-scrollbar-button {
      height: 5px;
      background: transparent;
      border-radius: 4px;
    }

    // background-color: linear-gradient(#e66465, #9198e5);


    .fish {
      width: 100%;
      height: 50%;
      position: relative;
      padding: 3rem;
      // border: 1px solid red;
      // margin-bottom: -15rem;

      .name {
        width: 100%;
        position: absolute;
        top: 70%;
        font-size: map-get($fontSizes, "p");
        font-weight: 600;
      }

      .num {
        position: absolute;
        top: 60%;
        width: 1.2rem;
        height: 1.2rem;
        font-size: map-get($fontSizes , 'h4');
      }

      .num::after {
        content: '';
        display: block;
        width: 8rem;
        border: 1px solid #eee;
        margin: 3px -5px;
      }

      .pic_shape {
        width: 80%;
        height: 100%;
        margin: auto;
        aspect-ratio: 1/1;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
      }
    }
  }
}

.scrollbar {
  margin-left: 30px;
  float: left;
  height: 300px;
  width: 65px;
  background: #F5F5F5;
  overflow-y: scroll;
  margin-bottom: 25px;
}

.force-overflow {
  min-height: 450px;
}

#style-1::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
  background-color: #555;
}

@media screen and (max-width:992px) {

  .tabs {
    height: 80vh;

    h4 {
      font-size: map-get($fontSizes , 'span');
      justify-content: start;

      img {
        width: 25px;
      }
    }

    .content {
      margin-top: 2rem;
      width: 90%;

      .wrap {
        display: flex;
        flex-direction: column;
        color: map-get($colors, 'light');
        line-height: 1.5em;


        .about_pic {
          width: 100%;

          img {
            width: 100%;
            vertical-align: top;
          }

          p {
            padding-top: 1rem;
          }
        }

        .fish_wrap {
          width: 100%;
          margin: auto;

          .fish {
            width: calc(100%/2);

            .name {
              font-size: map-get($fontSizes, "span");
            }
          }
        }
      }
    }
  }

}
</style>
