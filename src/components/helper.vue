<template>
  <div class="helperAll">
    <img
      :src="require('/public/all_images/dr.dolphin.png')"
      alt=""
      @click="moveShowText"
    />
  </div>
  <div
    class="showWindow"
    :style="{ transform: showText ? 'translateX(0px)' : 'translateX(1000px)' }"
  >
    <div class="windowBtnAll">
      <div @click="moveAddress">地址</div>
      <div @click="moveWeatherMax">降雨機率</div>
      <div @click="moveMaxT">今日溫度</div>
    </div>
    <div v-if="!(showAddress || showWeatherMax || showMaxT)">
      您好,今天想問點什麼
    </div>
    <div v-if="showAddress">地址 : {{ locationName }}</div>
    <div v-if="showWeatherMax">
      天氣現象 : {{ weatherWX }} 最高氣溫 : {{ weatherMaxT }}
    </div>
    <div v-if="showMaxT">降雨機率 : {{ weatherPop }}</div>
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
      this.showText = !this.showText;
      this.showWeatherMax = false;
      this.showMaxT = false;
      this.showAddress = false;
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
  right: 30px;
  top: 70%;
  width: 50px;
  height: 50px;
  z-index: 50;
  cursor: pointer;
  img {
    width: 100%;
    border-radius: 50px;
  }
}
.showWindow {
  width: 200px;
  height: 500px;
  position: fixed;
  top: 40%;
  right: 100px;
  border: 1px black solid;
  background-color: white;
  z-index: 51;
  transition: 1s;
  transform: translateX(1000px);
  .windowBtnAll {
    div {
      @include selectBtn;
      margin: 5px 0px;
    }
  }
}
</style>
