<template>
  <div class="tick_order_main">
    <div class="tick_area">
      <div
        class="tick_order_group"
        v-for="(tick, index) in tickOrder"
        :key="tick.tickImg"
        :class="{
          tick_order_group_used:
            this.$store.state.activeIndexes.findIndex(
              (v) => v.tickIdx === index
            ) > -1,
        }"
      >
        <div class="tick_img">
          <img :src="tick.tickImg" alt="" />
        </div>
        <div class="tick_info">
          <div class="item_info tick_item">
            <p>票種</p>
            <p>
              {{
                tick.pay == 150
                  ? "老年票"
                  : tick.pay == 250
                  ? "兒童票"
                  : tick.pay == 400
                  ? "學生票"
                  : (tick.pay = 500 ? "成人票" : "其他")
              }}
            </p>
          </div>
          <div class="item_info tick_count">
            <p>數量</p>
            <!-- <p>{{ tick.tickName }}</p> -->
            <p>1</p>
          </div>
          <div class="item_info tick_date">
            <p>時間</p>
            <p>{{ tick.tic_date }}</p>
          </div>
          <div class="item_info tick_price">
            <p>金額</p>
            <p>NT {{ tick.pay }}</p>
          </div>
          <div>
            <QRCode
              :checkDate="tick.tic_date"
              :ticketIndex="index"
              @click="activateGrayBkc(index)"
              @checkTicket="getCheck"
            ></QRCode>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import memChangePage from "../components/memChangePage.vue";
import QRCode from "../components/QRCode.vue";
export default {
  name: "prodOrderInquiry",
  components: {
    memChangePage,
    QRCode,
  },
  data() {
    return {
      grayBkc: false,
      activeIndexes: [],
      tickOrder: [
        // {
        //     tickImg: require("../assets/images/dolphin_pillow.jpg"),
        //     tickName: "一般全票",
        //     tickCount: "2",
        //     tickDate: "2023.08.31",
        //     tickPrice: "250",
        // },
        // {
        //     tickImg: require("../assets/images/dolphin_pillow.jpg"),
        //     tickName: "一般全票",
        //     tickCount: "2",
        //     tickDate: "2023.08.31",
        //     tickPrice: "250",
        // },
        // {
        //     tickImg: require("../assets/images/dolphin_pillow.jpg"),
        //     tickName: "一般全票",
        //     tickCount: "2",
        //     tickDate: "2023.08.31",
        //     tickPrice: "250",
        // },
        // {
        //     tickImg: require("../assets/images/dolphin_pillow.jpg"),
        //     tickName: "一般全票",
        //     tickCount: "2",
        //     tickDate: "2023.08.31",
        //     tickPrice: "250",
        // },
      ],
    };
  },
  mounted() {
    const formData = new FormData();

    let mem_email = this.$store.state.memberEmail;
    formData.append("mem_email", mem_email);
    fetch(`${this.$store.state.APIurl}tickOrderPrint.php`, {
      method: "post",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        for (let i = 0; i < data.length; i++) {
          data[i].tickImg = require("../../public/all_images/ticket_face.jpg");
        }
        this.tickOrder = data;
      });
    // this.tickOrder = this.$store.state.ticketList;
  },
  computed: {
    activeList(idx) {
      return this.$store.state.activeIndexes[idx];
    },
  },
  methods: {
    getCheck(data, idx) {
      console.log(data, idx);
    },
    isGrayBkcActive(index) {
      return this.activeIndexes.includes(index);
    },
    activateGrayBkc(index) {
      // 将索引添加到activeIndexes中
      if (this.getCheck) {
        // this.activeIndexes.push(index);
        // alert(123);
      }
    },
    getRsp(data) {
      this.grayBkc = data;
    },
  },
};
</script>

<style scoped lang="scss">
.tick_order_main {
  p {
    color: map-get($colors, "dark");
  }

  .tick_area {
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
    overflow-y: auto;

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

    .tick_order_group {
      width: 460px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-evenly;

      // z-index: 2;
    }
    .tick_order_group_used {
      background-color: gray;
      color: rgb(147, 144, 144);
    }
    .tick_order_group:last-child {
      border-bottom: 0;
    }

    .tick_img {
      width: 50%;
      height: 150px;
      margin: 20px auto;
      border: 0;
    }

    .tick_img img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .tick_info {
      width: 50%;
      height: 150px;
      margin: 20px auto;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: flex-start;
    }

    .item_info {
      width: 100%;
      padding: 5px;
      display: flex;
      justify-content: space-evenly;
    }

    .item_info p:first-child {
      width: 30%;
      text-align: center;
      background-color: map-get($colors, "bgc");
    }

    .item_info p:nth-child(2) {
      width: 70%;
      margin-left: 10px;
    }
  }
}

@media screen and (max-width: 414px) {
  .tick_order_main {
    .tick_area {
      width: 330px;
      height: 720px;

      .tick_order_group {
        width: 300px;
      }

      .tick_img {
        width: 50%;
      }

      .tick_info {
        width: 50%;
      }
    }
  }
}
</style>
