<template>
  <div v-if="loading">
    <LoadingBox />
  </div>
  <div v-else>
    <div class="index">
      <!-- banner + open time ------------------------------------------ -->
      <div class="banner">
        <p>
          <blingText></blingText>
        </p>
        <lightCircle>
          <template v-slot:circle>
            <div class="open">
              <span>{{ $t("營業時間") }}</span>
              <span>09:00-17:00</span>
              <svg x="0px" y="0px" width="200px" height="15px" viewBox="0 0 399.6 15.9">
                <polyline class="op_line" points="0.1,5.5 58,15.4 118.4,5.5 189.2,5.5 258.7,10.4 368.3,0.5 399.5,7.9 " />
              </svg>
              <span>{{ $t("最後入場") }}</span>
              <span>16:00</span>
            </div>
          </template>
        </lightCircle>
      </div>

      <!-- 今日入園人數 ------------------------------------------ -->
      <div class="entrance">
        <h3Title>
          <template v-slot:h3>
            <h3>{{ $t("今日入園人數") }}</h3>
          </template>
        </h3Title>
        <div class="drop">
          <div class="wave water"></div>
          <div class="wave water"></div>
        </div>
        <p>35%</p>
        <div class="deco turtle">
          <img src="../../public/all_images/deco/deco_turtle.png" alt="" />
        </div>
        <div class="deco fishes">
          <img src="../../public/all_images/deco/deco_fishes.png" alt="" />
        </div>
      </div>

      <!-- 營業資訊 ------------------------------------------ -->
      <div class="ticket">
        <h3Title>
          <template v-slot:h3>
            <h3>票價資訊</h3>
          </template>
        </h3Title>
        <ticketPrice></ticketPrice>
        <button>立即購票</button>
      </div>

      <!-- 交通指南 ------------------------------------------ -->
      <h3Title>
        <template v-slot:h3>
          <h3>交通指南</h3>
        </template>
      </h3Title>
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14468.996712784081!2d121.2250227!3d24.9576355!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823ea50c732a5%3A0x1b5e6ee66e9fec49!2z57ev6IKyVGliYU1l6ZmE6Kit5Lit5aOi6IG36KiT5Lit5b-D!5e0!3m2!1szh-TW!2stw!4v1690272123794!5m2!1szh-TW!2stw"
          style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div class="text">
          <div class="address">
            <span>地址</span>
            <p>海洋市深海區珊瑚一街404號</p>
          </div>
          <div class="car">
            <span>交通</span>
            <div class="way" v-for="car in car" :key="car">
              <p>{{ car.name }}</p>
              <p>{{ car.content }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- 熱賣商品 ------------------------------------------ -->
      <h3Title>
        <template v-slot:h3>
          <h3>熱賣商品</h3>
        </template>
      </h3Title>
      <div class="product">
        <div class="item" v-for="product in products" :key="product">
          <div class="image">
            <a href="#"><img :src="product.src" alt="product.alt" /></a>
          </div>
          <div class="content">
            <div class="nub">{{ product.nub }}</div>
            <a href="#">
              <h4>{{ product.name }}</h4>
              <div class="text">{{ product.text }}</div>
            </a>
            <span>{{ product.price }}</span>
          </div>
        </div>
        <button>更多商品</button>
      </div>

      <!-- 活動倒數 ------------------------------------------ -->
      <h3Title>
        <template v-slot:h3>
          <h3>活動倒數</h3>
        </template>
      </h3Title>
      <div class="active">
        <div class="card">
          <div class="item">
            <div class="image">
              <img src="../assets/images/openActive.png" alt="" />
            </div>
            <div class="text">
              <span class="date">活動時間 : 5月1日至5月31日</span>
              <p class="title">DIDADIDA水族館開幕慶</p>
              <p class="self">票價限時優惠<span> 10% </span>off</p>
            </div>
          </div>
          <div class="day">
            <span>倒數</span>
            <span>5</span>
            <span>天</span>
          </div>
        </div>
        <div class="card">
          <div class="item">
            <div class="image">
              <img src="../assets/images/blueCloth.png" alt="" />
            </div>
            <div class="text">
              <span class="date">活動時間 : 5月1日至5月31日</span>
              <p class="title">海洋藍慶典</p>
              <p class="self">入場穿藍色系服裝可享半價優惠</p>
            </div>
          </div>
          <div class="day">
            <span>倒數</span>
            <span>9</span>
            <span>天</span>
          </div>
        </div>
      </div>

      <!-- 視覺互動 ------------------------------------------ -->
      <div class="game">
        <visual></visual>
      </div>
    </div>
  </div>
</template>

<script>
import visual from "../components/visualGame.vue";
import LoadingBox from "../components/loading.vue";
import h3Title from "../components/h3TitleComponent.vue";
import lightCircle from "../components/lightCircle.vue";
import blingText from "../components/blingText.vue";
import ticketPrice from "../components/ticketPrice.vue";
export default {
  name: "HomeView",
  data() {
    return {
      resetVisual: false,
      loading: true,
      animationDuration: 4200,
      priceTitle: [{ name: "票種" }, { name: "價格" }, { name: "適用對象" }],
      ticket: [
        { name: "一般票", price: "NT 500", object: "限18歲(含)以上成人使用" },
        {
          name: "學生票",
          price: "NT 300",
          object: "限12歲(含)以上持學生證之學生適用",
        },
        {
          name: "孩童票",
          price: "NT 200",
          object: "限4歲(含)以上及未滿12歲兒童適用",
        },
        {
          name: "優待票",
          price: "NT 200",
          object:
            "限持有身心障礙證明者、身心障礙者的1位陪同者、孕婦、滿65歲以上長者適用",
        },
        { name: "團體票", price: "NT 350", object: "15名以上適用" },
      ],
      products: [
        {
          src: require("../assets/images/index_p1.png"),
          alt: "index_image1",
          nub: "01",
          name: "海豚娃娃",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 500",
        },
        {
          src: require("../assets/images/index_p2.png"),
          alt: "index_image2",
          nub: "02",
          name: "海豚抱枕",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 300",
        },
        {
          src: require("../assets/images/index_p3.png"),
          alt: "index_image3",
          nub: "03",
          name: "人魚吊飾",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 200",
        },
      ],
      car: [
        {
          name: "自行開車",
          content: "請於國道10號，海洋交流道下，左轉直行珊瑚一街",
        },
        { name: "搭乘公車", content: "請於海洋市區，搭乘海洋路線777公車" },
        {
          name: "搭乘捷運",
          content: "請搭乘海洋線，於滴答滴答站下車，2號出口",
        },
      ],
    };
  },
  methods: {},
  components: {
    visual,
    LoadingBox: LoadingBox,
    h3Title,
    lightCircle,
    blingText,
    ticketPrice,
  },
  mounted() {
    setTimeout(() => {
      this.loading = false;
    }, this.animationDuration);
    setTimeout(() => {
      this.resetVisual = true;
    }, this.animationDuration + 300);
  },
};
</script>

<style lang="scss">
.index {
  background-color: map-get($colors, "bgc");
  width: 100%;

  h3 {
    @include h3Title();
  }

  button {
    display: block;
    margin: 50px auto;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: none;
    color: map-get($colors, "maincolor");
    font-size: 18px;
    background-color: map-get($colors, "h2Blue");
    cursor: pointer;

    box-shadow: 0 0 0 0 rgba(map-get($colors, "h2Blue"), 0.5);
    -webkit-animation: pulse 1.5s infinite;
  }

  @keyframes pulse {
    0% {
      transform: scale(0.9);
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 30px rgba(map-get($colors, "h2Blue"), 0);
    }

    100% {
      transform: scale(0.9);
      box-shadow: 0 0 0 0 rgba(map-get($colors, "h2Blue"), 0);
    }
  }

  button:hover {
    animation: none;
    box-shadow: inset 0 0 20px map-get($colors, "h2Blue");
  }

  // banner ---------------------------------------------
  .banner {
    background-image: url(../../public/all_images/banner/index.png);
    width: 100%;
    height: 90vh;
    background-size: cover;
    background-position: center;

    p {
      font-size: 50px;
      color: map-get($colors, "light");
      text-align: center;
      line-height: 80vh;
    }

    // 營業時間 ---------------------------------------------
    .open {
      width: 250px;
      height: 250px;
      border-radius: 50%;
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      z-index: 3;

      svg polyline {
        fill: none;
      }

      .op_line {
        stroke: #9fbdce;
        stroke-width: 3;
        stroke-linecap: round;
        stroke-dasharray: 10, 15;
        stroke-dashoffset: 3;
      }

      span {
        display: block;
        color: map-get($colors, "light");
        font-size: 27px;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
      }
    }
  }

  // 今日入園人數 ---------------------------------------------
  .entrance {
    max-width: 1200px;
    width: 100%;
    margin: 50px auto;
    position: relative;

    h3 {
      width: 150px;
      margin: -30px auto 0;
    }

    .drop {
      margin: 80px auto;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      border: 10px solid #68769a;
      border-top-right-radius: 0;
      transform: rotate(-45deg);

      position: relative;
      overflow: hidden;

      .wave {
        transform: rotate(45deg);
        position: absolute;
        bottom: 0px;
        left: 0;
        right: 0;
        width: 100%;
        height: 100px;
        background: url(../../public/all_images/wave.png);
        background-size: 500px 100px;
      }

      .wave.water {
        animation: wave 9s linear infinite;
        animation-delay: 0s;
        margin: 0 -55px;
        opacity: 1;
      }

      .wave.water:nth-child(2) {
        animation: wave 9s linear infinite;
        opacity: 0.6;
        animation-delay: -3s;
        bottom: 12px;
      }

      @keyframes wave {
        0% {
          background-position-x: 0;
        }

        100% {
          background-position-x: 1000px;
        }
      }
    }

    p {
      position: absolute;
      text-align: center;
      font-size: 75px;
      font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
      top: 50%;
      left: 0;
      right: 0;
    }

    .deco {
      position: absolute;
      opacity: 0.5;
    }

    .deco.turtle {
      bottom: -140px;
      left: 10px;
    }

    .deco.fishes {
      bottom: -80px;
      right: -30px;
    }
  }

  // 票價資訊 ---------------------------------------------
  .ticket {
    max-width: 1200px;
    width: 100%;
    margin: 30px auto 100px;

    table {
      margin: auto;
      font-size: 16px;
      border-radius: 5px;
      background-color: map-get($colors, "secondary");
      color: map-get($colors, "light");

      tr:nth-child(2n) {
        background-color: map-get($colors, "light");
        color: map-get($colors, "dark");
      }

      td,
      th {
        padding: 15px 30px;
        text-align: left;
      }
    }
  }

  // 交通指南 ---------------------------------------------
  .map {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto 100px;
    display: flex;

    iframe {
      width: 60%;
      height: 350px;
      margin-right: 30px;
    }

    .text {
      width: 40%;

      span {
        font-weight: 800;
        display: block;
        background-color: map-get($colors, "secondary");
        color: #eee;
        border-radius: 3px;
        padding: 5px 10px;
        margin: 10px 0;
      }

      .way {
        margin: 20px 0;
      }

      .way p:first-child {
        font-weight: 800;
        border-bottom: 3px solid map-get($colors, "h2Blue");
        width: 60px;
        margin-bottom: 5px;
      }

      .way p:last-child {
        margin-bottom: 20px;
      }
    }
  }

  // 熱銷商品 ---------------------------------------------
  .product {
    max-width: 960px;
    width: 100%;
    margin: 0 auto 100px;

    .item:nth-child(2) {
      flex-direction: row-reverse;
      text-align: right;
    }

    .item:nth-child(2) .nub {
      margin-left: auto;
    }

    .item {
      margin: auto;
      display: flex;
      color: map-get($colors, "mainColor");

      .image {
        margin: 0 50px;
      }

      .image img {
        vertical-align: top;
        width: 100%;
      }

      .content {
        margin: auto 0;

        .nub {
          border-bottom: 1px solid map-get($colors, "mainColor");
          font-size: 50px;
          line-height: 1.2;
          width: 50px;
        }

        a {
          color: map-get($colors, "mainColor");
          transition: 0.3s;

          h4 {
            font-size: 20px;
            padding-top: 15px;
          }
        }

        a:hover {
          color: map-get($colors, "hoverColor");
          transition: 0.3s;
        }

        span {
          font-size: 18px;
          line-height: 4;
        }
      }
    }
  }

  // 活動倒數 ---------------------------------------------
  .active {
    max-width: 1200px;
    width: 100%;
    margin: 20px auto 100px;

    .item {
      width: 100%;
      height: 230px;
      display: flex;
      background-color: map-get($colors, "secondary");
      border-radius: 10px;
      overflow: hidden;

      .image {
        width: 50%;
      }

      .image img {
        width: 100%;
        vertical-align: top;
      }

      .text {
        margin: auto;
        color: map-get($colors, "light");
        text-align: center;

        .date {
          display: block;
          padding-bottom: 25px;
          color: map-get($colors, "mainColor");
        }

        .title {
          font-size: 35px;
        }

        .self {
          font-size: 18px;

          span {
            font-size: 35px;
          }
        }
      }
    }

    .card {
      position: relative;
      margin-bottom: 70px;
    }

    .day {
      position: absolute;
      top: -25px;
      right: -20px;
      width: 110px;
      height: 110px;
      text-align: center;
      background-color: map-get($colors, "light");
      border-radius: 50%;
      padding: 17px 0;

      span {
        line-height: 0.9;
      }
    }

    .day>span:first-child {
      display: block;
    }

    .day>span:nth-child(2) {
      font-size: 80px;
      font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    }
  }

  // -- RWD --------------------------------------
  @media screen and (max-width:768px) {}

}
</style>
