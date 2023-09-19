<template>
  <div class="dateAll">
    <div class="dateTitle">選擇日期與票數</div>
    <div class="dateTextAll">
      <div class="calendar">
        <VDatePicker borderless expanded :min-date="new Date()" locale="tw" :masks="{ title: 'YYYY MMM' }"
          :select-attribute="selectAttribute" />
      </div>
      <div class="calendarOptionAll">
        <div class="optionTitle">
          <div>選擇數量</div>
          <div @click="clearTicketCount">全部重選</div>
        </div>
        <div v-for="(i, index) in optionDetailArr" class="optionAll" :key="index">
          <div class="ticketType">
            <div>{{ i[0] }}</div>
            <div>{{ i[1] }}</div>
          </div>
          <div class="ticketSal">
            <div>{{ i[2] }}</div>
            <div class="clickTicket">
              <div @click="ticketdown(index)">-</div>
              <div>{{ i[3] }}</div>
              <div @click="ticketPlus(index)">+</div>
            </div>
          </div>
        </div>
        <div class="totalNum">
          <div>總金額</div>
          <div>
            TWD <span>{{ totalPrice }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<!-- 日曆相關屬性 -->
<script setup>
import { ref } from 'vue';

const date = ref(new Date());
const selectAttribute = ref({ highlight: 'blue', });  // 改選取日期的顏色
</script>

<script>
export default {
  name: "bookDate",
  components: {},
  data() {
    return {
      optionDetailArr: [
        ["成人", "(18~64歲)", "TWD 500/每人", 0],
        ["兒童", "(4~11歲)", "TWD 250/每人", 0],
        ["學生", "(12歲以上(含)持學生證者)", "TWD 400/每人", 0],
        ["長者", "(65歲以上(含))", "TWD 250/每人", 0],
      ],
      totalPrice: 0,
    };
  },
  watch: {},
  mounted() { },
  beforeDestroy() { },
  computed: {},
  methods: {
    clearTicketCount() {
      for (let i = 0; i < this.optionDetailArr.length; i++) {
        this.optionDetailArr[i][3] = 0;
      }
      this.totalPrice = 0;
    },
    ticketdown(idx) {
      if (this.optionDetailArr[idx][3] > 0) {
        this.optionDetailArr[idx][3]--;
        idx == 0
          ? (this.totalPrice -= 500)
          : idx == 1
            ? (this.totalPrice -= 250)
            : idx == 2
              ? (this.totalPrice -= 400)
              : idx == 3
                ? (this.totalPrice -= 250)
                : "";
      }
    },
    ticketPlus(idx) {
      this.optionDetailArr[idx][3]++;
      idx == 0
        ? (this.totalPrice += 500)
        : idx == 1
          ? (this.totalPrice += 250)
          : idx == 2
            ? (this.totalPrice += 400)
            : idx == 3
              ? (this.totalPrice += 250)
              : "";
    },
  },
};
</script>
<style lang="scss" scoped>
.dateAll {
  @include ticket;

  .dateTitle {
    @include h3Title;
    // border: 1px red solid;
    width: 180px;
  }

  .dateTextAll {
    display: flex;
    justify-content: space-between;

    .calendar {
      width: 45%;
      height: 80%;
      border: 1px #68769a solid;
    }

    .calendarOptionAll {
      width: 45%;
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
          }
        }
      }

      .optionAll {
        display: flex;
        padding: 15px 0;
        justify-content: space-between;
        border-bottom: 1px #979595 solid;

        .ticketType {
          display: flex;
          align-items: flex-end;

          div {
            &:first-child {
              font-size: 18px;
              margin-right: 5px;
            }

            &:last-child {
              font-size: 12px;
              color: #979595;
            }
          }
        }

        .ticketSal {
          display: flex;
          align-items: flex-end;

          .clickTicket {
            // border: 1px red solid;
            background-color: #a7cbec;
            border-radius: 20px;
            display: flex;
            margin-left: 15px;

            div {
              padding: 0 15px;

              &:first-child,
              &:last-child {
                cursor: pointer;
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

        div {
          &:first-child {
            margin: 0 15px;
          }
        }
      }
    }
  }
}
</style>
