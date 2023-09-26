<template>
  <div class="slotAll">
    <div class="controlWidth">
      <div class="featureBox">
        <router-link :to="i[1]" v-for=" (i,index) in featureAll" :key="index" :class="['singleFeature',  { 'active': isActive(i) }]"
          @click="toggleFeature(i)">
          {{ i[0] }}
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
        ["首頁輪播圖片管理", "/backHome/homePicMg", false],
        ["最新消息管理", "/backHome/newsMg", false],
        ["會員管理", "/backHome/memberMg", false],
        ["訂單管理", "/backHome/orderMg", false],
        ["商品管理", "/backHome/productMg", false],
        ["票券管理", "/backHome/ticketMg", false],
        ["智能小幫手", "/backHome/helperMg", false],
        ["互動", "/backHome/gamesMg", false],
      ],
      activeIndex:-1,
    };
  },
  methods: {
    toggleFeature(index) {
      if (this.activeIndex === index) {
        this.activeIndex = -1;
      } else {
        this.activeIndex = index;
      }
    },
    isActive(index) {
      return this.activeIndex === index;
    },
  },
};
</script>
<style scoped lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.slotAll {
  max-width: 1200px;
  margin: auto;
  padding-top: 50px;

  .controlWidth {
    width: 90%;
    display: flex;
    justify-content: space-between;
    margin: 0 auto;

    .featureBox {
      width: 15%;
      border-radius: 1rem;
      background-color: map-get($colors , 'h2Blue');
      display: flex;
      flex-direction: column;
      height: fit-content;
      padding: 20px;
      box-shadow: black 0.1em 0.1em 0.1em;

      .singleFeature {
        background-color: map-get($colors , 'mainColor');
        cursor: pointer;
        color: map-get($colors , 'light');
        font-weight: 600;
        padding: 10px 5px;
        margin: 5px 0;
        border-radius: 0.5rem;
        text-align: center;
      }
      .active {
          background-color: map-get($colors, 'accent');
          color: map-get($colors, 'light');
        }
    }

    .differentBox {
      padding: 2em;
      position: relative;
      background-color: map-get($colors , 'bgc');
      width: 80%;
      border-radius: 0.3rem;
      box-shadow: black 0.1em 0.1em 0.1em;

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
}</style>
