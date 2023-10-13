<template>
    <div class="search">
        <input type="search" :placeholder="txt "   v-model="searchInput"><button>搜尋</button>
    </div>
</template>
<script>
export default {
  data() {
    return {
      searchInput: ""
    };
  },
  props:{
    txt:String
  },
  methods: {
    handleSearch(e) {
      console.log(e.target.value)
      this.searchInput = e.target.value
    },
  },
  watch: {
    searchInput(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("this.searchInput", this.searchInput);
      this.$emit("transferSearch", this.searchInput);
    },
  },
};
</script>