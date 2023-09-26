<template>
    <div class="news_all">
        <div class="select">
            <div class="add" @click="createNew">
                <button>+新增項目</button>
            </div>
            <div class="on_off">
                <select name="" id="">
                    <option value="">篩選</option>
                    <option value="on">上架</option>
                    <option value="off">下架</option>
                </select>
            </div>
        </div>
        <div class="news_content">
            <div class="title">
                <ul>
                    <li>圖片</li>
                    <li>內容</li>
                    <li>上傳時間</li>
                </ul>
            </div>
            <div class="content">
                <ul v-for="(item, index) in allBar" :key="index">
                    <label class="check"><input type="checkbox" v-model="item.select" /></label>
                    <li>
                        <div class="img">
                            <img class="image" :src="item.imageSrc" alt="" style="max-width: 520px; max-height: 400px;">
                        </div>
                        <div class="file_btn"><input type="file" @change="fileChange(index, $event)" ref="fileInput"
                                :disabled="item[0]"><button>新增圖片<i class="fa-solid fa-images"
                                    style="color: #5e7fb0;"></i></button></div>
                    </li>
                    <li>
                        <form action="test.aspx" method="get">
                            <textarea name="" id="" placeholder="標題" class="news_name" :disabled="item[0]">{{item.title}}</textarea>
                        </form>
                        <form action="test.aspx" method="get">
                            <textarea name="" id="" placeholder="內容" class="news_txt" :disabled="item[0]">{{item.content}}</textarea>
                        </form>
                    </li>
                    <li>
                        <div class="time">{{ getCurrentDate() }}</div>
                    </li>
                    <li>
                        <div class="state">
                            <select name="" id="" :disabled="item[0]">
                                <option value="">選擇分類</option>
                                <option value="performance">表演</option>
                                <option value="discount">優惠</option>
                                <option value="active">活動</option>
                            </select>
                            <div class="radio_onOff">
                                <label :for="'on_' + index">
                                    <input type="radio" :id="'on_' + index" :name="'select_onOff_' + index"
                                        :disabled="item[0]"  checked/>
                                    上架
                                </label>
                                <label :for="'off_' + index">
                                    <input type="radio" :id="'off_' + index" :name="'select_onOff_' + index"
                                        :disabled="item[0]" />
                                    下架
                                </label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button class="update" @click="updateNews(index, $event)">確認</button>
                    </li>
                </ul>
                <label><input type="checkbox" v-model="selectAll" class="selectAll" />全選({{
                    selectedCount
                }})</label>
                <span @click="deleteSelected" class="deleteSelect">刪除已選物品</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            imageSrc: '',
            allBar: [
                {
                    change_txt: true,
                    imageSrc: require("../../../public/all_images/news/beach_concert.jpg"),
                    title: "海灘跨年演唱會",
                    content:  "來自海灘的呼喚！讓我們一同迎接新的一年，沐浴在星光下，享受音樂和激情的交織。2022年的跨年夜，我們將在沙灘上舉行一場獨一無二的演唱會，為這個特殊的時刻帶來音樂的饗宴。",
                    date: "2022.12.31",
                    category: "活動",
                    isPublished: true,
                    select: false,
                }
            ],

        }
    },
    methods: {
        createNew() {
            const currentDate = this.getCurrentDate();
            this.allBar.push({
                change_txt: false,
                imageSrc: "",      // 圖片路徑
                title: "",      // 標題
                content: "",    // 内容
                date: currentDate, // 上傳時間
                category: "",   // 分類
                isPublished: true, // 默認上架
                select: false,
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
            return `${year}.${month.toString().padStart(2, '0')}.${day.toString().padStart(2, '0')}`;
        },
        fileChange(index, event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                this.allBar[index].imageSrc = reader.result; // 根据索引设置图像数据URL
            });
            if (file) {
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
}
</script>
<style scoped lang="scss">
.news_all {
    .select {
        display: flex;

        >div {
            margin: 0 1em;
        }
    }

    .news_content {
        .title {
            width: 100%;
            border-bottom: 1px solid #000;
            margin: 1em 0;

            ul {
                width: 90%;
                margin: auto;
                display: flex;
                justify-content: center;

                li {
                    width: 33.333333%;
                }
            }
        }

        .content {
            ul {
                width: 100%;
                display: flex;
                align-items: center;
                margin: 1rem 0;

                .check {
                    width: 5%;
                }

                li {
                    &:nth-of-type(1) {
                        width: 30%;

                    }

                    &:nth-of-type(2) {
                        width: 30%;
                        margin: auto;
                    }

                    &:nth-of-type(3) {
                        width: 15%;
                    }

                    &:nth-of-type(4) {
                        width: 15%;
                    }

                    &:nth-of-type(5) {
                        width: 5%;
                    }
                }

                textarea {
                    resize: none;
                    width: 90%;
                    box-sizing: border-box;
                    overflow: auto;
                }

                .news_name {
                    max-height: 30px;
                }

                .img {
                    width: 60%;
                    height: 100px;
                    border: 1px solid #000;
                    position: relative;

                    .fa-solid {
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        position: absolute;

                    }

                    .image {
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        inset: 0;
                    }
                }

                .radio_onOff {
                    width: 100%;

                    label {
                        display: block;
                        width: 100%;
                    }
                }
            }
        }
    }
}

.file_btn {
    width: 60%;
    position: relative;

    input[type="file"] {
        opacity: 0;
    }

    button {
        pointer-events: none;
        position: absolute;
        inset: 0;
    }
}</style>
