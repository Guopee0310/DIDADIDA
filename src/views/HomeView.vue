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
      <p>DIDA DIDA海洋公園</p>
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
        <div class="wave water"></div>
      </div>
      <p>75%</p>
    </div>

    <!-- 營業資訊 -->
    <div class="ticket">
      <!-- <h3>營業資訊</h3> -->
      <h3Title>
        <template v-slot:h3>
          <h3>營業資訊</h3>
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
    <div class="map">
      <!-- <h3>交通指南</h3> -->
      <h3Title>
        <template v-slot:h3>
          <h3>交通指南</h3>
        </template>
      </h3Title>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14468.996712784081!2d121.2250227!3d24.9576355!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823ea50c732a5%3A0x1b5e6ee66e9fec49!2z57ev6IKyVGliYU1l6ZmE6Kit5Lit5aOi6IG36KiT5Lit5b-D!5e0!3m2!1szh-TW!2stw!4v1690272123794!5m2!1szh-TW!2stw"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      >
      </iframe>
      <div class="text"></div>
    </div>

    <div class="product">
      <!-- <h3>熱賣商品</h3> -->
      <h3Title>
        <template v-slot:h3>
          <h3>熱賣商品</h3>
        </template>
      </h3Title>
      <div class="image">
        <img src="" alt="" />
      </div>
      <div class="item" v-for="product in product">
        <div class="nmb">{{ product.nmb }}</div>
        <h4>{{ product.name }}</h4>
        <div class="text">{{ product.text }}</div>
        <span>{{ product.price }}</span>
      </div>
    </div>

    <div class="active">
      <h3>活動倒數</h3>
      <!-- <h3Title>
        <template v-slot:h3>
          <h3>活動倒數</h3>
        </template>
      </h3Title> -->
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
          nmb: "01",
          name: "海豚娃娃",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 500",
        },
        {
          nmb: "02",
          name: "海豚抱枕",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 300",
        },
        {
          nmb: "03",
          name: "人魚吊飾",
          text: "由DIDADIDA深海區最有名的傑尼海龜為造型。",
          price: "NT 200",
        },
      ],
    };
  },
  methods: {
    fetchProd() {
      fetch("https://fakestoreapi.com/products")
        .then((res) => res.json())
        // .then(json => {
        //   this.loading = false
        // })
        .catch((error) => {
          console.error(error);
          this.loading = false;
        });
    },
  },
  components: {
    visual,
    LoadingBox: LoadingBox,
    h3Title,
    lightCircle,
  },
  mounted() {
    this.fetchProd();
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

  // h3 {
  //   width: 100px;
  //   margin: 30px auto;
  //   font-size: 25px;
  //   border-bottom: 3.5px solid #9fbdce;
  // }

  // h3::after {
  //   content: "";
  //   border: 2px solid #9fbdce;
  //   display: block;
  //   margin: 0 0 6px;
  // }
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

    // open time
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

    // .open::after {
    //   content: '';
    //   position: absolute;
    //   width: 250px;
    //   height: 250px;
    //   background-color: #9fbdce;
    //   border-radius: 50%;
    //   top: 10px;
    //   right: -10px;
    // }
  }

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
  }

  .ticket {
    // border: 1px solid red;
    width: 1200px;
    margin: auto;

    table {
      margin: 0 10px;
      font-size: 16px;
      border: 1px solid #68769a;
      border-radius: 5px;
      background-color: #68769a;
      color: #eee;

      tr:nth-child(2n) {
        background-color: #dbdbe5;
        color: #333;
      }

      td,
      th {
        padding: 10px 30px;
        text-align: left;
      }
    }
  }
}
</style>
