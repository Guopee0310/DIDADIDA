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
                    <li>圖片</li>
                    <li>內容</li>
                    <li>上傳時間</li>
                </ul>
            </div>
            <div class="content">
                <ul v-for="(item, index) in allnews" :key="index">
                    <label class="check"><input type="checkbox" v-model="item.select" /></label>
                    <li>
                        <div class="img">
                            <div class="picBox">
                                <img :src="'../all_images/news/' + item.news_img" alt="未選擇圖片">
                            </div>

                            <div class="file_btn">
                                <input type="file" @change="fileChange($event, index)" ref="fileInput"
                                    :disabled="item.disabled" name="image" :title="item.news_img">
                                <i class="fa-regular fa-trash-can" style="color: #ffffff;" @click="deleteImage(index)"
                                    v-if="!item.disabled && item.news_img"></i>
                            </div>
                        </div>
                        <p class="file_name">{{ item.news_img }}</p>

                    </li>
                    <li>
                        <form action="test.aspx" method="post">
                            <textarea name="news_title" id="" placeholder="標題" class="news_name" :disabled="item.disabled"
                                v-model="item.news_title" required></textarea>
                        </form>
                        <form action="test.aspx" method="post">
                            <textarea name="news_conteny" id="" placeholder="內容" class="news_txt" :disabled="item.disabled"
                                v-model="item.news_content" required></textarea>
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
                <span @click="deleteNews" class="deleteSelect">刪除已選物品</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            allnews: [],
            allBar: [
                {
                    change_txt: true,
                    imageSrc: require("../../../public/all_images/news/beach_concert.jpg"),
                    imageName: "beach_concert.jpg",
                    title: "海灘跨年演唱會",
                    content: "來自海灘的呼喚！讓我們一同迎接新的一年，沐浴在星光下，享受音樂和激情的交織。2022年的跨年夜，我們將在沙灘上舉行一場獨一無二的演唱會，為這個特殊的時刻帶來音樂的饗宴。",
                    date: "2022.12.31",
                    category: "活動",
                    isPublished: true,
                    select: false,
                }
            ],

        }
    },
    mounted() {
        fetch("http://localhost/dida_project/public/php/newsSelect.php")
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
    methods: {
        deleteNews(index) {
            if (confirm("取消此筆新增嗎?")) {
                this.allnews.splice(index, 1);
            }
        },
        deleteImage(index) {
            const item = this.allnews[index];

            if (confirm("確定刪除圖片嗎？")) {
                // Update the property directly
                item.news_img = ''; // 清除图像路径
                alert("圖片已成功刪除");

                // 清除文件输入的值
                const fileInput = this.$refs.fileInput[index];
                if (fileInput) {
                    fileInput.value = '';
                }

                // 更新<img>标签的src属性
                const imageElement = document.querySelector(`#image_${index}`);
                if (imageElement) {
                    imageElement.src = ''; // 将图像源设置为空
                }
            }
        },





        fileChange(e, index) {
            let file = e.target.files[0];
            this.imageSrc = file;
            console.log("file", file);

            let self = this; // 保存 Vue 组件的上下文

            let readFile = new FileReader();
            readFile.readAsDataURL(file);
            readFile.addEventListener("load", function () {
                let image = new Image();
                image.src = readFile.result;
                image.style.width = "100%";
                image.style.height = "100%";
                document.querySelectorAll(".picBox")[index].innerHTML = "";
                document.querySelectorAll(".picBox")[index].appendChild(image);

                // 使用保存的上下文访问 this.allnews
                self.allnews[index].news_img = image.src;
            });
        },


        updateNews(index, e, item) {
            if (e.target.innerText === "確認") {
                if (!item.news_title || !item.news_content) {
                    alert("請將標題和內容填滿");
                    return;
                } else if (!item.news_category) {
                    alert("請選擇分類");
                    return;
                }
                else if (!item.news_img) {
                    alert("請選擇圖片");
                    return;
                }

                const formData = new FormData();
                let news_id = item.news_id;
                let news_title = this.allnews[index].news_title;
                let news_content = this.allnews[index].news_content;
                let news_date = this.allnews[index].news_date;
                let news_category = this.allnews[index].news_category;
                let news_state = this.allnews[index].news_state;

                formData.append("news_id", news_id);
                formData.append("news_title", news_title);
                formData.append("news_content", news_content);
                formData.append("news_date", news_date);
                formData.append("news_category", news_category);
                formData.append("news_state", news_state);
                formData.append("image", this.imageSrc);

                fetch(`${this.$store.state.APIurl}news.php`, {
                    method: "POST",
                    body: formData,
                })
                    .then((res) => res.json())
                    .then((result) => {
                        alert("更新成功");
                        // 重新取資料
                        this.refreshNewsData();
                        this.imageSrc = '';
                    });
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
                news_state: "",
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
                else if (!this.imageSrc) {
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
                formData.append("image", this.imageSrc);

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
            fetch("http://localhost/dida_project/public/php/newsSelect.php")
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
                                content:  "\e09a\A" attr(alt);
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
