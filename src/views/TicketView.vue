<template>
  <!-- 營業資訊 ------------------------------------------ -->
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
  <!-- ------------------------------------------------- -->
  <div class="ticketing">
    <h3Title>
      <template v-slot:h3>
        <h3>選擇日期與票數</h3>
      </template>
    </h3Title>
    <div class="choice_area">
      <div>
        <h1>選擇日期</h1>
        <VCalendar class="calendar" />
      </div>
      <div>

      </div>
    </div>
  </div>
</template>
<script>
import h3Title from "../components/h3TitleComponent.vue";
export default {
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
    }
  },
  components: {
    h3Title,
  }
}
</script>
<style lang="scss">
h3 {
  @include h3Title();
}

/* 票價資訊 --------------------------------------------- */
.ticket {
  max-width: 1200px;
  width: 100%;
  margin: 30px auto 100px;

  table {
    margin: auto;
    font-size: 16px;
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

.ticketing {
  h3 {
    width: 175px;
  }
}

.ticketing {
  width: 1280px;
  height: 700px;
  margin: 0 auto;
  border: 1px solid #333;

  .choice_area {
    width: 1200px;
    height: 550px;
    margin: 0 auto;
    border: 1px solid #333;
    .calendar {
      width: 550px;
      height: 450px;
      .vc-weekdays, .vc-week{
        margin: 30px;
      }

    }
  }
}</style>
