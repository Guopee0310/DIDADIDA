<template>
    <div class="select">
        <div class="add" @click="news_content">
            <button>+新增項目</button>
        </div>
    </div>

    <table>
        <tr>
            <th>圖片</th>
            <th>標題/內容</th>
            <th>上傳時間</th>
            <th>編輯</th>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" name="" id=""> <input type="text"></td>
            <td><input type="date"></td>
            <td>
                <button>修改</button>
            </td>
        </tr>
    </table>
</template>
<!-- <template>
    <div class="news_all">
        <div class="select">
            <div class="add" @click="news_content">
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
                <ul v-for="(item, index) in allactive" :key="index">
                    <label class="check"><input type="checkbox" v-model="item.select" /></label>
                    <li>
                        <div class="img">
                            <div class="picBox">
                                <img :src="'../all_images/news/' + item.news_img" alt="未選擇圖片">
                            </div>

                            <div class="file_btn">
                                <input type="file" @change="fileChange($event, index)" ref="fileInput"
                                    :disabled="item.disabled" name="news_img" :title="item.news_img">
                                <i class="fa-regular fa-trash-can" style="color: #ffffff;" @click="deleteImage(index)"
                                    v-if="!item.disabled && item.news_img"></i>
                            </div>
                        </div>
                        <p class="file_name">{{ item.news_img }}</p>

                    </li>
                    <li>
                        <form action="test.aspx" method="post">
                            <textarea name="news_title" id="" placeholder="標題" class="news_name" :disabled="item.disabled"
                                v-model="item.news_title"></textarea>
                        </form>
                        <form action="test.aspx" method="post">
                            <textarea name="news_conteny" id="" placeholder="內容" class="news_txt" :disabled="item.disabled"
                                v-model="item.news_content"></textarea>
                        </form>
                    </li>
                    <li>
                        <div class="time" name="news_date">{{ item.news_date }}</div>
                    </li>
                    <li>
                        <div class="state">
                            <select name="news_state" id="" v-model="item.news_category" :disabled="item.disabled">
                                <option value="">選擇分類</option>
                                <option value="表演">表演</option>
                                <option value="優惠">優惠</option>
                                <option value="活動">活動</option>
                            </select>
                            <div class="radio_onOff">
                                <label :for="'on_' + index">
                                    <input type="radio" :id="'on_' + index" :name="'select_onOff_' + index"
                                        :disabled="item.disabled" v-model="item.news_state" value="0" />
                                    上架
                                </label>
                                <label :for="'off_' + index">
                                    <input type="radio" :id="'off_' + index" :name="'select_onOff_' + index"
                                        :disabled="item.disabled" v-model="item.news_state" value="1" />
                                    下架
                                </label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button class="update" @click="updateNews(index, $event, item)" v-if="item.exist">{{ item.disabled ?
                            '修改' : '確認'
                        }}</button>

                        <button class="insert" @click="createNew(index, $event, item)" v-if="!item.exist">新增</button>
                        <button class="insert" @click="deleteNews(index)" v-if="!item.exist">刪除</button>
                    </li>
                </ul>
                <label><input type="checkbox" v-model="selectAll" class="selectAll" />全選({{
                    selectedCount
                }})</label>
                <span @click="delete" class="deleteSelect">刪除已選物品</span>
            </div>
        </div>
    </div>
</template> -->
<script>
export default {
    data() {
        return {
            allactive: [],
        }
    },
    mounted() {

    },
    methods: {

    },


    computed: {


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

                        p {
                            width: 80%;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }
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
                    width: 90%;
                    box-sizing: border-box;
                    overflow: auto;
                }

                .news_name {
                    max-height: 30px;
                }

                .img {
                    width: 80%;
                    aspect-ratio: 1/0.7;
                    position: relative;


                    .picBox {
                        position: absolute;
                        width: 100%;
                        height: 100%;

                        img {
                            width: 100%;
                            height: 100%;


                            &::after {
                                width: 100%;
                                height: 100%;
                                content: "\e09a\A" attr(alt);
                                font-size: 1rem;
                                font-family: FontAwesome;
                                color: rgb(100, 100, 100);
                                background-color: #c2baba;
                                position: absolute;
                                inset: 0;
                                z-index: 2;
                                pointer-events: none;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                white-space: pre;
                                text-align: center;
                            }
                        }
                    }


                    .file_btn {
                        width: 100%;
                        height: 100%;
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        i {
                            width: 100%;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            position: absolute;
                            inset: 0;
                            opacity: 0;
                            z-index: 4;
                            font-size: 1.5rem;

                            &:hover {
                                opacity: 1;
                                background-color: rgba(0, 0, 0, 0.4);
                                transition: all .3s;

                            }
                        }



                        input[type="file"] {
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            inset: 0;
                            opacity: 0;
                            font-size: 0;
                            cursor: pointer;
                        }

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
</style>
  