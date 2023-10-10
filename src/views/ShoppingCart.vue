<template>
  <div class="shop_cart">
    <h1>購物車</h1>
    <p class="product_count">總共有{{ prodCount }}件商品</p>
    <div class="sort_name">
      <li>產品</li>
      <li>價錢</li>
      <li>數量</li>
      <li>小計</li>
    </div>
    <div class="cart_content">
      <div v-if="prodCount === 0" class="cart_null">您的購物車是空的</div>
      <ul v-else>
        <li v-for="(prod, index) in shopCartData" :key="index">
          <div class="card">
            <div class="product_name">
              <label class="check"
                ><input type="checkbox" v-model="prod.select"
              /></label>
              <img :src="prod.imgURL" alt="" />

              <span class="prodname">{{ prod.name }}</span>
            </div>
            <div class="price">NTD{{ prod.price }}</div>
            <div class="count">
              <input
                type="button"
                value="-"
                class="btn minus"
                @click="minusBtn(prod)"
              />
              <input
                type="text"
                v-model="prod.count"
                @input="handleCountInput(prod)"
              />
              <input
                type="button"
                value="+"
                class="btn plus"
                @click="plusBtn(prod)"
              />
            </div>
            <div class="product_price">NTD{{ calculatePrice[index] }}</div>
            <div class="icons">
              <heart
                class="heart"
                @click="pushInFav(prod)"
                :is-active="
                  favList.findIndex((v) => v.favoName === prod.name) > -1
                "
              />
              <div class="cancel_icon" @click="deleteProduct(index)">
                <i class="fa-solid fa-trash-can"></i>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <label
        ><input type="checkbox" v-model="selectAll" class="selectAll" />全選({{
          selectedCount
        }})</label
      >
      <span @click="deleteSelected" class="deleteSelect">刪除已選物品</span>
    </div>

    <div class="checkout">
      <div checkoutleft>
        <div class="test">
          <h2>選擇運送方式</h2>
          <div class="item">
            <input
              name="transport"
              id="7-11"
              type="radio"
              value="60"
              v-model="picked"
            />
            <label for="7-11">711 店到店 + 60元</label>
          </div>
          <div class="item">
            <input
              name="transport"
              id="free"
              type="radio"
              value="0"
              v-model="picked"
            />
            <label for="free">到園領取 FREE</label>
          </div>
        </div>

        <div class="receive">
          <h2>填寫收件資訊</h2>
          <div class="input_group" id="receive_info">
            <div class="name">
              <div class="field__label">收件人姓名</div>
              <input type="text" class="field_input" maxlength="50" />
            </div>
            <div class="surname">
              <div class="field__label">收件人手機</div>
              <input type="text" class="field_input" maxlength="50" />
            </div>
            <div>
              <div class="field__label">收件地址</div>
              <input type="text" class="field_input" />
            </div>
          </div>
        </div>
      </div>

      <div class="test2">
        <div class="item">
          <h2>商品金額:</h2>
          <span>{{ allProduct_Price }}</span>
          <p class="freight">運費:{{ picked }}</p>
          <p>
            總計:<span>{{ allProduct_Price + parseInt(picked) }}</span>
          </p>
        </div>
        <button @click="clearShopping">前往結帳</button>
      </div>
    </div>
  </div>
</template>

<script>
import heart from "@/components/heart.vue";
export default {
  data() {
    return {
      activeHeart: true,
      shopCartData: [
        // {
        //   imgURL: './image/dolphin_doll.png',
        //   name: '海豚玩偶',
        //   price: '890',
        //   count: 1,
        //   select: false
        // },
        // {
        //   imgURL: './image/ocean_tshirt.jpg',
        //   name: '海洋T-Shirt',
        //   price: '690',
        //   count: 1,
        //   select: false
        // },
        // {
        //   imgURL: './image/shark_doll.jpg',
        //   name: '鯊魚玩偶',
        //   price: '600',
        //   count: 1,
        //   select: false
        // },
        // {
        //   imgURL: './image/seagull_tshirt.png',
        //   name: '海鷗T-Shirt',
        //   price: '680',
        //   count: 1,
        //   select: false
        // }
      ],
      picked: 0,
    };
  },
  created() {
    if (!this.$store.state.userName) {
      alert("需先登入");
      this.$router.push("/");
    }
    this.shopCartData = this.$store.state.shoppingCart;
  },
  mounted() {
    console.log(this.$store.state.shoppingCart);
  },
  components: {
    heart,
  },
  computed: {
    favList() {
      return this.$store.state.favoList;
    },
    calculatePrice() {
      return this.shopCartData.map((prod) => prod.price * prod.count);
    },
    prodCount() {
      return this.shopCartData.length;
    },
    selectedCount() {
      return this.shopCartData.filter((prod) => prod.select).length;
    },
    selectAll: {
      get() {
        return this.selectedCount === this.prodCount && this.prodCount > 0;
      },
      set(value) {
        this.shopCartData.forEach((prod) => {
          prod.select = value;
        });
      },
    },
    allProduct_Price() {
      return this.shopCartData.reduce((total, prod) => {
        return total + prod.price * prod.count;
      }, 0);
    },
  },
  methods: {
    //   imgURL: './image/dolphin_doll.png',
    //   name: '海豚玩偶',
    //   price: '890',
    //   count: 1,
    //   select: false
    clearShopping() {
      for (let i = 0; i < this.shopCartData.length; i++) {
        this.$store.state.prodOrderArr.push({
          prodImg: this.shopCartData[i].imgURL,
          prodName: this.shopCartData[i].name,
          prodCount: this.shopCartData[i].count,
          prodPrice: this.shopCartData[i].price,
          prodDate: `${new Date().getFullYear()}.${new Date().getMonth()}.${new Date().getDate()}`,
        });
      }
      this.shopCartData = [];
      setTimeout(() => {
        this.$store.state.shoppingCart = [];
      }, 100);
      setTimeout(() => {
        this.$store.state.memberBtn = "prod_order_inquiry";
        this.$router.push({
          path: "/member",
          query: { section: "showProdOrder" },
        });
        setTimeout(() => {
          // 获取滚动目标元素
          const target = document.getElementById("showProdOrder");

          // 滚动到目标元素
          if (target) {
            target.scrollIntoView({ behavior: "smooth" });
          }
        }, 400);
      }, 300);
    },
    pushInFav(i) {
      const favListIndex = this.favList.findIndex((v) => v.favoName === i.name);
      if (favListIndex > -1) {
        this.$store.state.favoList.splice(favListIndex, 1);
      } else {
        this.$store.state.favoList.push({
          favoImg: i.imgURL,
          favoName: i.name,
          favoPrice: i.price,
          favoIntroduction: `${i.name}的介紹`,
        });
      }
    },
    minusBtn(prod) {
      if (prod.count == 1) return;
      prod.count -= 1;
    },
    plusBtn(prod) {
      if (prod.count == 999) return;
      prod.count += 1;
    },
    deleteProduct(index) {
      this.shopCartData.splice(index, 1);
    },
    handleCountInput(prod) {
      if (prod.count <= 0) {
        prod.count = 1;
      } else if (prod.count > 999) {
        prod.count = 999;
      }
    },
    deleteSelected() {
      this.shopCartData = this.shopCartData.filter((prod) => !prod.select);
    },
  },
};
</script>

<style scoped lang="scss">
* {
  margin: 0;
  padding: 0;
  list-style: none;
  box-sizing: border-box;
  color: #23344e;
}

body {
  background-color: rgb(151, 151, 206);
  background-size: cover;
}

input[type="checkbox"] {
  vertical-align: middle;
}

.shop_cart {
  max-width: 1000px;
  margin: auto;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
  padding: 2rem;
  margin-top: 5rem;
  margin-bottom: 5rem;
  border-radius: 2rem;
  background-color: #fff;
}

.shop_cart h1 {
  margin: 2rem 0;
}

.sort_name {
  width: 100%;
  display: flex;
  border-bottom: 1px solid rgba(0, 0, 0, 0.6);
}

.sort_name > li {
  width: 20%;
  text-align: center;
}

.sort_name li:first-child {
  width: 30%;
}

.card {
  margin: 2rem 0;
  border-bottom: 1px solid rgba(0, 0, 0, 0.16);
  display: flex;
  align-items: center;
}

.card > div {
  width: 20%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card div:first-child {
  width: 30%;
  justify-content: space-around;
}

.card div:last-child {
  width: 10%;
}

.product_name img {
  width: 6rem;
  vertical-align: top;
}

.cancel_icon {
  cursor: pointer;
  width: 1rem;
}

.heart {
  cursor: pointer;
  width: 0.5rem;
}

.icons {
  width: 5%;
}

.count {
  display: flex;

  input {
    width: 27px;
    border: 0;
    text-align: center;
    background-color: #9fbdce;
    font-size: 15px;
    outline: none;
  }

  input:first-child {
    border-radius: 15px 0 0 15px;
    cursor: pointer;
  }

  input:last-child {
    border-radius: 0 15px 15px 0;
    cursor: pointer;
  }
}

.cart_null {
  text-align: center;
  font-size: 2rem;
  font-weight: 800;
  margin: 2rem;
}

.product_count {
  text-align: right;
  margin: 1rem 0;
}

.deleteSelect {
  cursor: pointer;
  border-bottom: 1px solid #666;
  position: relative;
  margin-left: 2rem;
}

.selectAll {
  margin-left: 1rem;
}

.checkoutleft {
  width: 50%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.checkout {
  max-width: 1000px;
  margin: auto;
  margin-top: 5rem;
  background-color: #dbdbe5;
  padding: 2rem;
  border-radius: 2rem;
  display: flex;
  border: 1px solid black;
  align-items: flex-start;
  justify-content: space-around;
}

.test,
.receive {
  display: flex;
  flex-direction: column;
  width: 100%;
}

.test .item {
  margin: 10px;
}

.receive .item {
  margin: 10px;
}

.input_group {
  margin-left: 10px;
  margin-top: 5px;
}

.test2 {
  width: 50%;
  position: relative;
}

.test2 button {
  width: 80%;
  background-color: #68769a;
  border: none;
  color: white;
  padding: 5px;
  position: absolute;
  transform: translate(10%, 350%);
  cursor: pointer;
}

.receive {
  display: block;
}

h2 {
  display: inline;
  margin-right: 100px;
}

.test2 .item {
  margin-bottom: 10px;
}

.test2 .item > * {
  margin: 10px 0;
}

.freight {
  border-bottom: 1.5px solid #666;
}

//rwd
@media (max-width: 414px) {
  .shop_cart {
    width: 80%;
    padding: 1rem;
  }

  h1 {
    border-bottom: 1px solid rgba(0, 0, 0, 0.16);
  }

  .sort_name {
    display: none;
  }

  /* 调整购物车项布局 */
  .card {
    flex-direction: column;
    // align-items: flex-start;
  }

  .card div {
    width: 80%;
    margin-bottom: 1rem;
  }

  /* 调整购物车商品图片大小 */
  .check {
    margin-left: -250px;
  }

  .picname img {
    margin: -10px;
  }

  .product_name {
    display: flex;
    flex-direction: column;
    width: 100%;
  }

  .prodname {
    width: 100%;
  }

  .heart {
    margin-right: 40px;
  }

  /* 调整全选复选框样式 */
  .selectAll {
    margin-top: 1rem;
  }

  .checkout {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .test2 {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .test2 .item {
    margin-left: -20px;
  }

  .test2 button {
    left: 35%;
  }

  .checkoutleft,
  .test2 {
    margin: 20px;
  }
}
</style>
