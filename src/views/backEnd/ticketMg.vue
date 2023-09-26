<template>
  <Tabs value="name1">
    <TabPane label="票種 / 票價管理" name="name1">
      <button class="add">+ 新增項目</button>
      <ul>
        <li>
          <p calss="tickettype">票種</p>
          <p>價格</p>
          <p>條件</p>
        </li>
        <li>
          <p class="tickettype">一般票</p>
          <p>NT 500</p>
          <p>限18歲(含)以上成人使用</p>
          <button>修改</button>
        </li>
        <li>
          <p class="tickettype">學生票</p>
          <p>NT 300</p>
          <p>限12歲(含)以上持學生證之學生適用</p>
          <button>修改</button>
        </li>
        <li>
          <p class="tickettype">孩童票</p>
          <p>NT 200</p>
          <p>限4歲(含)以上及未滿12歲兒童適用</p>
          <button>修改</button>
        </li>
        <li>
          <p class="tickettype">優待票</p>
          <p>NT 200</p>
          <p>
            限持有身心障礙證明者、身心障礙者的1位陪同者、孕婦、滿65歲以上長者適用
          </p>
          <button>修改</button>
        </li>
        <li>
          <p class="tickettype">團體票</p>
          <p>NT 350</p>
          <p>
            限持有身心障礙證明者、身心障礙者的1位陪同者、孕婦、滿65歲以上長者適用
          </p>
          <button>修改</button>
        </li>
      </ul>
    </TabPane>
      
  </Tabs>
  <Tabs value="name2">
 <TabPane label="不開放時間管理" name="name2"> 
      

  <p>選擇日期</p>
  <div class="dateTextAll">
  <div class="dateAll">
    <div class="calendar">
      <VDatePicker
        v-model="date"
        borderless
        expanded
        :min-date="new Date()"
        locale="tw"
        :masks="{ title: 'YYYY MMM' }"
        mode="date"
      />
    </div>
    <p>已選日期:</p>
    <radio type="radio">確定不開放</radio>
  </div>
</div>
 </TabPane>
</Tabs>
</template>


<script>
import { Radio } from 'view-ui-plus';

export default {
  name: "bookDate",
  components: { Radio },
  data() {
    return {
      date: "",
    };
  },

  mounted() {},
  beforeDestroy() {},
  computed: {
    catchDate() {
      return `${new Date(this.date).getFullYear()}.${
        new Date(this.date).getMonth() + 1
      }.${new Date(this.date).getDate()}`;
    },
  },
  methods: {},
};

</script>

<style lang="scss" scoped>
.name2 p{
    margin-left: 30px;
    border: 2px black solid;
}
:deep(.calendar) .vc-disabled {
  cursor: not-allowed;
  text-decoration: line-through;
}

:deep(.calendar) .vc-week {
  padding: 10px;
}

:deep(.calendar) .vc-weekdays {
  padding: 10px;
}

:deep(.calendar) .vc-weeks {
  margin: 10px;
}

:deep(.calendar) .vc-header {
  height: 50px;
  background-color: map-get($colors, "secondary");
  margin: 0;
//   padding-left: 150px;
//   padding-right: 150px;
}

:deep(.calendar) .vc-arrow,
:deep(.calendar) .vc-title {
  color: map-get($colors, "light");
  background-color: map-get($colors, "secondary");
  z-index: 2;
}
// :deep(.calendar) .vc-pane{
//     width:250px;
//     height:200px;
// }
.dateAll {
  @include ticket;

  .dateTitle {
    @include h3Title;
  }

  .dateTextAll {
    display: flex;
    justify-content: space-between;

    .calendar {
      width: 40%;
      height: 80%;
      border: 1px #68769a solid;

    }

    .calendarOptionAll {
      width: 40%;
      height: 80%;
      display: flex;
      flex-direction: column;

      //   border: 1px red solid;
      .optionTitle {
        display: flex;
        justify-content: space-between;
        padding-bottom: 5px;
        border-bottom: 1px #979595 solid;
        font-size: map-get($fontSizes, "h4");

        div {
          &:last-child {
            cursor: pointer;

            img {
              margin-right: 10px;
              margin-bottom: -5px;
            }
          }
        }
      }
    }
   }
 }

      .totalNum {
        padding-top: 15px;
        padding-right: 20px;
        display: flex;
        justify-content: flex-end;
        align-items: baseline;

        div {
          &:first-child {
            margin: 0 25px;
            font-weight: bold;
          }
        }

        div:nth-child(2) {
          color: map-get($colors, "secondary");
          font-size: map-get($fontSizes, "h4");
          font-weight: bold;
        }
      }

</style>

<style scoped lang="scss">
.add {
  margin-left: 130px;
  margin-top: 10px;
}
ul {
  width: 100%;
  margin-top: 30px;
  li {
    display: flex;
    flex-direction: row;
    border-bottom: 1px solid black;
    width: 70%;
    margin: 0 auto;
    &:last-child{
        border-bottom: none;
    }
    p {
      &:first-child {
        width: 30%;
        margin: 20px 10px;
      }
    }
    p {
      &:nth-child(2) {
        width: 30%;
        margin: 20px 10px;
      }
    }
    p {
      &:nth-child(3) {
        width: 40%;
        margin: 20px 10px;
      }
    }

    .tickettype {
      width: 60px;
    }

    button {
      width: 60px;
      height: 30px;
      margin: 20px 0;
    }
  }
}
</style>
