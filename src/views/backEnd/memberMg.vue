<template>
  <div class="mem_all">
    <div class="select">
      <div class="search">
        <input type="searchbar" placeholder="帳號或姓名" /><button>搜尋</button>
      </div>
    </div>
    <div class="mem_content">
      <div class="title">
        <ul>
          <li>Email / 帳號</li>
          <li>姓名</li>

          <li>會員狀態</li>
        </ul>
      </div>
      <div class="mem_info">
        <div class="mem_email">
          <p>nini0218@gmail.com</p>
        </div>
        <div class="mem_name">
          <p>緯育李白</p>
        </div>

        <div class="mem_state">
          <p>黑名單</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imageSrc: "",
      allBar: [
        {
          select: false,
          change_txt: true,
          imageName: "dolphin_doll.png",
          imageSrc: require("../../../src/assets/images/dolphin_doll.png"),
          category: "玩偶",
          prod_name: "超可愛海豚寶寶玩偶",
          price: "399",
          category: "活動",
          prod_detail:
            "超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹",
        },
      ],
    };
  },
  methods: {
    createNew() {
      const currentDate = this.getCurrentDate();
      this.allBar.push({
        change_txt: true,
        imageName: "",
        imageSrc: "",
        category: "",
        prod_name: "",
        price: "",
        category: "",
        prod_detail: "",
      });
      this.allBar[this.allBar.length - 1].imageSrc = "";
    },
    deleteSelected() {
      this.allBar = this.allBar.filter((item) => !item.select);
    },
    //獲取今天日期
    getCurrentDate() {
      const today = new Date();
      const year = today.getFullYear();
      const month = today.getMonth() + 1;
      const day = today.getDate();
      return `${year}.${month.toString().padStart(2, "0")}.${day
        .toString()
        .padStart(2, "0")}`;
    },

    fileChange(index, event, item) {
      const file = event.target.files[0];
      if (file) {
        item.imageName = file.name;
        // item.fileType = file.type;
        // item.fileSize = file.size;
        // item.lastModified = file.lastModified;

        const reader = new FileReader();
        reader.addEventListener("load", () => {
          this.allBar[index].imageSrc = reader.result;
        });
        reader.readAsDataURL(file);
      }
    },
    updateNews(index, e) {
      if (e.target.innerText == "確認") {
        this.allBar[index][0] = true;
        e.target.innerText = "修改";
        return;
      }
      this.allBar[index][0] = false;
      e.target.innerText = "確認";
    },
  },
  computed: {
    selectedCount() {
      return this.allBar.filter((item) => item.select).length;
    },
    newsCount() {
      return this.allBar.length;
    },
    selectAll: {
      get() {
        return this.selectedCount === this.newsCount && this.newsCount > 0;
      },
      set(value) {
        this.allBar.forEach((item) => {
          item.select = value;
        });
      },
    },
  },
};
</script>
<style scoped lang="scss">
.mem_all {
  .select {
    display: flex;
    justify-content: space-between;

    .search {
      input[type="searchbar"] {
        width: 200px;
        height: 30px;
        border-radius: 1rem;
        outline: none;
        border: 1px solid #b7b7b7;
        padding-left: 10px;
        margin-right: 10px;
      }

      button {
        width: 50px;
        height: 30px;
      }
    }
  }

  .mem_content {
    .title {
      width: 100%;
      border-bottom: 1px solid #000;
      margin: 1em 0;
      padding-bottom: 5px;

      ul {
        width: 100%;
        margin: auto;
        display: flex;
        text-align: center;
        justify-content: space-around;
        li {
          &:nth-of-type(1) {
            width: 30%;
          }

          &:nth-of-type(2) {
            width: 16%;
            text-align: center;
          }

          &:nth-of-type(3) {
            width: 20%;
          }

          &:nth-of-type(4) {
            width: 17%;

            input[type="number"] {
              width: 70%;
            }
          }

          &:nth-of-type(5) {
            width: 20%;
          }

          &:nth-of-type(6) {
            width: 10%;
            text-align: center;
          }
        }
      }
    }
    .mem_info {
      width: 100%;
      display: flex;
      justify-content: space-around;
    }
  }
}
</style>
