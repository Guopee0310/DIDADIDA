<template>
  <div class="homePicAll">
    <!-- <div @click="createNew">新增項目</div> -->
    <div class="bannerTitle">
      <div>順序</div>
      <div>圖片</div>
      <div>上傳圖片</div>
    </div>
    <div class="singleBar" v-for="(i, index) in bannerAll" :key="index">
      <div>{{ indexPlus(index) }}</div>
      <div class="imgBox">
        <img :src="i.banner_pic" alt="" />
      </div>
      <div>
        <input
          type="file"
          @change="pushImg($event, index)"
          :disabled="i.isDis"
        />
        <div>尺寸 1920 X 200px</div>
      </div>

      <div class="updateAndDel">
        <div @click="updatePic(index, $event)">修改</div>
        <div @click="delRow(index)">刪除</div>
      </div>
    </div>
  </div>
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
      bannerAll: [],
    };
  },
  computed: {},
  mounted() {
    fetch(`${this.$store.state.APIurl}homePicMg.php`)
      .then(function (response) {
        return response.json();
      })

      .then((myJson) => {
        for (let i = 0; i < myJson.length; i++) {
          myJson[
            i
          ].banner_pic = require(`../../../public/all_images/banner/${myJson[i].banner_pic}`);
          myJson[i].isDis = true;
        }
        this.bannerAll = myJson;
      });
  },
  methods: {
    createNew() {
      if (this.bannerAll.length >= 5) {
        alert("已達上限");
        return;
      } else {
        this.bannerAll.push(["", true]);
      }
    },
    delRow(index) {
      this.bannerAll.splice(index, 1);
    },
    updatePic(index, e) {
      if (e.target.innerText == "確認") {
        this.bannerAll[index].isDis = true;
        e.target.innerText = "修改";
        return;
      }
      this.bannerAll[index].isDis = false;
      e.target.innerText = "確認";
    },
    indexPlus(idx) {
      return (idx += 1);
    },
    getImagePath(index) {
      // 使用 require 导入图片，确保路径正确
      return require(`@/assets/images/bannerAll[${index}]`);
    },
    pushImg(e, index) {
      // console.log(e.target.files[0].name);
      // console.log(index);
      // this.bannerAll[
      //   index
      // ][0] = require(`../../assets/images/${e.target.files[0].name}`);
      // this.bannerAll[index][1] = true;

      let file = e.target.files[0];
      this.changePic = file;
      console.log("file", file);

      let readFile = new FileReader();
      readFile.readAsDataURL(file);
      readFile.addEventListener("load", function () {
        let image = new Image();
        image.src = readFile.result;
        console.log(image.src);
        image.style.width = "100%";
        image.style.height = "100%";
        document.querySelectorAll(".imgBox")[index].innerHTML = "";
        document.querySelectorAll(".imgBox")[index].appendChild(image);
      });
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
