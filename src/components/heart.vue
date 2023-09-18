<template>
  <div @click="handleChange">
    <i
      class="fa-regular fa-heart"
      style="color: #232d47"
      v-if="changeHeart"
    ></i>
    <i class="fa-solid fa-heart" style="color: #b93131" v-else></i>
  </div>
</template>

<script>
export default {
  name: "heart",
  data() {
    return {
      changeHeart: true,
    };
  },
  methods: {
    change() {
      this.changeHeart = !this.changeHeart;
    },
    handleChange() {
      this.change();
      this.$emit("change-heart", this.changeHeart);
    },
  },
};
</script>
<style scoped lang="scss">
div {
  cursor: pointer;
}
</style>
