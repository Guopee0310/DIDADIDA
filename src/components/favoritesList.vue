<template>
  <div class="favorites_list_main">
    <div class="favorites_list_area">
      <div class="favorites_list_group" v-for="favo in favoList" :key="favo.favoImg">
        <div class="favorites_list_img">
          <img :src="favo.favoImg" alt="" />
        </div>
        <div class="favorites_list_info">
          <div>
            <h5>{{ favo.favoName }}</h5>
            <p>NT {{ favo.favoPrice }}</p>
          </div>
          <div>
            <p>{{ favo.favoIntroduction }}</p>
            <!-- <p>{{ favo.favoIntroduction.recommendation }}</p>
                        <p>{{ favo.favoIntroduction.size }}</p> -->
          </div>
        </div>
      </div>
    </div>
    <memChangePage></memChangePage>
  </div>
</template>

<script>
import memChangePage from "../components/memChangePage.vue";
export default {
  name: "favoritesList",
  components: {
    memChangePage,
  },
  data() {
    return {
      favoList: [
        // {
        //     favoImg: require("../assets/images/dolphin_pillow.jpg"),
        //     favoName: "極舒適海豚抱枕",
        //     favoPrice: "499",
        //     favoIntroduction: {
        //         mainIntro: "海豚玩偶採用了沖繩傳統染色技法「紅型染」設計而成，充滿沖繩色彩。",
        //         recommendation: "同一系列產品中更有「海豚鑰匙圈」可供選擇。",
        //         size: "尺寸：14×11×22.5公分",
        //     },
        // },
        // {
        //   favoImg: require("../assets/images/dolphin_pillow.jpg"),
        //   favoName: "極舒適海豚抱枕",
        //   favoPrice: "499",
        //   favoIntroduction:
        //     "海豚玩偶採用了沖繩傳統染色技法「紅型染」設計而成，充滿沖繩色彩。",
        // },
      ],
    };
  },
  mounted() {
    this.favoList = this.$store.state.favoList;
    console.log(this.favoList);
  },
};
</script>

<style scoped lang="scss">
.favorites_list_area {
  width: 500px;
  height: 650px;
  border-radius: 15px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;

  .favorites_list_group {
    width: 500px;
    height: 208px;
    border-bottom: 1px solid #333;
    display: flex;
    align-items: center;
  }

  h5 {
    font-size: map-get($fontSizes, "h4");
  }

  p {
    font-size: map-get($fontSizes, "span");
  }

  .favorites_list_group:last-child {
    border-bottom: 0;
  }

  .favorites_list_img {
    width: 150px;
    height: 150px;
    margin: 20px auto;
    border: 1px solid #333;
  }

  .favorites_list_img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .favorites_list_info {
    width: 300px;
  }
}
</style>
