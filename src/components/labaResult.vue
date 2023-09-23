<template>
  <div class="controlResult" v-if="title1">
    <div class="resultPic">
      <!-- <img :src="require(imgSrcGet)" alt="" /> -->
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        alt=""
        v-if="this.point1 == '15'"
        class="isOpacity"
        :class="{ notOpacity: finalShow1 }"
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        alt=""
        v-else-if="this.point1 == '30'"
        class="isOpacity"
        :class="{ notOpacity: finalShow1 }"
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        alt=""
        v-else-if="this.point1 == '50'"
        class="isOpacity"
        :class="{ notOpacity: finalShow1 }"
      />
      <img
        :src="require('../assets/images/dolphin_pillow.jpg')"
        alt=""
        v-else-if="this.point1 == '5'"
        class="isOpacity"
        :class="{ notOpacity: finalShow1 }"
      />
    </div>
    <div class="resultPost">
      <div class="isOpacity postTitle" :class="{ notOpacity: finalShow1 }">
        {{ title1 }}是您的幸運星
      </div>
      <div class="isOpacity postText" :class="{ notOpacity: finalShow1 }">
        {{ post1 }}
      </div>
      <div class="isOpacity postPoint" :class="{ notOpacity: finalShow1 }">
        您共獲得{{ point1 }}點紅利點數!
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imgSrcGet: "",
      imgSrcArr: [
        "../assets/images/dolphin_pillow.jpg",
        "../assets/images/dolphin_pillow.jpg",
        "../assets/images/dolphin_pillow.jpg",
        "../assets/images/dolphin_pillow.jpg",
      ],
    };
  },
  props: ["imgSrc1", "title1", "post1", "point1", "finalShow1"],
  methods: {
    updateLabaScore() {
      this.$store.commit("setLabaScore", this.labaScore);
    },
  },
  mounted() {
    window.addEventListener("load", this.updateLabaScore);
  },
  beforeDestroy() {
    window.removeEventListener("load", this.updateLabaScore);
  },
  computed: {
    labaScore() {
      return parseInt(this.point1);
    },
    getSrc() {
      //   if (this.point1 == "15") {
      //     return this.imgSrcArr[0];
      //   }
      //   return this.point1 == "15"
      //     ? (this.imgSrcGet = this.imgSrcArr[0])
      //     : this.point1 == "30"
      //     ? (this.imgSrcGet = this.imgSrcArr[1])
      //     : this.point1 == "50"
      //     ? (this.imgSrcGet = this.imgSrcArr[2])
      //     : this.point1 == "5"
      //     ? (this.imgSrcGet = this.imgSrcArr[3])
      //     : "";
    },
  },
  components: {},
};
</script>
<style scoped lang="scss">
.controlResult {
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px white solid;
  color: white;
  margin: 50px 0px;
  padding: 20px;
  .isOpacity {
    opacity: 0;
    transition: 1.5s;
  }
  .notOpacity {
    opacity: 1;
    transition: 1.5s;
  }
  .resultPic {
    width: 200px;
    height: 200px;
    img {
      width: 100%;
    }
  }
  .resultPost {
    // border: 1px red solid;
    padding: 0 20px;
    .postTitle {
      font-size: map-get($fontSizes, "h4");
      font-weight: bold;
      margin: 10px 0px;
    }
    .postText {
      letter-spacing: 1px;
      margin-bottom: 15px;
    }
    .postPoint {
      color: red;
      font-size: map-get($fontSizes, "span");
    }
  }
}
</style>
