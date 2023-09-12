<template>
  <div class="header" id="header">
    <div id="app">
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
        <div class="logo">
          <router-link to="/" @click="hideBanner()"
            ><img src="../assets/images/dida_logo.png"
          /></router-link>
        </div>

        <nav class="main-nav">
          <!-- 關於我們 -->
          <div class="main-menu">
            <router-link to="/about">關於我們</router-link>
            <ul class="sub-menu">
              <li><router-link to="/faq">常見問題</router-link></li>
              <li><router-link to="/guide">園區導覽</router-link></li>
              <li><router-link to="/interact">互動遊戲</router-link></li>
            </ul>
          </div>

          <!-- 最新消息 -->
          <div class="main-menu">
            <router-link to="/news">最新消息</router-link>
            <ul class="sub-menu">
              <li><router-link to="/#">表演資訊</router-link></li>
              <li><router-link to="/#">優惠消息</router-link></li>
            </ul>
          </div>

          <div class="main-menu">
            <router-link to="/explore">探索海洋生物</router-link>
            <ul class="sub-menu">
              <li><router-link to="/#">表層海洋帶</router-link></li>
              <li><router-link to="/#">中層海洋帶</router-link></li>
              <li><router-link to="/#">深層海洋帶</router-link></li>
              <li><router-link to="/#">深淵層海洋帶</router-link></li>
              <li><router-link to="/#">超深淵層海洋帶</router-link></li>
            </ul>
          </div>

          <div class="main-menu">
            <a>DIDA商城</a>
            <ul class="sub-menu">
              <li><router-link to="/product">DIDA購物</router-link></li>
              <li><router-link to="/ticket">DIDA購票</router-link></li>
            </ul>
          </div>

          <!-- 會員登入 -->
          <span @click="this.$store.state.storeShowLogin = true">
            <i class="fa-solid fa-user" style="color: #eee"></i>
          </span>

          <!-- 購物車 -->
          <router-link to="/shoppingcart"
            ><i class="fa-solid fa-cart-shopping" style="color: #eee"></i
          ></router-link>

          <!-- 語言切換 -->
          <div class="select">
            <select v-model="selectName">
              <option v-for="item in language" :value="item.option">
                {{ item.option }}
              </option>
            </select>
          </div>
        </nav>
      </div>

      <!-- <a href="#" class="Smart">
                  <img src="imgs/問號.png" alt="智能小幫手">
              </a> -->
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
      headerColor: "rgba(35, 45, 71, 0)",
      headerPosition: "relative",
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
      selectName: "繁體中文",

      language: [
        {
          option: "繁體中文",
        },
        {
          option: "簡體中文",
        },
        {
          option: "韓文",
        },
        {
          option: "日文",
        },
      ],
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
    hideBanner() {
      this.$router.push({ path: "/", query: { section: "hide" } });
    },
    handleScroll(event) {
      console.log(event);
      console.log(window.scrollY);
      if (window.scrollY == 0) {
        this.headerColor = "rgba(35, 45, 71, 0)";
      } else {
        this.headerColor = "rgba(35, 45, 71, 1)";
      }
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
  .logo img {
    vertical-align: top;
    width: 80px;
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
