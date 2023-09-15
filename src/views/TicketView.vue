<template>
  <div class="ticketAll">
    <div>
      <div>購票資訊</div>
      <div>
        <div>票種</div>
        <div>價格</div>
        <div>適用對象</div>
      </div>
    </div>
  </div>
</template>
<script>
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
      selectName: "繁體中文",
      language: [
        {
          option: "繁體中文",
        },
        {
          option: "英文",
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
        this.checkLogoPic = false;
      } else {
        this.headerColor = "rgba(35, 45, 71, 1)";
        this.checkLogoPic = true;
      }
    },
    // toFooter(){
    //     this.$router.push({ path: '/product', query: { article: 'footer' } });
    //     this.$router.push({path:'/', query:{section : 'footer' }})
    // }
  },
};
</script>
