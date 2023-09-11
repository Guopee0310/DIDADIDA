<template>
  <div class="select">
    <select name="" id="itemClass" v-model="selectedItem">
      <option v-for="(prod, proIndex) in prodSelect" :key="proIndex">
        {{ prod.option }}
      </option>
    </select>
  </div>
  <div class="select">
    <select v-model="selectedPrice">
      <option v-for="(cost, costIndex) in costSelect" :key="costIndex">
        {{ cost.option }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  data() {
    return {
      prodSelect: [
        { option: "所有商品" },
        { option: "食品" },
        { option: "玩偶" },
        { option: "配飾" },
      ],
      costSelect: [{ option: "由低到高" }, { option: "由高到低" }],
      selectedItem: "所有商品",
      selectedPrice: "由低到高",
    };
  },
  methods: {},
  emit: ["transferClass", "transferPrice"],
  watch: {
    selectedItem(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("this.selectedItem", this.selectedItem);
      this.$emit("transferClass", this.selectedItem);
    },
    selectedPrice(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("this.selectedPrice", this.selectedPrice);
      this.$emit("transferPrice", this.selectedPrice);
    },
  },
};
</script>
<style scoped lang="scss">
select {
  /* Reset Select */
  @include selectBtn;

  margin-right: 10px;
}

/* Remove IE arrow */
select::-ms-expand {
  display: none;
}

/* Custom Select wrapper */
.select {
  @include btnWidth;
}

.select::after {
  @include arrow;
}

option {
  background-color: #2c3e50;
}
</style>
