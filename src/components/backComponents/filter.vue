<template>
  <div class="title">
    <div class="search">
      <input type="search" placeholder="商品查詢" v-model="searchInput"><button>搜尋</button>
    </div>
    <ul>
      <li>商品編號/商品圖片</li>
      <li>
        <select name="" id="" v-model="selectedItem">
          <option v-for="(item,index) in categorySelect" :key="index" :value="item.value">{{ item.option}}</option>
        
        </select>
      </li>
      <li><select name="" id="" v-model="selectedPrice">
        <option v-for="(item,index) in priceSelect" :key="index">{{ item.option}}</option>
        </select>
      </li>
      <li>商品描述</li>
      <li>
        <select name="" id="" v-model="selectedState">
          <option v-for="(item,index) in stateSelect" :key="index" :value="item.value">{{ item.option}}</option>
        </select>
      </li>
    </ul>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      categorySelect: [
        { option: "商品種類/商品名稱", value:"" },
        { option: "抱枕", value:"抱枕" },
        { option: "玩偶", value:"玩偶" },
        { option: "配飾", value:"配飾" }
      ],
      priceSelect: [{ option: "價格" }, { option: "高到低" },{ option: "低到高" }],
      stateSelect: [{ option: "狀態",value:"" }, { option: "上架" ,value: "1"},{ option: "下架",value: "0" }],
      selectedItem: "",
      selectedPrice: "價格",
      selectedState: "",
      searchInput: ""
    };
  },
  methods: {
    handleSearch(e) {
      console.log(e.target.value)
      this.searchInput = e.target.value
    },
  },
  emits: ["category", "price","state"],
  watch: {
    selectedItem(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("this.selectedItem", this.selectedItem);
      this.$emit("category", this.selectedItem);
    },
    selectedPrice(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("selectedPrice", this.selectedPrice);
      this.$emit("price", this.selectedPrice);
    },
    selectedState(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("selectedState", this.selectedState);
      this.$emit("state", this.selectedState);
    },
    searchInput(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("this.searchInput", this.searchInput);
      this.$emit("transferSearch", this.searchInput);
    },
  },
};
</script>
  
<style scoped lang="scss">
.title {
  width: 100%;
  border-bottom: 1px solid #000;
  margin: 1em 0;

  .search {
    width: 100%;
    text-align: right;
    margin: 1rem 0;

    input[type="search"] {
      outline: none;
      padding: 0.1rem;
    }
  }

  ul {
    width: 100%;
    margin: auto;
    display: flex;

    li {
      &:nth-of-type(1) {
        width: 25%;
        text-align: center;
      }

      &:nth-of-type(2) {
        width: 20%;
        text-align: center;
      }

      &:nth-of-type(3) {
        width: 10%;
        text-align: center;
      }

      &:nth-of-type(4) {
        width: 20%;
        padding-left: 2.6rem;
      }

      &:nth-of-type(5) {
        width: 25%;
        padding-left: 2.6rem;
      }
    }
  }
}
</style>
  