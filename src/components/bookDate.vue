<template>
  <div class="dateAll">
    <div class="dateTitle">{{ $t("選擇日期與票數") }}</div>
    <div class="dateTextAll">
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
      <div class="calendarOptionAll">
        <div class="optionTitle">
          <div>{{ $t("選擇數量") }}</div>
          <div @click="clearTicketCount">
            <img src="../assets/images/reorganize.png" alt="" />{{
              $t("全部重選")
            }}
          </div>
        </div>
        <div
          v-for="(i, index) in optionDetailArr"
          class="optionAll"
          :key="index"
        >
          <div class="ticketType">
            <div>{{ $t(i[0]) }}</div>
            <div>{{ $t(i[1]) }}</div>
          </div>
          <div class="ticketSal">
            <div>NT {{ $t(i[2]) }} / 每人</div>
            <div class="clickTicket">
              <div @click="ticketdown(index)">－</div>
              <div>{{ i[3] }}</div>
              <div @click="ticketPlus(index)">＋</div>
            </div>
          </div>
        </div>
        <div class="totalNum">
          <div>{{ $t("總金額") }}</div>
          <div>
            NT <span>{{ totalPrice }}</span>
          </div>
        </div>
        <div class="bookbtn">
          <button @click="bookTickets">{{ $t("立即購票") }}</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "bookDate",
  components: {},
  data() {
    return {
      date: "",
      optionDetailArr: [
        ["成人", "(18~64歲)", "500", 0],
        ["兒童", "(4~11歲)", "250", 0],
        ["學生", "(12歲以上(含)持學生證者)", "400", 0],
        ["長者", "(65歲以上(含))", "250", 0],
      ],
      totalPrice: 0,
    };
  },
  watch: {},
  mounted() {},
  beforeDestroy() {},
  computed: {
    catchDate() {
      return `${new Date(this.date).getFullYear()}.${new Date(
        this.date
      ).getMonth()}.${new Date(this.date).getDate()}`;
    },
  },
  methods: {
    bookTickets() {
      if (!this.$store.state.userName) {
        alert("需先登入會員");
      } else {
        for (let i = 0; i < this.optionDetailArr.length; i++) {
          const lastElement =
            this.optionDetailArr[i][this.optionDetailArr[i].length - 1];
          if (lastElement === 0) {
            continue; // 如果最後一個元素是零，則跳過這個子陣列
          } else {
            for (let j = 0; j < lastElement; j++) {
              //     tickImg: require("../assets/images/dolphin_pillow.jpg"),
              //     tickName: "一般全票",
              //     tickCount: "2",
              //     tickDate: "2023.08.31",
              //     tickPrice: "250",
              console.log(
                this.optionDetailArr[i][this.optionDetailArr[i].length - 1]
              );
              this.$store.state.ticketList.push({
                tickImg: require("../assets/images/dolphin_pillow.jpg"),
                tickName: `${this.optionDetailArr[i][0]}票`,
                tickCount: `1`,
                tickDate: this.catchDate,
                tickPrice: `${this.optionDetailArr[i][2]}`,
              });
            }
          }
        }
      }
    },
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
  padding-left: 150px;
  padding-right: 150px;
}

:deep(.calendar) .vc-arrow,
:deep(.calendar) .vc-title {
  color: map-get($colors, "light");
  background-color: map-get($colors, "secondary");
  z-index: 2;
}

.dateAll {
  @include ticket;

  .dateTitle {
    @include h3Title;
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

            img {
              margin-right: 10px;
              margin-bottom: -5px;
            }
          }
        }
      }

      .bookbtn {
        display: flex;
        justify-content: flex-end;
        padding: 20p;
        margin: 40px 10px;
        border: 0;

        button {
          width: 150px;
          height: 50px;
          border: 0;
          border-radius: 5px;
          font-size: map-get($fontSizes, "h4");
          background-color: map-get($colors, "secondary");
          color: map-get($colors, "light");
        }
      }

      .optionAll {
        display: flex;
        align-items: center;
        padding: 15px 0;
        justify-content: space-between;
        border-bottom: 1px #979595 solid;
        font-weight: bold;
        letter-spacing: 1px;

        .ticketType {
          display: flex;
          flex-wrap: wrap;
          align-items: center;

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
          flex-wrap: wrap;
          justify-content: flex-end;

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
    }
  }
}
</style>
