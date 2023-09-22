<template>
  <div class="select_btn">
    <newsSelect @transferClass="filterNewsByTag" @transfertime="filterNewsByTime" @transferSearch="searchClick">
    </newsSelect>
  </div>
  <div class="card" v-for="(item, index) in displayedNews" :key="index">
    <a href="#">
      <div class="pic">
        <img :src="item.imageSrc" alt="" />
      </div>
      <div class="tag">{{ item.tag }}</div>
      <div class="news_title">
        {{ item.news_title }}
        <div class="info">
          {{ item.time }}
        </div>
      </div>

      <div class="news_content">
        {{ item.news_txt }}
      </div>
    </a>
  </div>
  <Page class="page" :total="filteredNews.length" @on-change="updatePage" v-if="showPage" />
</template>

<script>
import newsSelect from "../components/news_select.vue";
export default {
  data() {
    return {
      showPage: true,
      news_content: [
        {
          imageSrc: require("../../public/all_images/news/dolphin_show2.jpg"),
          news_title: "海豚秀",
          news_txt:
            "可欣賞到國內規模最大，結合大型視覺影像、動態水舞與強力音響設備的 3 種水舞表演節目。",
          time: "2023.09.12",
          tag: "表演",
        },
        {
          imageSrc: require("../../public/all_images/news/mermaid_show.jpg"),
          news_title: "美人魚秀",
          news_txt:
            "探索深海的神奇之處，邀您一起來親身見證美人魚的優雅和神秘。",
          time: "2023.08.12",
          tag: "表演",
        },
        {
          imageSrc: require("../../public/all_images/news/aquarium_many_people.jpg"),
          news_title: "星光門票優惠",
          news_txt:
            "帶上家人和朋友，一起在星星的照耀下，夜訪水族館度過一個難忘的夜晚。",
          time: "2023.07.12",
          tag: "優惠",
        },
        {
          imageSrc: require("../../public/all_images/news/water_show.jpg"),
          news_title: "水舞秀",
          news_txt:
            "讓水流、音樂和光線共同編織出一個夢幻的故事，這是一場視覺和聽覺的盛宴，絕對不容錯過。",
          time: "2023.08.17",
          tag: "表演",
        },
        {
          imageSrc: require("../../public/all_images/news/underwater_show.jpg"),
          news_title: "水下舞蹈表演",
          news_txt:
            "舞者在水下，搭配著音樂與燈光舞動出優美動人的舞姿，帶您領略一場水下舞台劇。",
          time: "2023.09.05",
          tag: "表演",
        },
        {
          imageSrc: require("../../public/all_images/news/aquarium-box.jpg"),
          news_title: "開幕活動",
          news_txt:
            "DIDADIDA盛大開幕，限時票價優惠與眾多開幕活動等您來與我們同歡",
          time: "2023.07.10",
          tag: "活動",
        },
        {
          imageSrc: require("../../public/all_images/news/perfomance_dive.jpg"),
          news_title: "潛水餵食秀",
          news_txt: "不容錯過的潛水餵食秀，帶您近距離觀察海洋生物進食瞬間",
          time: "2023.09.10",
          tag: "表演",
        },
        {
          imageSrc: require("../../public/all_images/news/jellyfish_box.jpg"),
          news_title: "官網獨家優惠",
          news_txt:
            "特別優惠限時來襲！以超值價格入場，有網美必拍水母箱和眾多熱門拍照點，邀請您來拍個夠。",
          time: "2023.08.20",
          tag: "優惠",
        },
        {
          imageSrc: require("../../public/all_images/news/underwater_tunnel.jpg"),
          news_title: "夜宿海底隧道",
          news_txt:
            "邀請您體驗這一奇妙夜晚，參與我們令人驚嘆的夜宿海底隧道活動。",
          time: "2023.09.01",
          tag: "活動",
        },
        {
          imageSrc: require("../../public/all_images/news/credit_card.jpg"),
          news_title: "信用卡優惠",
          news_txt: "使用指定信用卡，門票享85折",
          time: "2022.12.31",
          tag: "優惠",
        },
        {
          imageSrc: require("../../public/all_images/news/happy_birthday.jpg"),
          news_title: "當月壽星優惠",
          news_txt: "當月壽星出示證件，即可享門票9折優惠",
          time: "2023.01.01",
          tag: "優惠",
        },
        {
          imageSrc: require("../../public/all_images/news/beach_concert.jpg"),
          news_title: "海灘跨年演唱會",
          news_txt:
            "來自海灘的呼喚！讓我們一同迎接新的一年，沐浴在星光下，享受音樂和激情的交織。2022年的跨年夜，我們將在沙灘上舉行一場獨一無二的演唱會，為這個特殊的時刻帶來音樂的饗宴。",
          time: "2022.12.31",
          tag: "活動",
        },
      ],
      pageSize: 9,
      currentPage: 1,
      displayedNews: [],
      filteredNews: [],
      tagOption: "所有主題",
      timeOption: "由新到舊",
      searchInput: " ",
    };
  },
  mounted() {
    this.filteredNews = this.news_content; // 初始化 filteredNews 数据
    this.filterNewsByTag(this.tagOption);
    this.filterNewsByTime(this.timeOption);
    this.updatePage(1); // 触发一次分页更新，显示第一页的数据
    window.addEventListener('resize', this.handleWindowSize);
    this.handleWindowSize();
  },
  components: {
    newsSelect,
  },
  methods: {
    handleWindowSize() {
      const windowWidth = window.innerWidth;
      if (windowWidth > 992) {
        this.pageSize = 9;
      }
      else if(windowWidth > 767 && windowWidth <= 992){
        this.pageSize = 8;
      }
      else {
        this.pageSize = 6;
      }
      this.updatePage(this.currentPage);
    },
    updatePage(page) {
      this.currentPage = page;
      console.log(this.currentPage);
      const startIdx = (this.currentPage - 1) * this.pageSize;
      const endIdx = startIdx + this.pageSize;
      this.displayedNews = this.filteredNews.slice(startIdx, endIdx);
    },

    filterNewsByTag(data) {
      this.tagOption = data;
      if (data === "所有主題") {
        this.filteredNews = this.news_content;
      } else {
        this.filteredNews = this.news_content.filter(
          (item) => item.tag === data
        );
      }
      this.showPage = false;
      setTimeout(() => {
        this.showPage = true;
      }, 100);
      this.currentPage = 1; // 将 currentPage 设置为 1
      this.filterNewsByTime(this.timeOption);
      this.updatePage(1);
    },

    filterNewsByTime(data) {
      this.timeOption = data;
      if (data === "由新到舊") {
        this.filteredNews.sort((a, b) => new Date(b.time) - new Date(a.time));
        this.currentPage = 1;
      } else if (data === "由舊到新") {
        this.filteredNews.sort((a, b) => new Date(a.time) - new Date(b.time));
        this.currentPage = 1;
      }
      this.showPage = false;
      setTimeout(() => {
        this.showPage = true;
      }, 100);
      // 重置当前页为第一页
      this.updatePage(1);
    },
    searchClick(data) {
      const searchInput = data.toUpperCase();
      const res = this.news_content.filter((item, index, array) => {
        const search_content = item.news_title.toUpperCase() && item.news_txt.toUpperCase();
        return search_content.includes(searchInput);
      });
      this.filteredNews = res;
      this.updatePage(1);
    },
  },
  beforeDestroy() {
    // 移除窗口宽度监听器，以防止内存泄漏
    window.removeEventListener('resize', this.handleWindowSize);
  },
};
</script>
<style scoped lang="scss">
.card {
  max-width: calc(100% / 3);
  aspect-ratio: 1/1;
  padding: 0 30px 0;
  font-size: map-get($fontSizes, "a");
  position: relative;
  margin-bottom: 1rem;

  a {
    text-decoration: none;
    color: #333;
    transition: 0.3s;
  }

  .pic {
    overflow: hidden;
    position: relative;
    z-index: 1;
    width: 100%;

    img {
      aspect-ratio: 3 / 2;
      width: 100%;
      vertical-align: top;
      transform: scale(1);
      transition: 0.7s;

      &:hover {
        transition: 0.7s;
        transform: scale(1.1);
      }
    }
  }

  .tag {
    position: absolute;
    top: 10px;
    left: 20px;
    border-radius: 0 0 0 0.1em;
    background-color: #dc564a;
    padding: 0.3em 0.5em;
    color: map-get($colors, "light");
    font-size: 1rem;
    z-index: 2;
  }

  &::after {
    content: "";
    position: absolute;
    top: 42px;
    z-index: 1;
    left: 20px;
    border-bottom: solid 10px transparent;
    border-right: solid 10px #763030;
  }

  .news_title {
    max-width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: map-get($fontSizes, "div");
    position: relative;
    padding-top: 0.5rem;

    .info {
      width: 8rem;
      height: 3.1rem;
      position: absolute;
      bottom: 0;
      right: -25px;
      background-image: url(../../public/all_images/news/output-onlinepngtools.png);
      background-size: contain;
      background-repeat: no-repeat;
      background-position: right;
      color: #2d0c0c;
      font-size: 0.9rem;
      text-align: center;
      padding-top: 1.5rem;
      z-index: 4;
    }
  }

  .news_content {
    line-height: 1.5;
    color: #333;
    transition: 0.3s;
    margin-top: 0.5em;

  }
}

.page {
  width: 100%;
  text-align: center;
  margin-bottom: 1rem;
}


@media screen and (max-width: 992px) {
  .card {
    max-width: calc(100%/2);

    .news_content {
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 3;
      overflow: hidden;
    }
  }
}

@media screen and (max-width: 767px) {
  .card {
    max-width: 100%
  }
}
</style>
