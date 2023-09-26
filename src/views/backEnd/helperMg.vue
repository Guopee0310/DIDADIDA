<template>
  <div class="creatAndDel">
    <div @click="createNewOne">新增</div>
  </div>
  <div class="titleAll">
    <div>問題關鍵字</div>
    <div>回答內容</div>
  </div>
  <div class="singleRow" v-for="(i, index) in helperAll" :key="index">
    <div>
      <input type="text" v-model="i[0]" :disabled="i[2]" />
    </div>
    <div>
      <textarea
        name=""
        id=""
        cols="30"
        rows="3"
        v-model="i[1]"
        :disabled="i[2]"
      ></textarea>
    </div>
    <div class="updateBtnAll">
      <div class="update" @click="updateQuestion(index, $event)">修改</div>
      <div @click="delThisQuestion(index)">刪除</div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      helperAll: [
        [
          "交通",
          "自行開車 : 請於國道10號，海洋交流道下，左轉直行珊瑚一街搭乘接駁車 : 請於海洋市區，搭乘海洋路線777公車搭乘捷運 : 請搭乘海洋線，於滴答滴答站下車，2號出口",
          true,
        ],
        ["營業時間", "早上9:00到下午17:00", true],
        ["天氣", "今日氣溫39度", true],
        ["降雨機率", "今日降雨機率為20%", true],
      ],
    };
  },
  methods: {
    createNewOne() {
      this.helperAll.push(["", "", true]);
    },
    delThisQuestion(index) {
      this.helperAll.splice(index, 1);
    },
    updateQuestion(index, e) {
      if (e.target.innerText == "確認") {
        this.helperAll[index][2] = true;
        e.target.innerText = "修改";
        return;
      }
      this.helperAll[index][2] = false;
      e.target.innerText = "確認";
    },
  },
};
</script>

<style scoped lang="scss">
.creatAndDel {
  display: flex;
  div {
    border: 1px black solid;
    cursor: pointer;
  }
}
.titleAll {
  display: flex;
  justify-content: space-around;
  border-bottom: 1px black solid;
  padding-bottom: 15px;
}
.singleRow {
  display: flex;
  justify-content: space-around;
  align-items: center;
  .updateBtnAll {
    display: flex;
    align-items: center;
    div {
      margin: 0 3px;
      border: 1px black solid;
      padding: 3px;
      cursor: pointer;
    }
  }
}
</style>
