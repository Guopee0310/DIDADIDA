<template>
  <div class="prod_order_main">
    <div class="order_area">
      <div
        class="prod_order_group"
        v-for="prod in prodOrder"
        :key="prod.prodImg"
      >
        <div class="prod_img">
          <img :src="prod.prodImg" alt="" />
        </div>
        <div class="prod_info">
          <div class="item_info prod_item">
            <p>品項</p>
            <p>{{ prod.prodName }}</p>
          </div>
          <div class="item_info prod_count">
            <p>數量</p>
            <p>{{ prod.prodCount }}</p>
          </div>
          <div class="item_info prod_date">
            <p>時間</p>
            <p>{{ prod.prodDate }}</p>
          </div>
          <div class="item_info prod_price">
            <p>金額</p>
            <p>NT {{ prod.prodPrice }}</p>
          </div>
        </div>
      </div>
      <div class="ord_info">
        <!-- <p>下單金額 : NT 1,800</p>
        <p>運費 : NT 60</p>
        <p>使用紅利點數 : 0 點</p>
        <p>總金額 : NT 1860</p> -->
      </div>
      <!-- <div class="close_btn">
        <button>關閉</button>
      </div> -->
    </div>
  </div>
</template>
<script>
export default {
  name: "prodOrderInquiry",
  data() {
    return {
      prodOrder: [],
    };
  },
  created() {
    this.prodOrder = this.$store.state.prodOrderArr;
  },
};
</script>

<style scoped lang="scss">
.prod_order_main {
  p {
    color: map-get($colors, "dark");
  }

  .order_area {
    width: 500px;
    height: 850px;
    border: 0;
    border-radius: 15px;
    margin: 0 auto;
    background-color: map-get($colors, "memarea");
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    overflow-y: scroll;

    &::-webkit-scrollbar {
      width: 10px;
    }

    &::-webkit-scrollbar {
      width: 10px;
    }

    &::-webkit-scrollbar-track-piece {
      background: transparent;
    }

    &::-webkit-scrollbar-thumb {
      border-radius: 4px;
      background-color: rgba(0, 0, 0, 0.2);
      // border: 1px solid slategrey;
    }

    &::-webkit-scrollbar-track {
      box-shadow: transparent;
    }

    &::-webkit-scrollbar-button {
      height: 5px;
      background: transparent;
      border-radius: 4px;
    }

    .prod_order_group {
      width: 460px;
      border-bottom: 1px solid map-get($colors, "h2Blue");
      display: flex;
      justify-content: space-evenly;
      z-index: 2;
    }

    .prod_order_group:last-child {
      border-bottom: 0;
    }

    .prod_img {
      width: 50%;
      height: 150px;
      margin: 20px auto;
      border: 0;
    }

    .prod_img img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .prod_info {
      width: 50%;
      height: 150px;
      margin: 20px auto;
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
    }

    .item_info {
      display: flex;
      justify-content: space-evenly;
      width: 100%;
    }

    .item_info p:first-child {
      width: 30%;
      text-align: center;
      background-color: map-get($colors, "bgc");
    }

    .item_info p:nth-child(2) {
      width: 80%;
      margin-left: 10px;
    }

    .ord_info {
      width: 460px;
      margin-top: 20px;
      text-align: end;
    }

    .close_btn {
      width: 460px;
      text-align: center;
      margin: 50px 0 30px 0;

      button {
        width: 60px;
        color: #eee;
        border: 0;
        border-radius: 5px;
        background-color: #73a8d7;
      }
    }
  }
}

@media screen and (max-width: 414px) {
  .prod_order_main {
    .order_area {
      width: 330px;
      height: 720px;

      .prod_order_group {
        width: 300px;
        flex-direction: column;
      }

      .prod_img {
        width: 50%;
      }

      .prod_info {
        width: 50%;
        margin: 0 auto;
      }
    }
  }
}
</style>
