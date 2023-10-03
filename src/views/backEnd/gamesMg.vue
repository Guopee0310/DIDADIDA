<template>
  <Tabs value="name1">
    <TabPane label="問卷管理" name="name1">
      <div @click="createNew" class="createBtn">新增項目</div>

      <div class="titleAll">
        <div>問題內容</div>
        <div>正確答案</div>
        <div>答對紅利點數</div>
      </div>
      <div class="singleQuestion" v-for="(i, index) in questionAPI" :key="i[0]">
        <!-- <input
          type="text"
          v-model="cloneQusetion[index]"
          :disabled="i[4]"
          @blur="getQuestion(index)"
        /> -->
        <textarea
          name=""
          id=""
          cols="20"
          rows="2"
          v-model="i.qa_que"
          :disabled="i.isDis"
          class="questionarea"
        >
        </textarea>

        <select name="" id="" :disabled="i.isDis" v-model="i.qa_ans">
          <option value="是">是</option>
          <option value="否">否</option>
        </select>
        <select name="" id="" :disabled="i.isDis" v-model="i.qa_bonus">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="5">5</option>
          <option value="7">7</option>
        </select>
        <div class="questionClick">
          <div @click="updateQuestion(index, $event, i)">修改</div>
          <div @click="deleteRow(i, index)">刪除</div>
        </div>
      </div>
    </TabPane>
    <TabPane label="拉霸管理" name="name2" class="labaAll">
      <!-- <div class="labaTitle">
        <div>新增項目</div>
      </div>
      <div class="labaDetailAll">
        <div>圖片</div>
        <div>內容</div>
        <div>紅利點數</div>
      </div>
      <div class="singleRow" v-for="(i, index) in labaAll" :key="index">
        <div>
          <div class="picBox">
            <img :src="i[0]" alt="" />
          </div>
          <input
            type="file"
            @change="pushImg($event, index)"
            :disabled="i[2]"
          />
        </div>
        <div class="inputAll">
          <input
            type="text"
            placeholder="標題"
            :disabled="i[2]"
            v-model="cloneLabaTitle[index]"
          />
          <textarea
            name=""
            id=""
            cols="30"
            rows="5"
            placeholder="內容"
            :disabled="i[2]"
            v-model="cloneLabaText[index]"
          ></textarea>
        </div>
        <select
          name=""
          id=""
          :disabled="i[2]"
          v-model="cloneLabaPoint[index]"
          @change="getLabaPoint(index)"
        >
          <option value="3">3</option>
          <option value="5">5</option>
          <option value="7">7</option>
        </select>
        <div class="chooseBtnAll">
          <label>
            <input
              v-model="cloneLabashelf[index]"
              type="radio"
              :name="chooseUpDown + index"
              :disabled="i[2]"
              value="上架"
            />
            上架
          </label>
          <label>
            <input
              v-model="cloneLabashelf[index]"
              type="radio"
              :name="index"
              :disabled="i.isDis"
              value="下架"
            />
            下架
          </label>
        </div>
        <div class="startUpdate" @click="updateInput(index, $event)">修改</div>
      </div> -->
    </TabPane>
  </Tabs>
</template>
<script>
export default {
  data() {
    return {
      cloneQusetion: [],
      cloneAns: [],
      clonePoint: [],
      cloneLabaPoint: [],
      cloneLabaTitle: [],
      cloneLabaText: [],
      cloneLabashelf: [],
      questionAPI: [],
      questionAll: [
        [1, "請問海豚是不是深海動物", "否", 3, true],
        [2, "請問珊瑚是不是保育類海洋生物", "是", 5, true],
        [3, "請問DIDA DIDA 的主題是甚麼", "是", 7, true],
      ],
      labaAll: [
        [
          require("../../assets/images/blueCloth.png"),
          5,
          true,
          "海豚",
          "海豚是哺乳动物，生活在海洋中。它们通常有流线型的体形，灰色的皮肤，以及独特的喷水孔，用于呼吸。",
          "下架",
        ],
        [
          require("../../assets/images/blueCloth.png"),
          5,
          true,
          "海豚",
          "海豚是哺乳动物，生活在海洋中。它们通常有流线型的体形，灰色的皮肤，以及独特的喷水孔，用于呼吸。",
          "下架",
        ],
        [
          require("../../assets/images/blueCloth.png"),
          7,
          true,
          "海豚",
          "海豚是哺乳动物，生活在海洋中。它们通常有流线型的体形，灰色的皮肤，以及独特的喷水孔，用于呼吸。",
          "下架",
        ],
        [
          require("../../assets/images/blueCloth.png"),
          3,
          true,
          "海豚",
          "海豚是哺乳动物，生活在海洋中。它们通常有流线型的体形，灰色的皮肤，以及独特的喷水孔，用于呼吸。",
          "下架",
        ],
        [
          require("../../assets/images/blueCloth.png"),
          5,
          true,
          "海豚",
          "海豚是哺乳动物，生活在海洋中。它们通常有流线型的体形，灰色的皮肤，以及独特的喷水孔，用于呼吸。",
          "下架",
        ],
      ],
    };
  },
  computed: {},
  mounted() {
    fetch("http://localhost/dida_project/public/php/quiz.php")
      .then(function (response) {
        return response.json();
      })
      .then((myJson) => {
        this.questionAPI = myJson;
        for (let i = 0; i < this.questionAPI.length; i++) {
          this.questionAPI[i].isDis = true;
        }
      });
    for (let i = 0; i < this.questionAll.length; i++) {
      this.cloneQusetion.push(this.questionAll[i][1]);
      this.cloneAns.push(this.questionAll[i][2]);
      this.clonePoint.push(this.questionAll[i][3]);
    }
    for (let i = 0; i < this.labaAll.length; i++) {
      this.cloneLabaTitle.push(this.labaAll[i][3]);
      this.cloneLabaText.push(this.labaAll[i][4]);
      this.cloneLabashelf.push(this.labaAll[i][5]);
      this.cloneLabaPoint.push(this.labaAll[i][1]);
    }
  },
  methods: {
    getLabaPoint(index) {
      this.labaAll[index][1] = this.cloneLabaPoint[index];
    },
    pushImg(e, index) {
      this.labaAll[
        index
      ][0] = require(`../../assets/images/${e.target.files[0].name}`);
    },
    updateInput(index, e) {
      if (e.target.innerText == "確認") {
        this.labaAll[index][2] = true;
        e.target.innerText = "修改";
        return;
      }
      this.labaAll[index][2] = false;
      e.target.innerText = "確認";
    },
    createNew() {
      this.questionAPI.push({
        qa_no: this.questionAPI.length + 1,
        qa_que: `編號${this.questionAPI.length + 1}的問題`,
        qa_ans: `是`,
        qa_bonus: "1",
        isDis: true,
      });
      const formData = new FormData();
      let qa_no = this.questionAPI[this.questionAPI.length - 1].qa_no;
      let qa_que = this.questionAPI[this.questionAPI.length - 1].qa_que;
      let qa_ans = this.questionAPI[this.questionAPI.length - 1].qa_ans;
      let qa_bonus = this.questionAPI[this.questionAPI.length - 1].qa_bonus;

      formData.append("qa_no", qa_no);
      formData.append("qa_que", qa_que);
      formData.append("qa_ans", qa_ans);
      formData.append("qa_bonus", qa_bonus);
      fetch("http://localhost/dida_project/public/php/quizInsert.php", {
        method: "post",
        body: formData,
      }).then((res) => res.json());
    },
    deleteRow(item, index) {
      // this.$nextTick(function () {
      //   if (this.questionAll[index][4]) {
      //     this.cloneQusetion.splice(index, 1);
      //     this.cloneAns.splice(index, 1);
      //     this.clonePoint.splice(index, 1);
      //     this.questionAll.splice(index, 1);
      //   }
      // });
      const formData = new FormData();
      let qa_no = this.questionAPI[index].qa_no;

      formData.append("qa_no", qa_no);

      fetch("http://localhost/dida_project/public/php/quizDelete.php", {
        method: "post",
        body: formData,
      }).then((res) => res.json());
      this.questionAPI.splice(index, 1);
    },
    // getQuestion(index) {
    //   this.questionAll[index][1] = this.cloneQusetion[index];
    // },
    // getPoint(index) {
    //   this.questionAll[index][3] = this.clonePoint[index];
    // },
    // getYesNot(index, e) {
    //   this.questionAll[index][2] = this.cloneAns[index];
    //   //   this.questionAll[index][1] = e.target.innerText;
    // },
    updateQuestion(idx, e, i) {
      if (e.target.innerText == "確認") {
        this.questionAPI[idx].isDis = true;
        e.target.innerText = "修改";

        const formData = new FormData();
        let qa_no = this.questionAPI[idx].qa_no;
        let qa_que = this.questionAPI[idx].qa_que;
        let qa_ans = this.questionAPI[idx].qa_ans;
        let qa_bonus = this.questionAPI[idx].qa_bonus;

        formData.append("qa_no", qa_no);
        formData.append("qa_que", qa_que);
        formData.append("qa_ans", qa_ans);
        formData.append("qa_bonus", qa_bonus);
        fetch("http://localhost/dida_project/public/php/quiz.php", {
          method: "post",
          body: formData,
        }).then((res) => res.json());
        return;
      }
      this.questionAPI[idx].isDis = false;
      e.target.innerText = "確認";
    },
  },
};
</script>
<style lang="scss" scoped>
.titleAll {
  display: flex;
  border-bottom: 1px black solid;
  justify-content: space-around;
  padding-bottom: 10px;
}
.createBtn {
  border: 1px black solid;
  width: 6rem;
  padding: 3px 10px;
  cursor: pointer;
}
.singleQuestion {
  display: flex;
  justify-content: space-around;
  margin: 20px 0px;
  .questionClick {
    display: flex;
    div {
      border: 1px black solid;
      padding: 5px;
      margin: 3px;
      cursor: pointer;
    }
  }
  .questionarea {
    overflow: auto; /* Add scrollbars when content overflows */
    scrollbar-width: thin;
    scrollbar-color: #03e9f4 transparent;
  }
}
.labaAll {
  .labaTitle {
    display: flex;
  }
  .labaDetailAll {
    display: flex;
    justify-content: space-around;
    padding-bottom: 10px;
    border-bottom: 1px black solid;
  }
  .singleRow {
    display: flex;
    align-items: center;
    justify-content: space-around;
    div {
      .picBox {
        width: 150px;
        height: 150px;
        border: 1px black solid;
        img {
          width: 100%;
          height: 100%;
        }
      }
    }
    .inputAll {
      display: flex;
      flex-direction: column;
      input {
        margin: 20px 0px;
      }
    }
    .chooseBtnAll {
      display: flex;
      flex-direction: column;
    }
    .startUpdate {
      border: 1px black solid;
      padding: 5px;
      cursor: pointer;
    }
  }
}
</style>
