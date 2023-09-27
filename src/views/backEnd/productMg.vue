<template>
    <div class="prod_all">
        <div class="select">
            <div class="add" @click="createNew">
                <button>+新增項目</button>
            </div>
            <div class="search">
                <input type="searchbar" placeholder="商品查詢"><i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div class="prod_content">
            <div class="title">
                <ul>
                    <li>商品圖片</li>
                    <li>種類</li>
                    <li>商品名稱</li>
                    <li>價格</li>
                    <li>商品描述</li>
                </ul>
            </div>
            <div class="content">
                <ul v-for="(item, index) in allBar" :key="index">
                    <label class="check"><input type="checkbox" v-model="item.select" /></label>
                    <li>
                        <div class="img">
                            <img class="image" :src="item.imageSrc" alt="">
                        </div>
                        <div class="file_btn"><input type="file" @change="fileChange(index, $event)" ref="fileInput"
                                :disabled="item[0]"><button>新增圖片<i class="fa-solid fa-images"
                                    style="color: #5e7fb0;"></i></button></div>
                    </li>
                    <!-- 種類 -->
                    <li>

                        <select name="" id="" :disabled="item[0]">
                            <option value="">選擇分類</option>
                            <option value="performance">抱枕</option>
                            <option value="discount">玩偶</option>
                            <option value="active">配飾</option>
                        </select>
                    </li>
                    <!-- 商品名稱 -->
                    <li>
                        <form action="test.aspx" method="get">
                            <textarea name="" id="" placeholder="商品名稱" class="prod_name"
                                :disabled="item[0]">{{ item.prod_name }}</textarea>
                        </form>
                    </li>
                    <!-- 價格 -->
                    <li>
                        <!-- <form action="test.aspx" method="get">
                            <textarea name="" id="" placeholder="標題" class="prod_name"
                                :disabled="item[0]">{{ item.price }}</textarea>
                                NT
                        </form> -->
                        <label for="price">
                            <input type="number" :disabled="item[0]" v-model="item.price">NT
                        </label>
                    </li>
                    <!-- 商品描述 -->
                    <li>
                        <form action="test.aspx" method="get">
                            <textarea name="" id="" placeholder="商品描述" class="news_txt"
                                :disabled="item[0]">{{ item.prod_detail }}</textarea>
                        </form>
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
                    select:false,
                    change_txt: true,
                    imageSrc: require("../../../src/assets/images/dolphin_doll.png"),
                    category: "玩偶",
                    prod_name: "超可愛海豚寶寶玩偶",
                    price: "399",
                    category: "活動",
                    prod_detail: "超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹",
                }
            ],

        }
    },
    methods: {
        createNew() {
            const currentDate = this.getCurrentDate();
            this.allBar.push({
                change_txt: true,
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
            return `${year}.${month.toString().padStart(2, '0')}.${day.toString().padStart(2, '0')}`;
        },

        fileChange(index, event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                this.allBar[index].imageSrc = reader.result; // 根據索引設置圖像數據URL
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
.prod_all {
    .select {
        display: flex;

        >div {
            margin: 0 1em;
        }
    }

    .prod_content {
        .title {
            width: 100%;
            border-bottom: 1px solid #000;
            margin: 1em 0;

            ul {
                width: 100%;
                margin: auto;
                display: flex;
                text-align: center;

                li {
                    width: 16.666666%;
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
                    width: 2%;
                }

                li {
                    &:nth-of-type(1) {
                        width: 18%;

                    }

                    &:nth-of-type(2) {
                        width: 13%;
                        text-align: center;
                    }

                    &:nth-of-type(3) {
                        width: 20%;
                    }

                    &:nth-of-type(4) {
                        width: 17%;
                        input[type="number"]{
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

                textarea {
                    resize: none;
                    width: 90%;
                    box-sizing: border-box;
                    overflow: auto;
                }


                .img {
                    width: 100%;
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
    width: 100%;
    position: relative;

    input[type="file"] {
        opacity: 0;
    }

    button {
        pointer-events: none;
        position: absolute;
        inset: 0;
    }
}
</style>
