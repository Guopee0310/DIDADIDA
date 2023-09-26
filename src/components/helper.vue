<template>
  <!-- 小幫手 -->
  <div class="helperAll" @click="moveShowText">
    <div class="item">
      <div class="circular">
        <svg viewBox="0 0 100 100">
          <path d="M 0,50 a 50,50 0 1,1 0,1 z" id="circle" />
          <text>
            <textPath href="#circle">
              DOCTER DIDA
            </textPath>
          </text>
        </svg>
      </div>
      <img :src="require('../../public/all_images/doctor dida.png')" alt="" />
    </div>
  </div>

  <div class="showWindow" :style="{ transform: showText ? 'translateX(0px)' : 'translateX(1000px)' }">
    <div class="windowBtnAll">
      <div @click="moveAddress">地址</div>
      <div @click="moveWeatherMax">降雨機率</div>
      <div @click="moveMaxT">今日溫度</div>
      <div @click="moveAddress">休館資訊</div>
      <div @click="moveWeatherMax">獲得與紅利點數</div>
      <div @click="moveMaxT">目前館內人數</div>
      <div @click="moveAddress">票價資訊</div>
      
    </div>
  <div class="rspbox">
    <div class="sayHelloTxt" v-if="!(showAddress || showWeatherMax || showMaxT)">
      {{ sayHelloTxt }}
    </div>
    <div class="response" v-if="showAddress">地址 : {{ locationName }}</div>
    <div class="response" v-if="showWeatherMax">
      天氣現象 : {{ weatherWX }} 最高氣溫 : {{ weatherMaxT }}
    </div>
    <div  class="response" v-if="showMaxT">降雨機率 : {{ weatherPop }}</div>
  </div>
  </div>
</template>

<script>
export default {
  name: "helper",
  data() {
    return {
      // 桃園市
      locationName: "",
      //   天氣現象
      weatherWX: "",
      //   最高溫度
      weatherMaxT: 0,
      //   降雨機率
      weatherPop: 0,
      showText: false,
      showAddress: false,
      showWeatherMax: false,
      showMaxT: false,
      sayHelloTxt: "",
      intervalId: "",
    };
  },
  mounted() {
    fetch(
      "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-AA300EC1-31BA-465E-B669-6CA2C320A195"
    )
      .then(function (response) {
        return response.json();
      })
      .then((myJson) => {
        console.log(
          myJson.records.location[13].weatherElement[1].time[2].parameter
            .parameterName
        );
        this.weatherPop =
          myJson.records.location[13].weatherElement[1].time[2].parameter.parameterName;
        this.weatherMaxT =
          myJson.records.location[13].weatherElement[4].time[2].parameter.parameterName;
        this.weatherWX =
          myJson.records.location[13].weatherElement[0].time[2].parameter.parameterName;
        this.locationName = myJson.records.location[13].locationName;
      });
  },
  methods: {
    moveShowText() {
      clearInterval(this.intervalId);
      this.showText = !this.showText;
      if (!this.showText) {
        this.sayHelloTxt = "";
      }
      this.showWeatherMax = false;
      this.showMaxT = false;
      this.showAddress = false;
      let hello = ["您", "好", "今", "天", "想", "問", "點", "什", "麼", "?"];
      this.sayHelloTxt = ""; // 將文字重置為空字串

      this.intervalId = setInterval(() => {
        if (hello.length > 0) {
          this.sayHelloTxt += hello.shift();
        }
      }, 150);
    },

    moveAddress() {
      this.showWeatherMax = false;
      this.showMaxT = false;
      this.showAddress = true;
    },
    moveWeatherMax() {
      this.showWeatherMax = true;
      this.showMaxT = false;
      this.showAddress = false;
    },
    moveMaxT() {
      this.showWeatherMax = false;
      this.showMaxT = true;
      this.showAddress = false;
    },
  },
  computed: {},
};
</script>
<style scoped lang="scss">
.helperAll {
  position: fixed;
  right: 3%;
  top: 85%;
  width: 50px;
  height: 50px;
  z-index: 50;
  cursor: pointer;

  .item {
    position: relative;

    img {
      width: 100%;
    }

    .circular {
      position: absolute;
      top: -9px;
      left: -9px;
      width: 5em;
      height: 5em;

      path {
        fill-opacity: 0;
      }

      svg {
        display: block;
        overflow: visible;
      }
    }
  }



}


.showWindow {
  width: 300px;
  height: 220px;
  position: fixed;
  top: 50%;
  right: 110px;
  border: 1.5px #232D47 solid;
  background-color:#232D47;
  border-radius: 10px;
  z-index: 51;
  transition: 1s;
  transform: translateX(-1000px);
  overflow: hidden;

  .windowBtnAll {
    div {
      @include selectBtn;
      width: fit-content;
      display: inline-block;
      text-align: center;
      margin: 5px 5px;
    }
  }
  .rspbox{
  border-radius:0 0 10px 10px  ;
  border-top: 1px  rgb(16, 16, 82) solid;;
  background-color: #fff;
  width: 100%;
  height: 50%;
  position: absolute;
  bottom:0%;
  
}

  .sayHelloTxt {
    border-top: 2px rgb(124, 23, 23);
    padding: 10px 5px;
  }
  .response{
    padding: 10px 5px;
    border-top: 2px rgb(124, 23, 23);
  }
}

@media (max-width: 414px) {
.helperAll {
  position: fixed;

  top: 85%;
  width: 50px;
  height: 50px;
  overflow: hidden;
}
.showWindow {
  width: 300px;
  // height: 220px;
  position: fixed;
  top: 60%;
  right: 60px;
  border-radius: 10px;
  z-index: 51;
  transition: 1s;
  overflow: hidden;
}
}
</style>
