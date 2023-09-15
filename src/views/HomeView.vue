<template>
  <!-- <div v-if="loading">
    <LoadingBox />
  </div> -->
  <!-- <div v-else>
    <visual v-if="!loading" />
  </div> -->

  <div class="index">
    <!-- banner + open time -->
    <div class="banner">
      <p><blingText></blingText></p>

      <lightCircle>
        <template v-slot:circle>
          <div class="open">
            <span>營業時間</span>
            <span>09:00-17:00</span>
            <svg
              x="0px"
              y="0px"
              width="200px"
              height="15px"
              viewBox="0 0 399.6 15.9"
            >
              <polyline
                class="op_line"
                points="0.1,5.5 58,15.4 118.4,5.5 189.2,5.5 258.7,10.4 368.3,0.5 399.5,7.9 "
              />
            </svg>
            <span>最後入場</span>
            <span>16:00</span>
          </div>
        </template>
      </lightCircle>
    </div>

    <!-- 今日入園人數 -->
    <div class="entrance">
      <!-- <h3>今日入園人數</h3> -->
      <h3Title>
        <template v-slot:h3>
          <h3>今日入園人數</h3>
        </template>
      </h3Title>
      <div class="drop">
        <div class="wave water"></div>
        <div class="wave water"></div>
      </div>
      <p>35%</p>
      <div class="deco turtle">
        <img src="../../public/all_images/deco/deco_turtle.png" alt="">
      </div>
      <div class="deco fishes">
        <img src="../../public/all_images/deco/deco_fishes.png" alt="">
      </div>
    </div>

    <!-- 營業資訊 -->
    <div class="ticket">
      <h3Title>
        <template v-slot:h3>
          <h3>票價資訊</h3>
        </template>
      </h3Title>
      <table>
        <tr>
          <th v-for="title in priceTitle">{{ title.name }}</th>
        </tr>
        <tr v-for="ticket in ticket">
          <td>{{ ticket.name }}</td>
          <td>{{ ticket.price }}</td>
          <td>{{ ticket.object }}</td>
        </tr>
      </table>
    </div>

    <!-- 交通指南 -->
    <h3Title>
      <template v-slot:h3>
        <h3>交通指南</h3>
      </template>
    </h3Title>
    <div class="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14468.996712784081!2d121.2250227!3d24.9576355!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823ea50c732a5%3A0x1b5e6ee66e9fec49!2z57ev6IKyVGliYU1l6ZmE6Kit5Lit5aOi6IG36KiT5Lit5b-D!5e0!3m2!1szh-TW!2stw!4v1690272123794!5m2!1szh-TW!2stw"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      >
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

    <!-- 熱賣商品 -->
    <div class="product">
      <h3Title>
        <template v-slot:h3>
          <h3>熱賣商品</h3>
        </template>
      </h3Title>
      <div class="item" v-for="product in product" :key="product">
        <div class="image">
          <img :src="product.image" alt="" />
        </div>
        <div class="content">
          <div class="nmb">{{ product.nmb }}</div>
          <h4>{{ product.name }}</h4>
          <div class="text">{{ product.text }}</div>
          <span>{{ product.price }}</span>
        </div>
      </div>
    </div>

    <div class="active">
      <h3Title>
        <template v-slot:h3>
          <h3>活動倒數</h3>
        </template>
      </h3Title>
    </div>

    <!-- game -->
    <div>
      <visual></visual>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import visual from "../components/visualGame.vue";
import LoadingBox from "../components/loading.vue";
import h3Title from "../components/h3TitleComponent.vue";
import lightCircle from "../components/lightCircle.vue";
import blingText from "../components/blingText.vue";
export default {
  name: "HomeView",
  data() {
    return {
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
        { name: "※未滿4歲且有家長陪同的幼童可免費入場" },
      ],
      product: [
        {
          image: "../../public/all_images/product/index_p1.png",
          nmb: "01",
          name: "海豚娃娃",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 500",
        },
        {
          image: "../../public/all_images/product/index_p2.png",
          nmb: "02",
          name: "海豚抱枕",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 300",
        },
        {
          image: "../../public/all_images/product/index_p3.png",
          nmb: "03",
          name: "人魚吊飾",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 200",
        },
      ],
      car: [
        { name: '自行開車', content: '請於國道10號，海洋交流道下，左轉直行珊瑚一街' },
        { name: '搭乘公車', content: '請於海洋市區，搭乘海洋路線777公車' },
        { name: '搭乘捷運', content: '請搭乘海洋線，於滴答滴答站下車，2號出口' },
      ],
    };
  },
  methods: {

  },
  components: {
    visual,
    LoadingBox: LoadingBox,
    h3Title,
    lightCircle,
    blingText,
  },
  mounted() {
    setTimeout(() => {
      this.loading = false;
    }, this.animationDuration);
  },
};
</script>

<style lang="scss">
.index {
  width: 100%;
  background-color: #dbdbe5;

  h3 {
    @include h3Title();
  }

  // banner
  .banner {
    background-image: url(../../public/all_images/banner/index.png);
    width: 100%;
    height: 90vh;
    background-size: cover;
    background-position: center;

    p {
      font-size: 50px;
      color: #eee;
      text-align: center;
      line-height: 80vh;
    }

    // 營業時間
    .open {
      // background-color: #232d47;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      // margin: -150px 70px;
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
        color: #eee;
        font-size: 27px;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
      }
    }
  }

  // 今日入園人數
  .entrance {
    width: 1200px;
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
      border: 10px solid #57a3f3;
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

  // 票價資訊
  .ticket {
    // border: 1px solid red;
    width: 1200px;
    margin: auto;

    table {
      margin: 0 auto 100px;
      font-size: 16px;
      // border: 1px solid #68769a;
      border-radius: 5px;
      background-color: #68769a;
      color: #eee;

      tr:nth-child(2n) {
        background-color: #eee;
        color: #333;
      }

      td,
      th {
        padding: 15px 30px;
        text-align: left;
      }
    }
  }

  // 交通指南
  .map {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto 90px;
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
        background-color: #68769a;
        color: #eee;
        border-radius: 3px;
        padding: 5px 10px;
        margin: 10px 0;
      }

      .way {
        margin: 20px 0;
      }

      .way p:first-child {
        // font-size: 15px;
        font-weight: 800;
        border-bottom: 3px solid #9fbdce;
        width: 60px;
        margin-bottom: 5px;
      }

      .way p:last-child {
        margin-bottom: 20px;
      }
    }
  }

  // 熱銷商品
  .item {
    max-width: 960px;
    width: 100%;
    margin: auto;
    display: flex;

    .image {}

    .image img {
      vertical-align: top;
    }

    .nmb {
      border-bottom: 1px solid #68769a;
      font-size: 50px;
      width: 100px;
    }

    h4 {}

    span {}


  }
}
</style>
