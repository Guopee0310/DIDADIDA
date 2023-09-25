<template>
  <div class="header">
    <div class="wrap" :style="{
      'background-color': headerColor,
      top: 0,
      left: 0,
      'z-index': 10,
      width: '100%',
    }">
      <!-- logo -->

      <!-- this.checkLogoPic = false; -->
      <div :class="{ logo: !checkLogoPic, logoChange: checkLogoPic }">
        <router-link to="/" v-if="!checkLogoPic"><img src="../../public/all_images/logo_all.svg" /></router-link>
        <router-link to="/" v-if="checkLogoPic"><img src="../../public/all_images/logo_half.svg" /></router-link>
      </div>

      <nav class="main-nav">
        <!-- 關於我們 -->
        <div class="main-menu">
          <router-link to="/about">{{ $t(menuTitle.about) }}</router-link>
          <ul class="sub-menu">
            <li v-for="aboutSub in aboutSub" key="aboutSub">
              <router-link :to="aboutSub.link">{{
                $t(aboutSub.name)
              }}</router-link>
            </li>
          </ul>
        </div>

        <!-- 最新消息 -->
        <div class="main-menu">
          <router-link to="/news">{{ $t(menuTitle.news) }}</router-link>
        </div>

        <!-- 探索海洋生物 -->
        <div class="main-menu">
          <router-link to="/explore">{{ $t(menuTitle.animal) }}</router-link>
          <ul class="sub-menu">
            <li v-for="animalSub in animalSub" key="animalSub">
              <router-link :to="animalSub.link" @click="changePageMove(animalSub.name)">{{ $t(animalSub.name)
              }}</router-link>
            </li>
          </ul>
        </div>

        <!-- DIDA商城 -->
        <div class="main-menu">
          <a>{{ $t(menuTitle.buy) }}</a>
          <ul class="sub-menu">
            <li v-for="buySub in buySub" key="buySub">
              <router-link :to="buySub.link">{{ $t(buySub.name) }}</router-link>
            </li>
          </ul>
        </div>

        <!-- 會員登入 -->
        <div class="icons">
          <span>
            <i @click="this.$store.state.storeShowLogin = true" v-if="!this.$store.state.userName"
              class="fa-solid fa-user" style="color: #eee"></i>
            <div v-if="this.$store.state.userName" @click="this.$router.push('./member')" style="color: #eee">
              {{ this.$store.state.userName }}
            </div>
            <span v-if="this.$store.state.userName" @click="logOutAPI()" class="logOutBtn">登出</span>
          </span>

          <!-- 購物車 -->
          <router-link to="/shoppingcart"><i class="fa-solid fa-cart-shopping" style="color: #eee"></i></router-link>
        </div>
        <!-- 語言切換 -->
        <div class="select">
          <select v-model="selectedLanguage" @change="changeLanguage">
            <option value="zh-TW">繁體中文</option>
            <option value="en">English</option>
            <!-- 添加其他支持的語言選項 -->
          </select>
          <span><i class="fa-solid fa-chevron-down" style="color: #eeeeee"></i></span>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src

export default {
  name: "HomeView",
  components: {},
  data() {
    return {
      checkLogoPic: false,
      headerColor: "rgba(35, 45, 71, 0)",
      headerPosition: "relative",
      menuTitle: {
        about: "關於我們",
        news: "最新消息",
        animal: "探索海洋生物",
        buy: "DIDA商城",
      },
      aboutSub: [
        { link: "/faq", name: "常見問答" },
        { link: "/guide", name: "園區導覽" },
        { link: "/interact", name: "互動遊戲" },
      ],
      animalSub: [
        { link: "/#", name: "表層海洋帶" },
        { link: "/#", name: "中層海洋帶" },
        { link: "/#", name: "深層海洋帶" },
        { link: "/#", name: "深淵層海洋帶" },
        { link: "/#", name: "超深淵層海洋帶" },
      ],
      buySub: [
        { link: "/product", name: "DIDA購物" },
        { link: "/ticket", name: "DIDA購票" },
      ],
      icon: [
        {
          link: "#",
          eAlt: "會員登入icon",
          imgSrc: '<i class="fa-solid fa-user" style="color: #eeeeee;"></i>',
        },
        {
          link: "#",
          eAlt: "購物車icon",
          imgSrc:
            '<i class="fa-solid fa-cart-shopping" style="color: #eeeeee;"></i>',
        },
      ],
      selectedLanguage: "zh-TW", // 默認語言
      // language: [
      //   {
      //     option: "繁體中文",
      //   },
      //   {
      //     option: "英文",
      //   },
      // ],
    };
  },
  watch: {
    "$route.query"(nVal, oVal) {
      //   console.log(nVal);
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  methods: {
    changePageMove(name) {
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
    logOutAPI() {
      fetch("https://tibamef2e.com/cgd103/g1/api/postMemberLogout.php")
        .then((res) => res.json())
        .then((json) => console.log(json));
      this.$store.state.userName = "";
      this.$store.state.shoppingCart = [];
      this.$store.state.favoList = [];
      this.$store.state.ticketList = [];
      this.$store.state.totalScorePoint = 0;
    },
    handleScroll(event) {
      console.log(event);
      console.log(window.scrollY);
      if (window.scrollY == 0) {
        this.headerColor = "rgba(35, 45, 71, 0)";
        this.checkLogoPic = false;
      } else {
        this.headerColor = "rgba(35, 45, 71, 1)";
        this.checkLogoPic = true;
      }
    },
    changeLanguage() {
      // 使用i18n的setLocale方法来切换语言
      this.$i18n.locale = this.selectedLanguage;
    },
    // toFooter(){
    //     this.$router.push({ path: '/product', query: { article: 'footer' } });
    //     this.$router.push({path:'/', query:{section : 'footer' }})
    // }
  },
};
</script>
<style scoped lang="scss">
// @import "~@/assets/scss/base/reset.scss";

.header {
  max-width: 1200px;
  width: 100%;
  margin: auto;
}

.wrap {
  display: flex;
  justify-content: space-between;
  padding: 10px 20px;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 3;
  transition: 1s;

  // logo 樣式
  .logoChange {
    width: 50px;
    transition: 1s;

    img {
      vertical-align: top;
      width: 100%;
    }
  }

  .logo {
    width: 80px;
    transition: 1s;

    img {
      vertical-align: top;
      width: 100%;
    }
  }

  // 選單樣式
  .main-nav {
    display: flex;
    justify-content: center;
    align-items: center;

    select {
      @include selectBtn;
    }
  }

  .main-nav a {
    line-height: 1.8;
    padding: 10px;
    text-decoration: none;
    color: white;
    font-size: map-get($fontSizes, "nav");
  }

  .main-menu {
    position: relative;
    margin: 0 10px;
    display: flex;
    justify-content: center;
  }

  // 子選單樣式
  .sub-menu {
    visibility: hidden;
    position: absolute;
    top: 40px;
    padding: 10px 0;
    background-color: rgba(101, 101, 101, 0.6);
    backdrop-filter: blur(3px);
    border-radius: 2px;
    transform: translateY(-1em);
    transition: all 0.3s ease-in-out 0s, visibility 0s linear 0.3s,
      z-index 0s linear 0.01s;

    li:nth-child(4) {
      width: 140px;
    }
  }

  .main-menu:hover .sub-menu {
    visibility: visible;
    transform: translateY(0%);
    transition-delay: 0s, 0s, 0.3s;
  }

  .sub-menu a:hover {
    color: map-get($colors, hoverColor);
  }
}

.wrap.show {
  background-color: map-get($colors, mainColor);
}

select {
  background-color: #fff;
  border: none;
  border-radius: 20px;
  padding: 10px;
  font-size: map-get($fontSizes, "p");
  cursor: pointer;
  /* background-image:url(imgs/Vector.png) ;
              background-position: right center; */
  /* appearance: none; */
  /* -moz-appearance: none; */
  width: 150px;
}

.icons {
  cursor: pointer;

  span {
    .logOutBtn {
      // border: 1px red solid;
      color: white;
    }
  }
}

.select {
  @include btnWidth;

  span {
    @include btnSpan;
  }
}

/* 滑鼠懸停時的樣式 */
select:hover {
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

/* 選擇狀態的樣式 */
select:focus {
  outline: none;
  border: 2px solid map-get($colors, hoverColor);
}

/* 下拉選項樣式 */
option {
  background-color: #2c3e50;
  color: #eee;
}

/* 選擇的下拉選項樣式 */
option:checked {
  background-color: map-get($colors, hoverColor);
  color: #fff;
}

@media screen and (max-width:415px) {

  .main-nav {
    position: fixed;
    top: 5%;
    left: 0;
    right: 0;
    flex-wrap: wrap;
    width: 80%;
    margin: auto;
    background-color: rgba(40, 61, 84, 0.8);
    backdrop-filter: blur(3px);
    border-radius: 10px;
    padding: 20px 0;

    .main-menu {
      width: 300px;
      text-align: center;
    }

    .sub-menu {
      // visibility: visible;
    }
  }
}
</style>
