<template>
  <div class="homePicAll">
    <div @click="createNew">新增項目</div>
    <div class="bannerTitle">
      <div>順序</div>
      <div>圖片</div>
      <div>上傳圖片</div>
    </div>
    <div class="singleBar" v-for="(i, index) in allBar" :key="index">
      <div>{{ indexPlus(index) }}</div>
      <div class="imgBox">
        <img :src="i[0]" alt="" />
        <!-- <img src="../../assets/images/blueCloth.png" alt="" /> -->
      </div>
      <div>
        <input type="file" @change="pushImg($event, index)" :disabled="i[1]" />
        <div>尺寸 1920 X 200px</div>
      </div>

      <div class="updateAndDel">
        <div @click="updatePic(index)">修改</div>
        <div @click="delRow(index)">刪除</div>
      </div>
    </div>
  </div>
  <div></div>
</template>
<script>
export default {
  data() {
    return {
      allBar: [
        [require("../../assets/images/index_p1.png"), true],
        [require("../../assets/images/index_p2.png"), true],
        [require("../../assets/images/index_p3.png"), true],
        [require("../../assets/images/blueCloth.jpg"), true],
        [require("../../assets/images/index_p3.png"), true],
      ],
    };
  },
  computed: {},
  mounted() {},
  methods: {
    createNew() {
      if (this.allBar.length >= 5) {
        alert("已達上限");
        return;
      } else {
        this.allBar.push(["", true]);
      }
    },
    delRow(index) {
      this.allBar.splice(index, 1);
    },
    updatePic(index) {
      this.allBar[index][1] = false;
    },
    indexPlus(idx) {
      return (idx += 1);
    },
    getImagePath(index) {
      // 使用 require 导入图片，确保路径正确
      return require(`@/assets/images/allBar[${index}]`);
    },
    pushImg(e, index) {
      console.log(e.target.files[0].name);
      console.log(index);
      this.allBar[
        index
      ][0] = require(`../../assets/images/${e.target.files[0].name}`);
      this.allBar[index][1] = true;
    },
  },
};
</script>

<style scoped lang="scss">
.homePicAll {
  .bannerTitle {
    display: flex;
    border-bottom: 1px black solid;
    padding-bottom: 10px;
    justify-content: space-around;
  }
  .singleBar {
    display: flex;
    align-items: center;
    justify-content: space-around;
    border-bottom: 1px black solid;

    .imgBox {
      width: 250px;
      height: 150px;
      img {
        width: 100%;
        height: 100%;
        vertical-align: bottom;
      }
    }
    .updateAndDel {
      display: flex;
      div {
        border: 1px black solid;
        cursor: pointer;
        padding: 5px 15px;
        margin: 3px;
      }
    }
  }
}
// @keyframes paoPao1 {
//   0% {
//     translate: 0;
//     opacity: 1;
//   }

//   100% {
//     translate: 0 -100px;
//     opacity: 0;
//   }
// }
// @keyframes paoPao2 {
//   0% {
//     transform: translateX(0px);
//     opacity: 1;
//   }
//   25% {
//     transform: translateX(15px);
//   }
//   50% {
//     transform: translateX(0px);
//   }
//   75% {
//     transform: translateX(-10px);
//   }
//   100% {
//     transform: translateX(0px);
//     opacity: 0;
//   }
// }
</style>
