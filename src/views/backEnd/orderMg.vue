<template>
  <Tabs value="name1">
    <TabPane label="購物訂單" name="name1">
      <div class="titleAll">
        <select name="" id="">
          <option value="">訂單編號</option>
          <option value="">會員帳號</option>
        </select>
        <input type="text" placeholder="請輸入訂單編號" />
        <div>搜尋</div>
      </div>
      <div class="orderTableAll">
        <div class="tableTitleAll">
          <div>訂單編號</div>
          <div>會員帳號</div>
          <div>商品名稱</div>
          <div>數量</div>
          <div>時間</div>
          <div>狀態</div>
        </div>
        <div v-for="i in prodOrder" class="singleOrderTable">
          <div>{{ i.orderNumber }}</div>
          <div></div>
          <div>{{ i.memberAccount }}</div>
          <div>
            <div v-for="j in i.prodName">{{ j }}</div>
          </div>

          <div>{{ i.prodCount }}</div>
          <div>{{ i.orderTime }}</div>
          <div>{{ i.orderState }}</div>

          <div class="updateOrderBtn">
            <div class="update" @click="updateOrder(index, $event, i)">
              <button>修改</button>
            </div>
          </div>
        </div>
      </div>
    </TabPane>
    <TabPane label="票卷訂單" name="name2">
      <div class="titleAll">
        <select name="" id="">
          <option value="">訂單編號</option>
          <option value="">會員姓名</option>
        </select>
        <input type="text" placeholder="請輸入訂單編號" />
        <div>搜尋</div>
      </div>
      <div class="ticketTableAll">
        <div class="ticketTableTitleAll">
          <div>訂單編號</div>
          <div>會員帳號</div>
          <div>票種</div>
          <div>數量</div>
          <div>票卷日期</div>
        </div>
        <div
          v-for="(i, index) in ticketOrder"
          class="singleTicketBar"
          :key="index"
        >
          <div>{{ i.tic_id }}</div>
          <div>{{ i.mem_email }}</div>
          <div>
            <!-- <div v-for="j in i.ticketType">{{ j }}</div> -->
            {{
              i.tic_pay == 150
                ? "老年票"
                : i.tic_pay == 250
                ? "兒童票"
                : i.tic_pay == 400
                ? "學生票"
                : (i.tic_pay = 500 ? "成人票" : "其他")
            }}
          </div>
          <div>
            <!-- <div v-for="j in i.ticketCount">{{ j }}</div> -->
            {{ i.tic_pay }}
          </div>
          <div>{{ i.tic_date }}</div>
          <button>詳細資料</button>
        </div>
      </div>
    </TabPane>
  </Tabs>
</template>
<script>
export default {
  name: "orderMg",
  data() {
    return {
      prodOrder: [
        {
          orderNumber: "abc12345",
          memberAccount: "asv3567878",
          prodName: ["海豚抱枕"],
          prodCount: 1,
          orderTime: "2023.08.31",
          orderState: "問題訂單",
        },
        {
          orderNumber: "abc12345",
          memberAccount: "asv3567878",
          prodName: ["海豚抱枕"],
          prodCount: 1,
          orderTime: "2023.08.31",
          orderState: "確認訂單",
        },
        {
          orderNumber: "abc12345",
          memberAccount: "asv3567878",
          prodName: ["海豚抱枕", "海星吊飾", "海星吊飾"],
          prodCount: 1,
          orderTime: "2023.08.31",
          orderState: "問題訂單",
        },
      ],
      ticketOrder: [
        // {
        //   orderNumber: "a123456",
        //   memberAccount: "asv3567878",
        //   ticketType: ["成人票"],
        //   ticketCount: [1],
        //   ticketDate: "2023.08.31",
        // },
        // {
        //   orderNumber: "a123456",
        //   memberAccount: "asv3567878",
        //   ticketType: ["學生票", "兒童票", "成人票"],
        //   ticketCount: [2, 1, 3],
        //   ticketDate: "2023.08.31",
        // },
        // {
        //   orderNumber: "a123456",
        //   memberAccount: "asv3567878",
        //   ticketType: ["成人票"],
        //   ticketCount: [1],
        //   ticketDate: "2023.08.31",
        // },
      ],
      orderAll: [],
      ticorderAll: [],
    };
  },
  computed: {},
  mounted() {
    fetch("http://localhost/dida_project/public/php/tickOrderMg.php") //第一步
      // fetch(`${this.$store.state.APIurl}orderMg.php`)
      //this.$store.state.APIurl
      // axios
      .then(function (response) {
        //第二步
        //要先傳回來編譯成json檔
        return response.json();
      })

      .then((myJson) => {
        this.ticketOrder = myJson;
      });
  },

  methods: {
    updateOrder(index, e, i) {
      if (e.target.innerText == "確認") {
        this.orderAll[index].dis = true;
        e.target.innerText = "修改";

        const formData = new FormData();
        let ord_id = i.ord_id;
        let ord_date = this.orderAll[index].ord_date;
        let ord_sum = this.orderAll[index].ord_sum;
        let ord_ship = this.orderAll[index].ord_ship;
        let ord_pay = this.orderAll[index].ord_pay;
        let ord_person = this.orderAll[index].ord_person;
        let ord_phone = this.orderAll[index].ord_phone;
        let ord_add = this.orderAll[index].ord_add;
        let ord_state = this.orderAll[index].ord_state;
        let ord_redeem = this.orderAll[index].ord_redeem;

        formData.append("ord_id", ord_id);
        formData.append("ord_date", ord_date);
        formData.append("ord_sum", ord_sum);
        formData.append(" ord_ship ", ord_ship);
        formData.append("ord_pay", ord_pay);
        formData.append("ord_person ", ord_person);
        formData.append("ord_phone", ord_phone);
        formData.append("ord_add", ord_add);
        formData.append("ord_state", ord_state);
        formData.append("ord_redeem", ord_redeem);
        fetch("http://localhost/dida_project/public/php/orderMg.php", {
          method: "post",
          body: formData,
        }).then((res) => res.json());
        return;
      }
      this.orderAll[index].dis = false;
      e.target.innerText = "確認";
    },
  },
};
</script>
<style lang="scss" scoped>
.titleAll {
  display: flex;
  select {
    margin-right: 15px;
  }
  input {
    margin-right: 15px;
  }
  div {
    border: 1px black solid;
    padding: 3px 10px;
    border-radius: 5px;
    cursor: pointer;
  }
}
.ticketTableAll {
  .ticketTableTitleAll {
    padding: 10px 0px;
    border-bottom: 1px black solid;
    display: flex;
    justify-content: space-around;
    div {
      flex-grow: 1;
      &:last-child {
        flex-grow: 2;
      }
    }
  }
  .singleTicketBar {
    display: flex;
    border-bottom: 1px black solid;
    padding-bottom: 10px;
    align-items: center;
    justify-content: space-around;
  }
}
.orderTableAll {
  .tableTitleAll {
    display: flex;
    justify-content: space-around;
    padding-bottom: 10px;
    border-bottom: 1px black solid;
    padding-top: 10px;
    div {
      flex-grow: 1;
      &:last-child {
        flex-grow: 1.5;
      }
    }
  }
  .singleOrderTable {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 10px 10px 10px 0px;
    border-bottom: 1px black solid;
  }
}
</style>
