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
          titleName: "極舒適海豚抱枕",
          prodPrice: "380",
          tag: "抱枕",
        },
        {
          imageSrc: require("../assets/images/whaleshark_doll.png"),
          titleName: "Q版鯨鯊玩偶",
          prodPrice: "499",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/dolphin_doll.png"),
          titleName: "超可愛海豚寶寶玩偶",
          prodPrice: "399",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/shark_doll.jpg"),
          titleName: "愛睏a鯊鯊玩偶",
          prodPrice: "499",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/shark_keyring.jpg"),
          titleName: "鯊鯊吊飾",
          prodPrice: "160",
          tag: "配飾",
        },
        {
          imageSrc: require("../assets/images/Nemo_doll.jpg"),
          titleName: "Nemo玩偶",
          prodPrice: "299",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/sealion_doll.png"),
          titleName: "Q版海獅玩偶",
          prodPrice: "499",
          tag: "玩偶",
        },
        {
          imageSrc: require("../assets/images/shark_doll_2.png"),
          titleName: "Q版鯊鯊",
          prodPrice: "499",
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
      ],
      pageSize: 8,
    };
  },
  mounted() {
    // 初始加載時只顯示前八個項目
    this.chooseItem = this.cardsAll.slice(0, this.pageSize);
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
      // alert(data)
      this.chooseItem = [];
      for (let i = 0; i < this.cardsAll.length; i++) {
        if (data == "所有商品") {
          this.chooseItem = this.cardsAll;
        } else if (this.cardsAll[i].tag === data) {
          this.chooseItem.push(this.cardsAll[i]);
        }
      }
    },
    getPrice(data) {
      this.chooseItem = [...this.cardsAll]; // 克隆 cardsAll 數组

      if (data === "由低到高") {
        this.chooseItem.sort((a, b) => {
          return parseInt(a.prodPrice) - parseInt(b.prodPrice);
        });
      } else if (data === "由高到低") {
        this.chooseItem.sort((a, b) => {
          return parseInt(b.prodPrice) - parseInt(a.prodPrice);
        });
      }
    },
    updatePage(page) {
      // console.log(page);

      const startIdx = (page - 1) * this.pageSize;
      const endIdx = startIdx + this.pageSize;
      this.chooseItem = this.cardsAll.slice(startIdx, endIdx);
    },
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
    box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.2)
  }

  .pic img {
    width: 280px;
    height: 280px;
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
</style>
