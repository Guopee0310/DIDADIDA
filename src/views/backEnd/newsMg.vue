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
                        <div class="img"><i class="fa-solid fa-images" style="color: #5e7fb0;"></i><input type="file"></div>
                    </li>
                    <li>
                            <form action="test.aspx" method="get">
                                <textarea name="" id="" placeholder="標題" class="news_name"></textarea>
                            </form>
                            <form action="test.aspx" method="get">
                                <textarea name="" id="" placeholder="內容" class="news_txt"></textarea>
                            </form>
                    </li>
                    <li>
                        <div class="time">{{ getCurrentDate() }}</div>
                    </li>
                    <li>
                        <div class="state">
                            <select name="" id="">
                                <option value="">選擇分類</option>
                            </select>
                            <div class="radio_onOff">
                                <label for="on"> <input type="radio" id="on" name="select_onOff" />
                                    上架</label>
                                <label for="off"><input type="radio" id="off" name="select_onOff" />
                                    下架</label>
                            </div>
                        </div>
                    </li>
                    <li><input type="submit" value="確認"></li>
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
            allBar: [
                {
                    image: "",
                    title: "",
                    content: "",
                    date: "2023.09.26",
                    category: "",
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
                image: "",      // 圖片路徑
                title: "",      // 標題
                content: "",    // 内容
                date: currentDate, // 上傳時間
                category: "",   // 分類
                isPublished: true, // 默認上架
                select: false,
            });
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
        >div{
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

                .check {
                    width: 5%;
                }

                li {
                    &:nth-child(1) {
                        width: 10%;
                    }

                    &:nth-child(2) {
                        width: 30%;

                    }

                    &:nth-child(3) {
                        width: 30%;
                    }

                    &:nth-child(4) {
                        width: 15%;
                    }

                    &:nth-child(5) {
                        width: 15%;
                    }
                }

                textarea {
                    resize: none;
                    width: 90%;
                    box-sizing: border-box;
                    overflow: auto;
                }
                .news_name{
                    max-height: 30px;
                }
                .img{
                            width: 60%;
                            height: 100px;
                            background-color: #c5b4b4;
                            position: relative;
                            input{
                                width: 100%;
                                height: 100%;
                                opacity: 0;

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
}</style>
