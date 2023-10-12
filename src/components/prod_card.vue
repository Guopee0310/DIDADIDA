<template>
  <div class="select_btn">
    <prodSelect
      @transferClass="getClass"
      @transferPrice="getPrice"
      @transferSearch="searchClick"
    ></prodSelect>
  </div>
  <div class="card" v-for="(i, index) in chooseItem" :key="i.imageSrc">
    <div class="heart">
      <heart
        @change-heart="changeHeart($event, i, index)"
        :keepLove="keepHeartArr[index]"
        :is-active="mountedShowLove.findIndex((v) => v == i.prod_id) > -1"
      ></heart>
    </div>
    <div class="pic">
      <a href="#" @click.prevent="showProductDetails(i)"
        ><img :src="'../all_images/product/' + i.prod_img" :alt="i.prod_img"
      /></a>
    </div>

    <div class="name">
      <a href="">{{ i.prod_name }}</a>
    </div>
    <div class="info">
      <div class="cost">
        <span>NT {{ i.prod_price }}</span>
      </div>
      <div class="prod_btn">
        <div class="num">
          <input type="button" value="–" @click="productDown(index)" />
          <input type="text" :value="i.count" size="1" />
          <input type="button" value="+" @click="i.count++" />
        </div>
        <div class="buy">
          <i
            class="fa-solid fa-cart-shopping"
            style="color: #9fbdce"
            @click.prevent="
              pushAndTogglePopup(i.imageSrc, i.titleName, i.count, i.prodPrice)
            "
          ></i>
          <!-- pushInShoppingCart(
                  i.imageSrc,
                  i.titleName,
                  i.count,
                  i.prodPrice
                ) -->

          <cartpop />
        </div>
      </div>
    </div>
  </div>
  <!-- ↓↓↓ 商品彈窗 ↓↓↓ -->
  <transition name="fade">
    <div v-if="selectedProduct" class="modal">
      <div class="shadow" @click="closeModal"></div>
      <div class="modal-content">
        <div class="prod-content">
          <div class="prod-img">
            <img :src="'../all_images/product/' + selectedProduct.prod_img" />
          </div>
          <div class="prod-info">
            <div>
              <h5>{{ $t(selectedProduct.prod_name) }}</h5>
              <p>NT {{ $t(selectedProduct.prod_price) }}</p>
            </div>
            <p>{{ $t(selectedProduct.prod_info) }}</p>
          </div>
        </div>
        <div class="close" @click="closeModal">
          <i class="fa-solid fa-xmark" style="color: #062f4a"></i>
        </div>
      </div>
    </div>
  </transition>
  <!-- ↑↑↑ 商品彈窗 ↑↑↑ -->
  <Page
    :total="chooseItem2.length"
    @on-change="updatePage"
    class="changepage"
    v-if="showPage"
  />
</template>

<script>
import heart from "./heart.vue";
import prodSelect from "../components/select.vue";
import cartpop from "../components/cartPopup.vue";
import { mapMutations } from "vuex";
export default {
  name: "son",
  data() {
    return {
      mountedShowLove: [],
      cardsAll: [
        // {
        //   imageSrc: require("../assets/images/dolphin_pillow.jpg"),
        //   titleName: "極舒適海豚抱枕",
        //   select: '極舒適海豚',
        //   prodPrice: "380",
        //   tag: "抱枕",
        //   count: 1,
        //   info: "「極舒適海豚抱枕」是您夢寐以求的抱枕。其柔軟的材質和海豚形狀設計讓您享受極致舒適，既可擁抱入眠，又可成為可愛的房間裝飾品。",
        // },
        // {
        //   imageSrc: require("../assets/images/whaleshark_doll.png"),
        //   titleName: "Q版鯨鯊玩偶",
        //   select: 'Q版鯨鯊',
        //   prodPrice: "499",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「Q版鯨鯊玩偶」是一個極簡、迷你的鯨鯊玩偶，以可愛的卡通風格設計。這款迷你玩偶具有小巧的尺寸，適合放在口袋或書包中，成為您的愉快小夥伴。",
        // },
        // {
        //   imageSrc: require("../assets/images/dolphin_doll.png"),
        //   titleName: "超可愛海豚寶寶玩偶",
        //   select: '超可愛海豚寶寶',
        //   prodPrice: "399",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「超可愛海豚寶寶玩偶」是一個迷人的玩偶，以小海豚寶寶的形象設計。它擁有極簡潔的設計，給人一種無比的可愛感。這款玩偶是孩子們的絕佳伴侶，也是精緻的收藏品。",
        // },
        // {
        //   imageSrc: require("../assets/images/shark_doll.jpg"),
        //   titleName: "愛睏a鯊鯊玩偶",
        //   select: '愛睏a鯊鯊',
        //   prodPrice: "499",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「愛睏a鯊鯊玩偶」是一個可愛的鯊魚玩偶，具有獨特的睡眼設計，這使它看起來非常愛睏。這款玩偶適合成為可愛的伴侶，也是小朋友的最愛。",
        // },
        // {
        //   imageSrc: require("../assets/images/shark_keyring.jpg"),
        //   titleName: "QQ的鯊鯊鑰匙圈",
        //   select: 'QQ的鯊鯊鑰匙圈',
        //   prodPrice: "160",
        //   tag: "配飾",
        //   count: 1,
        //   info: "「鯊鯊鑰匙圈」是一款可愛的小配件，以鯊魚形狀設計，用於保管鑰匙或裝飾包包，為日常生活增添樂趣和風格。",
        // },
        // {
        //   imageSrc: require("../assets/images/Nemo_doll.jpg"),
        //   titleName: "Nemo玩偶",
        //   select: 'Nemo',
        //   prodPrice: "299",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「Nemo玩偶」 是根據迪士尼電影《海底總動員》中的角色Nemo而設計的玩偶。它具有明亮的橙色和黑色斑點，是一款受歡迎的玩偶，適合孩子們和電影粉絲收藏。",
        // },
        // {
        //   imageSrc: require("../assets/images/sealion_doll.png"),
        //   titleName: "Q版海獅玩偶",
        //   select: 'Q版海獅',
        //   prodPrice: "499",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「Q版海獅玩偶」是一款迷人的迷你玩偶，以可愛的海獅形象設計。它小巧精致，適合攜帶。這個玩偶的卡通風格和生動表情使它成為收藏或贈送的理想選擇，带來快樂和活力。",
        // },
        // {
        //   imageSrc: require("../assets/images/shark_doll_2.png"),
        //   titleName: "Q版鯊鯊玩偶",
        //   select: 'Q版鯊鯊',
        //   prodPrice: "499",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「Q版鯊鯊玩偶」是一款迷人的小型鯊鯊玩偶，以簡約卡通風格設計。這個可愛的玩偶適合作為收藏品或擺設，為您的空間增添一抹活潑和趣味。無論您是鯊魚愛好者還是尋找可愛禮物的人，都會喜歡它。",
        // },
        // {
        //   imageSrc: require("../assets/images/loveing_garden_eel.png"),
        //   titleName: "戀愛ing花園鰻玩偶",
        //   select: '戀愛ing花園鰻',
        //   prodPrice: "399",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「戀愛ing花園鰻玩偶」是一款可愛的玩偶，呈現花園鰻魚的形象。它的簡約和迷人風格使其成為心愛者的絕佳禮物。無論是擺放在房間還是擁抱入眠，都能帶來愉悅和溫馨。",
        // },
        // {
        //   imageSrc: require("../assets/images/whale_doll.jpg"),
        //   titleName: "勾錐a小鯨魚玩偶",
        //   select: '勾錐a小鯨魚',
        //   prodPrice: "350",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「勾錐a小鯨魚玩偶」是一款迷人的鯨魚玩偶，以卡通風格設計，擁有可愛的外觀。這款小巧玩偶適合作為伴侶或房間裝飾，為您的空間增添一份愉快和輕鬆。",
        // },
        // {
        //   imageSrc: require("../assets/images/lantern_fish_doll.jpg"),
        //   titleName: "貪吃燈籠魚玩偶",
        //   select: '貪吃燈籠魚',
        //   prodPrice: "499",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「貪吃燈籠魚玩偶」是一款有趣的玩偶，以燈籠魚的形象製作，帶有食量大的特點。這款玩偶設計簡潔，常常以卡通風格呈現，適合作為愉快的房間裝飾品或有趣的禮物，為您帶來歡笑和輕鬆。",
        // },
        // {
        //   imageSrc: require("../assets/images/pufferfish_doll.jpg"),
        //   titleName: "愛睏a河豚玩偶",
        //   select: '愛睏a河豚',
        //   prodPrice: "499",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「愛睏a河豚玩偶」是一個可愛的小河豚玩偶，以愛睏的表情設計而成。這款玩偶非常迷人，適合成為抱枕或可愛的房間裝飾品，為您帶來放鬆和愉快的時刻。",
        // },
        // {
        //   imageSrc: require("../assets/images/octopus_doll.jpg"),
        //   titleName: "老爺爺章魚玩偶",
        //   select: '老爺爺章魚',
        //   prodPrice: "399",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「老爺爺章魚玩偶」是一款富有特色的章魚造型玩偶，展現了老爺爺的風度。這個玩偶帶有幽默感，適合收藏或當作獨特的禮物。其搞笑的外表和老爺爺形象為您帶來歡樂和溫馨。",
        // },
        // {
        //   imageSrc: require("../assets/images/sea_turtle_doll.jpg"),
        //   titleName: "勾錐a海龜玩偶",
        //   select: '勾錐a海龜',
        //   prodPrice: "399",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「勾錐a海龜玩偶」是一個迷人的海龜玩偶，以簡約風格呈現。這個小巧而可愛的玩偶適合成為伴侶或可愛的房間裝飾，為您帶來愉悅和寧靜的感覺。",
        // },
        // {
        //   imageSrc: require("../assets/images/killer_whale_doll.jpg"),
        //   titleName: "帥氣a虎鯨玩偶",
        //   select: '帥氣a虎鯨',
        //   prodPrice: "499",
        //   tag: "玩偶",
        //   count: 1,
        //   info: "「帥氣a虎鯨玩偶」是一款迷人的虎鯨造型玩偶，擁有帥氣風格。這個玩偶以卡通風格呈現，適合作為有趣的房間裝飾品或送給虎鯨愛好者的完美禮物，充滿個性和魅力。",
        // },
        // {
        //   imageSrc: require("../assets/images/stingray_pillow.jpg"),
        //   titleName: "極舒適魟魚抱枕",
        //   select: '極舒適魟魚',
        //   prodPrice: "380",
        //   tag: "抱枕",
        //   count: 1,
        //   info: "「極舒適魟魚抱枕」，是一款柔軟舒適的抱枕，呈現出迷人的魟魚造型。它擁有絨毛材質，帶來極致的觸感和舒適度。這個抱枕不僅適合擁抱入眠，還可以成為可愛的房間裝飾，為您帶來寧靜和溫馨。",
        // },
        // {
        //   imageSrc: require("../assets/images/shark_pillow2.jpg"),
        //   titleName: "滿出來鯊鯊抱枕",
        //   select: '滿出來鯊鯊',
        //   prodPrice: "660",
        //   tag: "抱枕",
        //   count: 1,
        //   info: "「滿出來鯊鯊抱枕」是一款極其可愛的鯊鯊造型抱枕，擁有豐滿的外觀。這個抱枕以柔軟的絨毛材質設計，為您帶來絕佳的抱擁感受，同時也是愉快的房間裝飾品，讓您感受到無盡的溫馨和歡樂。",
        // },
        // {
        //   imageSrc: require("../assets/images/shark_pillow.jpg"),
        //   titleName: "極舒適鯊魚抱枕",
        //   select: '極舒適鯊魚',
        //   prodPrice: "499",
        //   tag: "抱枕",
        //   count: 1,
        //   info: "「極舒適鯊魚抱枕」是一款柔軟舒適的抱枕，呈現鯊魚的可愛造型。它以豐富的絨毛材質製成，提供極佳的抱擁感受。這款抱枕不僅適合擁抱入眠，還是愉快的房間裝飾品，為您帶來舒適和歡樂。",
        // },
      ],
      chooseItem: [],
      pageSize: 8,
      selectFirst: false,
      priceFirst: false,
      chooseItem2: [],
      selectOption: "所有商品",
      getPriceOption: "價格",
      getPage: 1,
      keepHeartArr: [],
      searchInput: "",
      showModal: false,
      selectedProduct: null,
      showPage: true,
    };
  },
  created() {
    this.mountedShowLove = [];
    fetch(`${this.$store.state.APIurl}prod_cardFavSelect.php`)
      .then(function (response) {
        return response.json();
      })
      .then((data) => {
        if (!this.$store.state.userName) {
          return;
        }

        for (let i = 0; i < data.length; i++) {
          if (this.$store.state.memberId == data[i].mem_id) {
            this.mountedShowLove.push(data[i].prod_id);
          }
        }
      });
  },
  async mounted() {
    try {
      // 非同步請求數據
      const response = await fetch(
        "http://localhost/dida_project/public/php/productSelect.php"
      );
      const myJson = await response.json();
      for (let i = 0; i < myJson.length; i++) {
        myJson[i].count = 1;
      }
      this.cardsAll = myJson.filter((item) => item.prod_listed !== "0");

      //加載後
      this.chooseItem = [...this.cardsAll];
      this.cardsAll.sort((a, b) => {
        return parseInt(a.prodPrice) - parseInt(b.prodPrice);
      });
      this.chooseItem2 = this.cardsAll;
      this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
      for (let i = 0; i < this.chooseItem2.length; i++) {
        this.keepHeartArr.push(true);
      }
      for (let i = 0; i < this.$store.state.favoList.length; i++) {
        this.keepHeartArr[this.$store.state.favoList[i].favIndex] = false;
      }
      this.getClass(this.selectOption);
      this.getPrice(this.getPriceOption);
    } catch (error) {
      console.error("数据加载失败：", error);
    }
  },
  props: {
    msg1: [String, Number],
  },
  components: {
    heart,
    prodSelect,
    cartpop,
  },
  computed: {
    favList() {
      return this.$store.state.favoList;
    },
  },
  methods: {
    // 商品彈窗 ----------------------------------
    showProductDetails(i) {
      this.selectedProduct = i;
    },
    closeModal() {
      this.selectedProduct = null;
    },
    // ------------------------------------------
    productDown(idx) {
      if (this.chooseItem[idx].count > 0) {
        this.chooseItem[idx].count--;
      }
    },
    pushInShoppingCart(img1, name1, count1, price1) {
      console.log([img1, name1, count1, price1]);
      if (!this.$store.state.userName) {
        alert("需先登入會員");
        return;
      }
      for (let i = 0; i < this.$store.state.shoppingCart.length; i++) {
        if (img1 === this.$store.state.shoppingCart[i].imgURL) {
          this.$store.state.shoppingCart[i].count += count1;
          return;
        }
      }
      this.$store.state.shoppingCart.push({
        imgURL: img1,
        name: name1,
        price: price1,
        count: count1,
        select: false,
      });
      console.log(this.$store.state.shoppingCart);
      //   imgURL: './image/seagull_tshirt.png',
      //   name: '海鷗T-Shirt',
      //   price: '680',
      //   count: 1,
    },
    // getClass(data) {
    //   this.selectOption = data;
    //   if (data == "所有商品") {
    //     this.chooseItem = this.cardsAll;
    //     if (this.getPriceOption == "由高到低") {
    //       this.chooseItem.sort((a, b) => {
    //         return parseInt(b.prodPrice) - parseInt(a.prodPrice);
    //       });
    //       this.chooseItem2 = this.chooseItem;
    //       this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //     } else if (this.getPriceOption == "由低到高") {
    //       this.chooseItem.sort((a, b) => {
    //         return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //       });
    //       this.chooseItem2 = this.chooseItem;
    //       this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //     } else if (this.getPriceOption == "") {
    //       this.chooseItem.sort((a, b) => {
    //         return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //       });
    //       this.chooseItem2 = this.chooseItem;
    //       this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //     }
    //   } else {
    //     this.chooseItem = [];
    //     for (let i = 0; i < this.cardsAll.length; i++) {
    //       if (this.cardsAll[i].tag === data) {
    //         this.chooseItem.push(this.cardsAll[i]);
    //         if (this.getPriceOption == "由高到低") {
    //           this.chooseItem.sort((a, b) => {
    //             return parseInt(b.prodPrice) - parseInt(a.prodPrice);
    //           });
    //           this.chooseItem2 = this.chooseItem;
    //           this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //         } else if (this.getPriceOption == "由低到高") {
    //           this.chooseItem.sort((a, b) => {
    //             return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //           });
    //           this.chooseItem2 = this.chooseItem;
    //           this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //         } else if (this.getPriceOption == "") {
    //           this.chooseItem.sort((a, b) => {
    //             return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //           });
    //           this.chooseItem2 = this.chooseItem;
    //           if (this.chooseItem.length >= this.pageSize) {
    //             this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //           }
    //         }
    //       }
    //     }
    //   }
    // },
    // getPrice(data) {
    //   this.getPriceOption = data;
    //   if (!this.selectOption) {
    //     if (data == "由低到高") {
    //       this.cardsAll.sort((a, b) => {
    //         return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //       });
    //       this.chooseItem = this.cardsAll.slice(0, this.pageSize);
    //     } else if (data == "由高到低") {
    //       this.cardsAll.sort((a, b) => {
    //         return parseInt(b.prodPrice) - parseInt(a.prodPrice);
    //       });
    //       this.chooseItem = this.cardsAll.slice(0, this.pageSize);
    //     }
    //   } else if (this.selectOption == "所有商品") {
    //     this.chooseItem2 = this.cardsAll;
    //     this.chooseItem2.sort((a, b) => {
    //       return parseInt(b.prodPrice) - parseInt(a.prodPrice);
    //     });
    //     this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //   } else if (this.selectOption !== "所有商品") {
    //     this.chooseItem2 = [];
    //     for (let i = 0; i < this.cardsAll.length; i++) {
    //       if (this.cardsAll[i].tag === this.selectOption) {
    //         this.chooseItem2.push(this.cardsAll[i]);
    //       }
    //     }
    //     if (data == "由高到低") {
    //       this.chooseItem2.sort((a, b) => {
    //         return parseInt(b.prodPrice) - parseInt(a.prodPrice);
    //       });
    //       this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //     } else if (data == "由低到高") {
    //       this.chooseItem2.sort((a, b) => {
    //         return parseInt(a.prodPrice) - parseInt(b.prodPrice);
    //       });
    //       this.chooseItem = this.chooseItem2.slice(0, this.pageSize);
    //     }
    //   }
    // },
    getClass(data) {
      this.selectOption = data;
      if (data === "所有商品") {
        this.chooseItem2 = this.cardsAll;
      } else {
        this.chooseItem2 = this.cardsAll.filter(
          (item) => item.prod_category === data
        );
      }
      this.showPage = false;
      setTimeout(() => {
        this.showPage = true;
      }, 100);
      this.getPage = 1;
      this.getPrice(this.getPriceOption);
      this.updatePage(1);
    },
    getPrice(data) {
      this.getPriceOption = data;
      if (data === "由低到高") {
        this.chooseItem2.sort(
          (a, b) => parseInt(a.prod_price) - parseInt(b.prod_price)
        );
        this.currentPage = 1;
      } else if (data === "由高到低") {
        this.chooseItem2.sort(
          (a, b) => parseInt(b.prod_price) - parseInt(a.prod_price)
        );
        this.getPage = 1;
      }
      this.showPage = false;
      setTimeout(() => {
        this.showPage = true;
      }, 100);
      this.updatePage(1);
    },

    searchClick(data) {
      const searchInput = data.toUpperCase();
      const res = this.cardsAll.filter((i) => {
        const search_content = i.prod_name.toUpperCase();
        return search_content.includes(searchInput);
      });
      this.chooseItem2 = res;
      this.updatePage(1);
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
    changeHeart(isFav, i, index) {
      const mountedShowLoveIndex = this.mountedShowLove.findIndex(
        (v) => v == i.prod_id
      );

      if (mountedShowLoveIndex > -1) {
        this.mountedShowLove.splice(mountedShowLoveIndex, 1);

        let formData = new FormData();
        let prod_id = i.prod_id;
        formData.append("mem_id", this.$store.state.memberId);
        formData.append("prod_id", prod_id);
        fetch(`${this.$store.state.APIurl}prod_cardFavDelete.php`, {
          method: "POST",

          body: formData,
        });
      } else {
        this.mountedShowLove.push(i.prod_id);
        this.$store.state.favoList.push({
          favoImg: i.prod_img,
          favoName: i.prod_name,
          favoPrice: i.prod_price,
          favoIntroduction: i.prod_info,
          favIndex: index,
        });
        let formData = new FormData();
        let prod_id = i.prod_id;
        formData.append("mem_id", this.$store.state.memberId);
        formData.append("prod_id", prod_id);
        fetch(`${this.$store.state.APIurl}prod_cardFavInsert.php`, {
          method: "POST",

          body: formData,
        });
      }
    },
    // changeHeart(isFav, i, index) {
    //   console.log(isFav, i, index);

    //   const favListIndex = this.favList.findIndex(
    //     (v) => v.favoName === i.prod_name
    //   );

    //   if (favListIndex > -1) {
    //     this.$store.state.favoList.splice(favListIndex, 1);
    //     this.mountedShowLove();
    //     let formData = new FormData();
    //     let prod_id = i.prod_id;
    //     formData.append("mem_id", this.$store.state.memberId);
    //     formData.append("prod_id", prod_id);
    //     fetch(`${this.$store.state.APIurl}prod_cardFavDelete.php`, {
    //       method: "POST",

    //       body: formData,
    //     });
    //   } else {
    //     this.$store.state.favoList.push({
    //       favoImg: i.prod_img,
    //       favoName: i.prod_name,
    //       favoPrice: i.prod_price,
    //       favoIntroduction: i.prod_info,
    //       favIndex: index,
    //     });
    //     let formData = new FormData();
    //     let prod_id = i.prod_id;
    //     formData.append("mem_id", this.$store.state.memberId);
    //     formData.append("prod_id", prod_id);
    //     fetch(`${this.$store.state.APIurl}prod_cardFavInsert.php`, {
    //       method: "POST",

    //       body: formData,
    //     });
    //     // this.$store.state.memberId
    //   }
    // },
    closeCartPopup() {
      // 延迟一秒后关闭购物车弹出视图
      setTimeout(() => {
        this.toggleCartPopup();
      }, 500); // 500毫秒（1秒）后关闭
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
    ...mapMutations(["toggleCartPopup"]),
    pushAndTogglePopup(prod_img, prod_name, count, prod_price) {
      // 添加商品到购物车
      this.pushInShoppingCart(prod_img, prod_name, count, prod_price);

      // 切换购物车弹出视图的显示状态
      if (this.$store.state.userName) {
        this.toggleCartPopup();
        this.closeCartPopup();
      }
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
    padding: 0 15px;
    z-index: 2;
  }

  .pic {
    width: 270px;
    height: 270px;
    overflow: hidden;
    margin-bottom: 10px;
    box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.2);
  }

  .pic img {
    width: 100%;
    height: 100%;
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
    padding: 0 10px;
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
    padding: 0 10px;
    display: flex;
    justify-content: space-between;
  }

  .prod_btn {
    display: flex;

    .num input {
      width: 27px;
      border: 0;
      text-align: center;
      background-color: #9fbdce;
      font-size: 15px;
      outline: none;
    }

    .num input:first-child {
      border-radius: 15px 0 0 15px;
      cursor: pointer;
    }

    .num input:last-child {
      border-radius: 0 15px 15px 0;
      cursor: pointer;
    }
  }

  .buy {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;

    i {
      font-size: 17px;
    }

    .fa-cart-shopping {
      width: 12px;
    }

    :hover .fa-plus {
      display: none;
    }

    :hover .fa-cart-shopping {
      display: inline-block;
    }

    :hover {
      background-color: #eee;
    }
  }

  .name a:hover {
    color: map-get($colors, hoverColor);
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
  margin-bottom: 20px;
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6); // 彈窗背景亮度
  z-index: 10;
  justify-content: center;
  align-items: center;

  .shadow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: -1;
    /* 在蓋板下面 */
  }

  .modal-content {
    width: 1000px;
    height: 400px;
    margin: 0 auto;
    border: 0;
    border-radius: 5px;
    text-align: center;
    background-color: rgba(40, 61, 84, 0.8);
    padding: 20px;
    position: relative;
    top: 100px;
    display: flex;
    align-items: center;
  }

  .close {
    width: 45px;
    height: 45px;
    background-color: #93b7cd;
    border-radius: 50%;
    text-align: center;
    cursor: pointer;
    position: absolute;
    top: -20px;
    right: -20px;

    i {
      line-height: 45px;
      font-size: 30px;
    }
  }

  .prod-content {
    width: 90%;
    height: 90%;
    margin: 0 auto;
    // border: 1px solid #333;
    border-radius: 15px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
  }

  .prod-img {
    margin-right: 50px;
    width: 40%;
    height: 80%;

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border: 0;
      border-radius: 15px;
    }
  }

  .prod-info {
    width: 50%;
    height: 80%;
    text-align: justify;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-direction: column;

    h5 {
      color: map-get($colors, "light");
    }

    p {
      color: map-get($colors, "light");
      font-size: map-get($fontSizes, "p");
    }

    > p {
      margin-top: 30px;
      line-height: 30px;
    }
  }
}

// 彈窗顯示與隱藏延遲動畫效果
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

@media screen and (max-width: 768px) {
  .select_btn {
    width: 100%;
    justify-content: center;
  }

  .card {
    width: 40%;
    margin: 0 30px 50px;

    .heart {
      margin: 0 30px -50px auto;
    }
  }

  .modal {
    .modal-content {
      width: 700px;
      top: 60px;
    }
  }

  .changepage {
    width: 100%;
  }
}

@media screen and (max-width: 414px) {
  .card {
    margin: 0 15px 50px;

    .pic {
      width: 160px;
      height: 160px;
    }

    .prod_btn {
      display: none;
    }

    .heart {
      margin: 0 0 -50px auto;
    }
  }

  .modal {
    .modal-content {
      width: 80%;
      top: 60px;
      padding: 0;
    }

    .prod-content {
      flex-direction: column;
    }

    .prod-img {
      height: 180px;
      width: 180px;
      margin: 0;
    }

    .prod-info {
      width: 80%;
      margin-top: 10px;

      > p {
        margin-top: 10px;
        line-height: 30px;
      }
    }
  }

  .changepage {
    width: 100%;
  }
}
</style>
