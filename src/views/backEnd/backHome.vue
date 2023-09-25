<template>
  <div class="slotAll">
    <div class="controlWidth">
      <div class="featureBox">
        <!-- singleFeature -->

        <router-link :to="i[1]" v-for="i in featureAll" class="singleFeature"
          >{{ i[0] }}
        </router-link>
      </div>
      <div class="differentBox">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "backHome",
  data() {
    return {
      featureAll: [
        ["首頁輪播圖片管理", "/backHome/homePicMg"],
        ["最新消息管理", "/backHome/newsMg"],
        ["會員管理", "/backHome/memberMg"],
        ["訂單管理", "/backHome/orderMg"],
        ["商品管理", "/backHome/productMg"],
        ["票券管理", "/backHome/ticketMg"],
        ["智能小幫手", "/backHome/helperMg"],
        ["互動", "/backHome/gamesMg"],
      ],
    };
  },
  mounted() {},
  methods: {
    // show() {
    //   console.log(window.location.pathname);
    // },
  },
  computed: {},
};
</script>
<style scoped lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.slotAll {
  width: 100%;
  padding-top: 50px;
  .controlWidth {
    width: 90%;
    display: flex;
    justify-content: space-between;
    margin: 0 auto;
    .featureBox {
      border: 1px black solid;
      display: flex;
      flex-direction: column;
      height: fit-content;
      padding: 20px;
      .singleFeature {
        cursor: pointer;
        border: 1px black solid;
        padding: 10px 5px;
        margin: 5px 0;
        border-radius: 10px;
        text-align: center;
        &:hover {
          color: blue;
        }
      }
    }
    .differentBox {
      position: relative;
      border: 1px red solid;
      width: 80%;
      .allTabs {
        position: absolute;
        display: flex;
        translate: 0 -100%;
        left: 20px;
        div {
          margin: 0 10px;
          border: 1px black solid;
          border-bottom: none;
          padding: 0 10px;
          cursor: pointer;
        }
      }
    }
  }
}
</style>
