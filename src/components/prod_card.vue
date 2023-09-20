<template>
  <div class="select_btn">
    <prodSelect
      @transferClass="getClass"
      @transferPrice="getPrice"
    ></prodSelect>
  </div>
  <div class="card" v-for="(i, index) in chooseItem" :key="i.imageSrc">
    <div class="heart">
      <heart @change-heart="changeHeart($event, i)"></heart>
    </div>
    <div class="pic">
      <a href="#"><img :src="i.imageSrc" alt="" /></a>
    </div>

    <div class="name">
      <a href="">{{ i.titleName }}</a>
    </div>
    <div class="info">
      <div class="cost">
        <span>NT {{ i.prodPrice }}</span>
      </div>
      <div class="prod_btn">
        <div class="num">
          <input type="button" value="–" @click="productDown(index)" />
          <input type="text" :value="i.count" size="1" />
          <input type="button" value="+" @click="i.count++" />
        </div>
        <div class="buy">
          <a href="">
            <i
              class="fa-solid fa-cart-shopping"
              style="color: #9fbdce"
              @click="pushInShoppingCart(i.titleName)"
            ></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <Page :total="100" @on-change="updatePage" class="changepage" />
</template>

<script>
import btn2 from "./btn2.vue";
import heart from "./heart.vue";
import prodSelect from "../components/select.vue";
export default {
  name: "son",
  data() {
    return {
      cardsAll: [
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "極舒適海豚抱枕",
          prodPrice: "380",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/whaleshark_doll.png"),
          titleName: "Q版鯨鯊玩偶",
          prodPrice: "499",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/dolphin_doll.png"),
          titleName: "超可愛海豚寶寶玩偶",
          prodPrice: "399",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_doll.jpg"),
          titleName: "愛睏a鯊鯊玩偶",
          prodPrice: "499",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_keyring.jpg"),
          titleName: "QQ的鯊鯊鑰匙圈",
          prodPrice: "160",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/Nemo_doll.jpg"),
          titleName: "Nemo玩偶",
          prodPrice: "299",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/sealion_doll.png"),
          titleName: "Q版海獅玩偶",
          prodPrice: "499",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_doll_2.png"),
          titleName: "Q版鯊鯊玩偶",
          prodPrice: "499",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/loveing_garden_eel.png"),
          titleName: "戀愛ing花園鰻玩偶",
          prodPrice: "399",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/whale_doll.jpg"),
          titleName: "勾錐a小鯨魚玩偶",
          prodPrice: "350",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/lantern_fish_doll.jpg"),
          titleName: "貪吃燈籠魚玩偶",
          prodPrice: "499",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/pufferfish_doll.jpg"),
          titleName: "愛睏a河豚玩偶",
          prodPrice: "499",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/octopus_doll.jpg"),
          titleName: "老爺爺章魚玩偶",
          prodPrice: "399",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/sea_turtle_doll.jpg"),
          titleName: "勾錐a海龜玩偶",
          prodPrice: "399",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/killer_whale_doll.jpg"),
          titleName: "帥氣a虎鯨玩偶",
          prodPrice: "499",
          tag: "玩偶",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/stingray_pillow.jpg"),
          titleName: "極舒適魟魚抱枕",
          prodPrice: "380",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_pillow2.jpg"),
          titleName: "滿出來鯊鯊抱枕",
          prodPrice: "660",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_pillow.jpg"),
          titleName: "極舒適鯊魚抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
      ],
      chooseItem: [
        {
          imageSrc: require("../assets/images/seahorse_pillow.jpg"),
          titleName: "極舒適海馬抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/whale_pillow.jpg"),
          titleName: "極舒適鯨魚抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/seal_pillow.jpg"),
          titleName: "極舒適海豹抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/killer_whale_pillow.jpg"),
          titleName: "極舒適虎鯨抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/octopus_pillow.jpg"),
          titleName: "章魚大海怪抱枕",
          prodPrice: "650",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/starfish_pillow.jpg"),
          titleName: "極舒適海星抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/jellyfish_pillow.jpg"),
          titleName: "極舒適水母抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/pufferfish_pillow.jpg"),
          titleName: "極舒適河豚抱枕",
          prodPrice: "499",
          tag: "抱枕",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/dolphin_keyring.jpg"),
          titleName: "QQ的海豚鑰匙圈",
          prodPrice: "199",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_hat.jpg"),
          titleName: "動感鯊鯊帽",
          prodPrice: "399",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_cap.jpg"),
          titleName: "造型鯊鯊帽",
          prodPrice: "399",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/whale_shark_purse.jpg"),
          titleName: "鯨鯊零錢包",
          prodPrice: "300",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/starfish_purse.jpg"),
          titleName: "海星零錢包",
          prodPrice: "300",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/killer_whale_purse.jpg"),
          titleName: "虎鯨零錢包",
          prodPrice: "300",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/whale_purse.jpg"),
          titleName: "鯨魚零錢包",
          prodPrice: "600",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/fish_kettle.jpg"),
          titleName: "滿滿的魚水壺",
          prodPrice: "500",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/shark_slippers.jpg"),
          titleName: "超好走鯊鯊拖鞋",
          prodPrice: "499",
          tag: "配飾",
          count: 1,
        },
        {
          imageSrc: require("../assets/images/killer_whale_phonecase.jpg"),
          titleName: "虎鯨手機殼",
          prodPrice: "499",
          tag: "配飾",
          count: 1,
        },
      ],
      pageSize: 8,
      selectFirst: false,
      priceFirst: false,
      chooseItem2: [],
      selectOption: "",
      getPriceOption: "",
      getPage: 1,
    };
  },
  mounted() {
    this.cardsAll.sort((a, b) => {
      return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    });
    this.chooseItem2 = this.cardsAll;
    this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
  },
  props: {
    msg1: [String, Number],
  },
  components: {
    btn2,
    heart,
    prodSelect,
  },
  computed: {},
  methods: {
    productDown(idx) {
      if (this.chooseItem[idx].count > 0) {
        this.chooseItem[idx].count--;
      }
    },
    pushInShoppingCart() {},
    getClass(data) {
      this.selectOption = data;
      if (data == "所有商品") {
        this.chooseItem = this.cardsAll;
        if (this.getPriceOption == "由高到低") {
          this.chooseItem.sort((a, b) => {
            return parseInt(b.prodPrice) - parseInt(a.prodPrice);
          });
          this.chooseItem2 = this.chooseItem;
          this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
        } else if (this.getPriceOption == "由低到高") {
          this.chooseItem.sort((a, b) => {
            return parseInt(a.prodPrice) - parseInt(b.prodPrice);
          });
          this.chooseItem2 = this.chooseItem;
          this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
        } else if (this.getPriceOption == "") {
          this.chooseItem.sort((a, b) => {
            return parseInt(a.prodPrice) - parseInt(b.prodPrice);
          });
          this.chooseItem2 = this.chooseItem;
          this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
        }
      } else {
        this.chooseItem = [];
        for (let i = 0; i < this.cardsAll.length; i++) {
          if (this.cardsAll[i].tag === data) {
            this.chooseItem.push(this.cardsAll[i]);
            if (this.getPriceOption == "由高到低") {
              this.chooseItem.sort((a, b) => {
                return parseInt(b.prodPrice) - parseInt(a.prodPrice);
              });
              this.chooseItem2 = this.chooseItem;
              this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
            } else if (this.getPriceOption == "由低到高") {
              this.chooseItem.sort((a, b) => {
                return parseInt(a.prodPrice) - parseInt(b.prodPrice);
              });
              this.chooseItem2 = this.chooseItem;
              this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
            } else if (this.getPriceOption == "") {
              this.chooseItem.sort((a, b) => {
                return parseInt(a.prodPrice) - parseInt(b.prodPrice);
              });
              this.chooseItem2 = this.chooseItem;
              this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
            }
          }
        }
      }
    },
    getPrice(data) {
      this.getPriceOption = data;
      if (!this.selectOption) {
        this.chooseItem2 = this.cardsAll;
        this.chooseItem2.sort((a, b) => {
          return parseInt(b.prodPrice) - parseInt(a.prodPrice);
        });
        console.log(this.chooseItem2);
        this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
      } else if (this.selectOption == "所有商品") {
        this.chooseItem2 = this.cardsAll;
        this.chooseItem2.sort((a, b) => {
          return parseInt(b.prodPrice) - parseInt(a.prodPrice);
        });
        console.log(this.chooseItem2);
        this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
      } else if (this.selectOption !== "所有商品") {
        this.chooseItem2 = [];
        for (let i = 0; i < this.cardsAll.length; i++) {
          if (this.cardsAll[i].tag === this.selectOption) {
            this.chooseItem2.push(this.cardsAll[i].tag);
            this.chooseItem = this.chooseItem2;
          }
          if (this.getPriceOption == "由高到低") {
            this.chooseItem.sort((a, b) => {
              return parseInt(b.prodPrice) - parseInt(a.prodPrice);
            });
            this.chooseItem2 = this.chooseItem;
            this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
          } else if (this.getPriceOption == "由低到高") {
            this.chooseItem.sort((a, b) => {
              return parseInt(a.prodPrice) - parseInt(b.prodPrice);
            });
            this.chooseItem2 = this.chooseItem;
            this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
          }
        }
      }

      // if (data == "由高到低") {
      //   this.chooseItem.sort((a, b) => {
      //     return parseInt(b.prodPrice) - parseInt(a.prodPrice);
      //   });
      // } else if (data == "由低到高") {
      //   this.chooseItem.sort((a, b) => {
      //     return parseInt(a.prodPrice) - parseInt(b.prodPrice);
      //   });
      // }
    },
    updatePage(data) {
      this.getPage = data;
      const optionStartIdx = (this.getPage - 1) * this.pageSize;
      const optionEndIdx = optionStartIdx + this.pageSize;
      console.log(optionStartIdx);
      console.log(optionEndIdx);
      console.log(this.chooseItem2);
      this.chooseItem = this.chooseItem2.slice(optionStartIdx, optionEndIdx);
    },
    changeHeart(isFav, i) {
      console.log(isFav, i);
      // TODO　ＣＡＬＬ　ＡＰＩ
    },
    // getClass(data) {
    //   this.chooseItem2 = [];
    //   this.selectOption = data;
    //   this.selectFirst = true;
    //   if (this.priceFirst && this.selectFirst) {
    //     this.priceFirst = false;

    //     for (let i = 0; i < this.cardsAll.length; i++) {
    //       if (data == "所有商品") {
    //         this.chooseItem2 = this.cardsAll;
    //         this.chooseItem = this.chooseItem2;
    //         console.log("301行成功觸發", this.cardsAll);
    //         // this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //       } else if (this.cardsAll[i].tag === data) {
    //         this.chooseItem2.push(this.cardsAll[i]);
    //         this.chooseItem = this.chooseItem2;
    //         // this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //       }
    //     }
    //   } else {
    //     for (let i = 0; i < this.cardsAll.length; i++) {
    //       if (data == "所有商品") {
    //         this.chooseItem2 = this.cardsAll;
    //         this.chooseItem = this.chooseItem2;
    //         // this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //       } else if (this.cardsAll[i].tag === data) {
    //         this.chooseItem2.push(this.cardsAll[i]);
    //         this.chooseItem = this.chooseItem2;
    //         // this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //       }
    //     }
    //   }
    // },

    // getPrice(data) {
    //   this.priceFirst = true;
    //   this.getPriceOption = data;
    //   if (!this.selectFirst) {
    //     this.chooseItem2 = this.cardsAll;
    //     console.log("311行 直接篩選價錢的陣列", this.chooseItem2);
    //   } else {
    //     this.chooseItem2 = this.chooseItem;
    //     console.log(this.chooseItem2);
    //   }

    //   if (data === "由低到高") {
    //     this.chooseItem2.sort((a, b) => {
    //       return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //     });
    //   } else if (data === "由高到低") {
    //     this.chooseItem2.sort((a, b) => {
    //       return parseInt(b.prodPrice) - parseInt(a.prodPrice);
    //     });
    //   } else if (data === "價格") {
    //     this.chooseItem2 = this.cardsAll;
    //   }
    //   this.chooseItem = this.chooseItem2;
    //   // const optionStartIdx = (this.getPage - 1) * this.pageSize;
    //   // const optionEndIdx = optionStartIdx + this.pageSize;
    //   // console.log("起始位置", optionStartIdx);
    //   // console.log("結束位置", optionEndIdx);
    //   // this.chooseItem = this.chooseItem2.slice(optionStartIdx, optionEndIdx);
    // },
    // updatePage(page) {
    //   this.getPage = page;
    //   if (this.selectFirst && this.priceFirst) {
    //     this.chooseItem2 = [];

    //     for (let i = 0; i < this.cardsAll.length; i++) {
    //       if (this.selectOption == "所有商品") {
    //         this.chooseItem2 = this.cardsAll;
    //       } else if (this.cardsAll[i].tag === this.selectOption) {
    //         this.chooseItem2.push(this.cardsAll[i]);
    //       }
    //     }
    //     if (this.getPriceOption === "由低到高") {
    //       this.chooseItem2.sort((a, b) => {
    //         return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //       });
    //     } else if (this.getPriceOption === "由高到低") {
    //       this.chooseItem2.sort((a, b) => {
    //         return parseInt(b.prodPrice) - parseInt(a.prodPrice);
    //       });
    //     }
    //     const optionStartIdx = (page - 1) * this.pageSize;
    //     const optionEndIdx = optionStartIdx + this.pageSize;
    //     this.chooseItem = this.chooseItem2.slice(optionStartIdx, optionEndIdx);
    //   } else if (this.selectFirst) {
    //     const selectStartIdx = (page - 1) * this.pageSize;
    //     const selectEndIdx = selectStartIdx + this.pageSize;
    //     this.chooseItem2 = [];
    //     for (let i = 0; i < this.cardsAll.length; i++) {
    //       if (this.selectOption == "所有商品") {
    //         this.chooseItem2 = this.cardsAll;
    //       } else if (this.cardsAll[i].tag === this.selectOption) {
    //         this.chooseItem2.push(this.cardsAll[i]);
    //       }
    //     }
    //     console.log("起始位置", selectStartIdx);
    //     console.log("結束位置", selectEndIdx);
    //     console.log("複製的陣列", this.chooseItem2);
    //     this.chooseItem = this.chooseItem2.slice(selectStartIdx, selectEndIdx);
    //     console.log(this.chooseItem2);
    //   } else {
    //     const startIdx = (page - 1) * this.pageSize;
    //     const endIdx = startIdx + this.pageSize;
    //     this.chooseItem = this.cardsAll.slice(startIdx, endIdx);
    //   }
    // },
  },
};
</script>
<style scoped lang="scss">
.card {
  width: calc((100% / 4) - 20px);
  // margin: 0 0 50px;
  margin: 0 10px 50px;
  display: flex;
  flex-wrap: wrap;

  .heart {
    margin: 0 0 -50px auto;
    padding: 0 5px;
    z-index: 2;
  }

  .pic {
    overflow: hidden;
    margin-bottom: 10px;
    box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.2);
  }

  .pic img {
    width: 280px;
    height: 280px;
    object-fit: cover;
    vertical-align: top;
    transform: scale(1);
    transition: 0.7s;
  }

  .pic img:hover {
    transition: 0.7s;
    transform: scale(1.1);
  }

  .name {
    font-size: 17px;
    letter-spacing: 1px;
    margin-top: 10px;
    margin-bottom: 10px;
    line-height: 1.5;
    font-family: Gowun Batang, "Times New Roman", Times, NotoSerifCJKtc-Regular,
      serif;
    color: #333;
  }

  .name a {
    text-decoration: none;
    color: #333;
    transition: 0.3s;
    font-size: Gowun Batang, "Times New Roman", Times, NotoSerifCJKtc-Regular,
      serif;
    display: block;
  }

  .info {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .prod_btn {
    display: flex;
  }

  .num input {
    width: 27px;
    border: 0;
    text-align: center;
    background-color: #9fbdce;
    font-size: 15px;
  }

  .num input:first-child {
    border-radius: 15px 0 0 15px;
  }

  .num input:last-child {
    border-radius: 0 15px 15px 0;
  }

  .buy {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .buy i {
    font-size: 17px;
  }

  .buy .fa-cart-shopping {
    width: 12px;
  }

  .buy:hover .fa-plus {
    display: none;
  }

  .buy:hover .fa-cart-shopping {
    display: inline-block;
  }

  .buy:hover {
    background-color: #eee;
  }

  .name a:hover {
    color: #c48710;
    transition: 0.2s;
  }

  .buy img:nth-child(1):hover {
    transition: 0.2s;
    opacity: 0;
  }
}

.select_btn {
  width: 1200px;
  margin: 50px auto;
  display: flex;
  justify-content: end;
}
.changepage {
  width: 1200px;
  text-align: center;
}
</style>
