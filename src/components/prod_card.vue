<template>
  <div class="select_btn">
    <prodSelect
      @transferClass="getClass"
      @transferPrice="getPrice"
    ></prodSelect>
  </div>
  <div class="card" v-for="i in chooseItem" :key="i.imageSrc">
    <div class="heart">
      <heart></heart>
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
          <input type="button" value="–" />
          <input type="text" value="1" size="1" />
          <input type="button" value="+" />
        </div>
        <div class="buy">
          <a href="">
            <i class="fa-solid fa-cart-shopping" style="color: #9fbdce"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <Page :total="100" @on-change="updatePage" />
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
          titleName: "大型乾燥花束【和煦】食品",
          prodPrice: "900",
          tag: "食品",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】玩偶",
          prodPrice: "750",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】食品",
          prodPrice: "900",
          tag: "食品",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】玩偶",
          prodPrice: "750",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "1000",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】食品",
          prodPrice: "900",
          tag: "食品",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】玩偶",
          prodPrice: "750",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "600",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "800",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
      ],
      chooseItem: [
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】食品",
          prodPrice: "900",
          tag: "食品",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】玩偶",
          prodPrice: "750",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】食品",
          prodPrice: "900",
          tag: "食品",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】玩偶",
          prodPrice: "750",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "1000",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】食品",
          prodPrice: "900",
          tag: "食品",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】玩偶",
          prodPrice: "750",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "600",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "800",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/dolphin_pillow.jpg"),
          titleName: "大型乾燥花束【和煦】配飾",
          prodPrice: "500",
          tag: "配飾",
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
  }

  .pic img {
    width: 100%;
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
    margin-bottom: 15px;
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
</style>
