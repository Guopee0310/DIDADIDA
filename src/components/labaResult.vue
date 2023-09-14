<template>
  <div>
    <img :src="require(getSrc)" alt="" />
    <!-- <img :src="require('../assets/images/dolphin_pillow.jpg')" alt="" /> -->
  </div>
  <div>
    <div>{{ title1 }}是您的幸運星</div>
    <div>{{ post1 }}</div>
    <div>您共獲得{{ point1 }}點紅利點數!</div>
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
  props: ["imgSrc1", "title1", "post1", "point1"],
  methods: {},
  computed: {
    getSrc() {
      //   if (this.point1 == "15") {
      //     return this.imgSrcArr[0];
      //   }
      return this.point1 == "15"
        ? this.imgSrcArr[0]
        : this.point1 == "30"
        ? this.imgSrcArr[1]
        : this.point1 == "50"
        ? this.imgSrcArr[2]
        : this.point1 == "5"
        ? this.imgSrcArr[3]
        : "";
    },
  },
  components: {},
};
</script>
<style scoped lang="scss"></style>
