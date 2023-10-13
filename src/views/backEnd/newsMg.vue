<template>
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
                    <li>消息編號/消息圖片</li>
                    <li>標題/內容</li>
                    <li>上傳時間</li>
                    <li>狀態</li>
                </ul>
            </div>
            <div class="content">
                <ul v-for="(item, index) in allnews" :key="index">
                    <li>
                        <div class="news_id">
                            {{ item.news_id }}
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <div class="picBox">
                                <img :src="`/all_images/news/${item.news_img}`"
                                    :alt="item.news_img ? item.news_img : '未選圖片'">
                            </div>

                            <div class="file_btn">
                                <input type="file" @change="fileChange($event, index)" :ref="'fileInput' + index"
                                    :disabled="item.disabled" name="image" :title="item.news_img">
                                <i class="fa-regular fa-trash-can" style="color: #ffffff;" @click="deleteImage(index)"
                                    v-if="!item.disabled && item.news_img"></i>
                            </div>
                        </div>
                        <p class="file_name">{{ item.news_img }}</p>

                    </li>
                    <li>
                        <textarea name="news_title" id="" placeholder="標題" class="news_name" :disabled="item.disabled"
                            v-model="item.news_title"></textarea>
                        <textarea name="news_conteny" id="" placeholder="內容" class="news_txt" :disabled="item.disabled"
                            v-model="item.news_content"></textarea>
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
                        </div>
                        <switchBtn :item="item.news_state" :index="index" v-model="item.news_state" :onText="'上架'" :offText="'下架'"
                            @toggle="updateNewsState" :disabled="item.disabled"></switchBtn>

                    </li>
                    <li>
                        <button class="update" @click="updateNews(index, $event, item)" v-if="item.exist">{{ item.disabled ?
                            '修改' : '確認'
                        }}</button>

                        <button class="insert" @click="createNew(index, $event, item)" v-if="!item.exist">新增</button>
                        <button class="insert" @click="deleteNews(index)" v-if="!item.exist">取消</button>
                    </li>
                </ul>
            </div>
            <div class="news_count">總共有{{ newsCount }}件消息</div>
        </div>
    </div>
</template>

<script>
import switchBtn from '../../components/backComponents/toggleBtn.vue'
export default {
    data() {
        return {
            allnews: [],
        }
    },
    components: {
        switchBtn,
    },
    mounted() {
        fetch(`${this.$store.state.APIurl}newsSelect.php`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then((myJson) => {
                for (let i = 0; i < myJson.length; i++) {
                    myJson[i].disabled = true;
                    myJson[i].exist = true;
                }
                this.allnews = myJson;
                console.log(this.allnews);
            })
            .catch((error) => {
                console.error('Fetch error:', error);
            });
    },
    methods: {
        //上下架
        updateNewsState(index, state) {
            this.allnews[index].news_state = state;
        },

        deleteNews(index) {
            if (confirm("取消此筆新增嗎?")) {
                this.allnews.splice(index, 1);
            }
        },
        deleteImage(index) {
            const item = this.allnews[index];

            if (confirm("確定刪除圖片嗎？")) {

                document.querySelectorAll(".picBox img")[index].src = "";
                item.news_img = ''; 
                alert("圖片已成功刪除");


            }
        },


        fileChange(e, index) {
            this.changePic = "";
            let file = e.target.files[0];
            this.changePic = file;
            console.log("file", file);

            let readFile = new FileReader();
            readFile.readAsDataURL(file);
            readFile.addEventListener("load", () => {
                let image = new Image();
                image.src = readFile.result;
                console.log(image.src);
                image.style.width = "100%";
                image.style.height = "100%";
                document.querySelectorAll(".picBox")[index].innerHTML = "";
                document.querySelectorAll(".picBox")[index].appendChild(image);

                // 检查Base64图像数据是否有效
                this.checkBase64Image(image.src, index);
            });
        },


        checkBase64Image(src, index) {
            const img = new Image();
            img.src = src;

            img.onload = () => {
                // Base64图像数据有效
                alert("圖片新增成功");

                this.allnews[index].news_img = src;
            };

            img.onerror = () => {
                // Base64图像数据无效
                alert("圖片新增失敗");

                // 清除图像显示
                document.querySelectorAll(".picBox img")[index].src = "";

                // 清除文件输入的值
                const fileInput = this.$refs['fileInput' + index];
                if (fileInput) {
                    fileInput.value = '';
                }
            };
        },




        updateNews(index, e, item) {
            if (e.target.innerText === "確認") {
                if (!item.news_title || !item.news_content) {
                    alert("請將標題和內容填滿");
                    return;
                } else if (!item.news_category) {
                    alert("請選擇分類");
                    return;
                } else if (this.changePic) { // 检查是否选择了新图片
                    const formData = new FormData();
                    let news_id = item.news_id;
                    let news_title = item.news_title;
                    let news_content = item.news_content;
                    let news_date = item.news_date;
                    let news_category = item.news_category;
                    let news_state = item.news_state;

                    formData.append("news_id", news_id);
                    formData.append("news_title", news_title);
                    formData.append("news_content", news_content);
                    formData.append("news_date", news_date);
                    formData.append("news_category", news_category);
                    formData.append("news_state", news_state);
                    formData.append("image", this.changePic);

                    fetch(`${this.$store.state.APIurl}news.php`, {
                        method: "POST",
                        body: formData,
                    })
                        .then((res) => res.json())
                        .then((result) => {
                            alert("更新成功");
                            // 重新取資料
                            this.refreshNewsData();
                            this.changePic = "";
                        });
                } else {
                    // 如果没有选择新图片，只更新其他信息
                    const formData = new FormData();
                    let news_id = item.news_id;
                    let news_title = item.news_title;
                    let news_content = item.news_content;
                    let news_date = item.news_date;
                    let news_category = item.news_category;
                    let news_state = item.news_state;

                    formData.append("news_id", news_id);
                    formData.append("news_title", news_title);
                    formData.append("news_content", news_content);
                    formData.append("news_date", news_date);
                    formData.append("news_category", news_category);
                    formData.append("news_state", news_state);

                    fetch(`${this.$store.state.APIurl}news.php`, {
                        method: "POST",
                        body: formData,
                    })
                        .then((res) => res.json())
                        .then((result) => {
                            alert("更新成功");
                            // 重新取資料
                            this.refreshNewsData();
                            this.changePic = "";
                        });
                }
            } else {
                this.allnews[index].disabled = false;
                e.target.innerText = "確認";
            }
        },


        news_content() {
            //上傳時間
            const currentDate = new Date();
            const year = currentDate.getFullYear();
            const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
            const day = currentDate.getDate().toString().padStart(2, '0');
            const formattedDateTime = `${year}-${month}-${day}`;

            this.allnews.push({
                news_id: this.allnews.length + 1,
                news_title: "",
                news_img: "",
                news_content: "",
                news_date: formattedDateTime,
                news_category: "",
                news_state: "1",
                disabled: false,
                exist: false,
            });
        },
        createNew(index, e, item) {
            if (e.target.innerText == "新增") {
                if (!item.news_title || !item.news_content) {
                    alert("請將標題和內容填滿");
                    return;
                }
                else if (!this.changePic) {
                    alert("請選擇圖片");
                    return;
                }
                else if (!item.news_category) {
                    alert("請選擇分類");
                    return;
                }



                const formData = new FormData();
                let news_id = item.news_id;
                let news_title = item.news_title;
                let news_content = item.news_content;
                let news_date = item.news_date;
                let news_category = item.news_category;
                let news_state = item.news_state;

                formData.append("news_id", news_id);
                formData.append("news_title", news_title);
                formData.append("news_content", news_content);
                formData.append("news_date", news_date);
                formData.append("news_category", news_category);
                formData.append("news_state", news_state);
                formData.append("image", this.changePic);

                this.allnews[index].disabled = true;

                fetch(`${this.$store.state.APIurl}newsInsert.php`, {
                    method: "POST",
                    body: formData,
                })
                    .then((res) => res.json())
                    .then((result) => {
                        alert("新增成功");
                        // 重新獲取資料
                        this.refreshNewsData();
                    })
                return;


            }
        },
        refreshNewsData() {
            fetch(`${this.$store.state.APIurl}newsSelect.php`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then((myJson) => {
                    for (let i = 0; i < myJson.length; i++) {
                        myJson[i].disabled = true;
                        myJson[i].exist = true;
                    }
                    this.allnews = myJson;
                    console.log(this.allnews);
                })
                .catch((error) => {
                    console.error('Fetch error:', error);
                    // 在这里可以添加适当的错误处理逻辑，例如显示错误消息给用户
                });
        },


    },


    computed: {

        newsCount() {
            return this.allnews.length;
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
                width: 100%;
                margin: auto;
                display: flex;

                li {
                    &:nth-of-type(1) {
                        width: 35%;
                        text-align: center;
                    }

                    &:nth-of-type(2) {
                        width: 30%;
                        text-align: center;
                    }

                    &:nth-of-type(3) {
                        width: 10%;
                        text-align: center;
                    }

                    &:nth-of-type(4) {
                        width: 25%;
                        padding-left: 2.6rem;
                    }
                }
            }
        }

        .content {
            ul {
                width: 100%;
                display: flex;
                align-items: center;
                margin: 1rem 0;

                li {
                    &:nth-of-type(1) {
                        width: 5%;
                        text-align: center;
                    }

                    &:nth-of-type(2) {
                        width: 30%;

                        p {
                            width: 100%;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }
                    }

                    &:nth-of-type(3) {
                        text-align: center;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-evenly;
                        width: 30%;
                        height: 12rem;
                    }

                    &:nth-of-type(4) {
                        width: 10%;
                    }

                    &:nth-of-type(5) {
                        width: 15%;
                        height: 10rem;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-evenly;

                        select {
                            width: 100%;
                        }
                    }

                    &:nth-of-type(6) {
                        width: 10%;
                        text-align: center;
                    }
                }

                textarea {
                    width: 90%;
                    height: 8rem;
                    margin: auto;
                    box-sizing: border-box;
                    overflow: auto;
                    padding: 0.2rem 0.5rem;
                    line-height: 1.5rem;
                }

                .news_name {
                    max-height: 30px;
                }

                .img {
                    width: 90%;
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

            }
        }
    }

    //內容end
    .news_count {

        border-top: 1px solid #3f3636;
        text-align: right;
        font-size: 14px;
    }
}
</style>
