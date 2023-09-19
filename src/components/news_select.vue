<template>
    <div class="choose">
        <div class="select_wrap">
        <div class="select">
      <select name="" id="itemClass" v-model="selectedItem">
        <option v-for="(item, index) in tagSelect" :key="index">
          {{ item.option }}
        </option>
      </select>
      <span><i class="fa-solid fa-chevron-down" style="color: #eeeeee"></i></span>
    </div>
    <div class="select" >
      <select v-model="selectedmonth">
        <option v-for="(item, index) in monthSelect" :key="index" >
          {{ item.option }}
        </option>
      </select>
      <span><i class="fa-solid fa-chevron-down" style="color: #eeeeee"></i></span>
    </div>
    </div>
    <div class="search">
        
        <input type="txt" placeholder="搜尋" v-model="searchInput">
        <button class="icon">
          <i class="fa-sharp fa-solid fa-magnifying-glass" style="color: #bdc9db;"></i>
        </button>
    </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        tagSelect: [
          { option: "所有主題" },
          { option: "表演" },
          { option: "活動" },
          { option: "優惠" }
        ],
        monthSelect: [{ option: "由新到舊" }, { option: "由舊到新" }],
        selectedItem: "所有主題",
        selectedmonth: "由新到舊",
        searchInput:""
        
      };
    },
    methods: {
        handleSearch(e){
                    console.log(e.target.value)
                    this.searchInput = e.target.value
                },
    },
    emits: ["transferClass","transfertime"],
    watch: {
    selectedItem(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("this.selectedItem", this.selectedItem);
      this.$emit("transferClass", this.selectedItem);
    },
    selectedmonth(newValue, oldValue) {
      // 在这里可以处理选项变化的逻辑
      console.log("新选项：", newValue);
      console.log("this.selectedmonth", this.selectedmonth);
      this.$emit("transfertime", this.selectedmonth);
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
 .choose{
    width: 90vw;
    margin: 50px 0;
    display: flex;
    justify-content: space-evenly;
    select {
    @include selectBtn;
  }
  
  /* Remove IE arrow */
  select::-ms-expand {
    display: none;
  }
  
  /* Custom Select wrapper */
  .select {
    @include btnWidth;
    margin: 0 30px;
  
    span {
      position: absolute;
      top: 8px;
      right: 18px;
      font-size: 15px;
      pointer-events: none;
    }
  }
  
  option {
    background-color: #2c3e50;
  }
  .select_wrap{
    width: 50%;
    display: flex;
  }
  .search{
    width: 50%;
    position: relative;
    text-align: right;
    input[type="txt"]{
        width: 50%;
        border-radius: 1em;
        padding: 5px;
        margin-right: 40px;
        border: 1px solid #2c3e5041;
        outline: none;
    }
    .icon{
        height: 100%;
        position: absolute;
        top: 0;
        right: 50px;
        border: 0;
        background-color: transparent;
        cursor: pointer;
        i{
            height: 100%;
            display: flex;
            align-items: center;
            vertical-align: top;
        }

    }
  }
 }
 @media screen and (max-width:992px) {
  

}
  </style>
  