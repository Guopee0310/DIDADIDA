<template>
  <div @click="show">test</div>
</template>

<script>
export default {
  name: "backEndSlot",
  data() {
    return {};
  },
  mounted() {},
  methods: {
    show() {
      console.log(window.location.pathname);
    },
  },
  computed: {},
};
</script>
<style scoped lang="scss"></style>
