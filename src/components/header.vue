<template>
  <div class="header">
    <div
      class="wrap"
      :style="{
        'background-color': headerColor,
        top: 0,
        left: 0,
        'z-index': 10,
        width: '100%',
      }"
    >
      <!-- logo -->

      <!-- this.checkLogoPic = false; -->
      <div :class="{ logo: !checkLogoPic, logoChange: checkLogoPic }">
        <router-link to="/" v-if="!checkLogoPic"
          ><img src="../../public/all_images/logo_all.svg"
        /></router-link>
        <router-link to="/" v-if="checkLogoPic"
          ><img src="../../public/all_images/logo_half.svg"
        /></router-link>
      </div>

      <nav class="main-nav">
        <!-- 關於我們 -->
        <div class="main-menu">
          <router-link to="/about">{{ $t(menuTitle.about) }}</router-link>
          <ul class="sub-menu">
            <li v-for="aboutSub in aboutSub" key="aboutSub">
              <router-link :to="aboutSub.link">{{ aboutSub.name }}</router-link>
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
              <router-link :to="animalSub.link">{{
                animalSub.name
              }}</router-link>
            </li>
          </ul>
        </div>

        <!-- DIDA商城 -->
        <div class="main-menu">
          <a>{{ $t(menuTitle.buy) }}</a>
          <ul class="sub-menu">
            <li v-for="buySub in buySub" key="buySub">
              <router-link :to="buySub.link">{{ buySub.name }}</router-link>
            </li>
          </ul>
        </div>

        <!-- 會員登入 -->
        <div class="icons">
          <span>
            <i
              @click="this.$store.state.storeShowLogin = true"
              v-if="!this.$store.state.userName"
              class="fa-solid fa-user"
              style="color: #eee"
            ></i>
            <div
              v-else
              @click="this.$router.push('./member')"
              style="color: #eee"
            >
              {{ this.$store.state.userName }}
              <span>登出</span>
            </div>
          </span>

          <!-- 購物車 -->
          <router-link to="/shoppingcart"
            ><i class="fa-solid fa-cart-shopping" style="color: #eee"></i
          ></router-link>
        </div>
        <!-- 語言切換 -->
        <div class="select">
          <select v-model="selectedLanguage" @change="changeLanguage">
            <option value="zh-TW">繁體中文</option>
            <option value="en">English</option>
            <!-- 添加其他支持的語言選項 -->
          </select>
        </div>
      </nav>
    </div>

    <!-- <a href="#" class="Smart">
                  <img src="imgs/問號.png" alt="智能小幫手">
              </a> -->
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
        { link: "/faq", name: "常見問題" },
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
    display: none;
    position: absolute;
    top: 40px;
    padding: 10px 0;
    background-color: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(3px);
    border-radius: 3px;

    li:nth-child(4) {
      width: 140px;
    }
  }

  .main-menu:hover .sub-menu {
    display: block;
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
}

.select {
  @include btnWidth;
}

.select::after {
  @include arrow;
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
  background-color: #fff;
  color: #333;
}

/* 選擇的下拉選項樣式 */
option:checked {
  background-color: map-get($colors, hoverColor);
  color: #fff;
}

/* .Smart{
              position: fixed;
              right:0;
              bottom:0;
              width:100px;
          }
          .Smart img{
              width:50%;
              vertical-align: top;
          } */
</style>
