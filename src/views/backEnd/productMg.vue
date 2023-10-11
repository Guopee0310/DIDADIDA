<template>
    <div class="prod_all">
        <div class="select">
            <div class="add" @click="news_content">
                <button>+新增項目</button>
            </div>
            <div class="search">
                <input type="search" placeholder="商品查詢"><button>搜尋</button>
            </div>
        </div>
        <div class="prod_content">
            <div class="title">
                <ul>
                    <li>商品編號/商品圖片</li>
                    <li>種類/商品名稱</li>
                    <li>價格</li>
                    <li>商品描述</li>
                    <li>狀態</li>
                </ul>
            </div>
            <div class="content">
                <ul v-for="(item, index) in allProduct" :key="index">
                    <li>{{ item.prod_id }}</li>
                    <li>
                        <div class="img">
                            <div class="picBox">
                                <img :src="'../all_images/product/' + item.prod_img"
                                    :alt="item.prod_img ? item.prod_img : '未選擇圖片'">
                            </div>

                            <div class="file_btn">
                                <input type="file" @change="fileChange($event, index)" :ref="'fileInput' + index"
                                    :disabled="item.disabled" name="image" :title="item.prod_img">
                            </div>
                        </div>
                        <p>{{ item.prod_img }}</p>
                    </li>
     
            
                    <!-- 商品名稱/種類 -->
                    <li>
                        <select name="" id="" v-model="item.prod_category" :disabled="item.disabled">
                            <option value="">選擇分類</option>
                            <option value="抱枕">抱枕</option>
                            <option value="玩偶">玩偶</option>
                            <option value="配飾">配飾</option>
                        </select>
                        <textarea name="" id="" placeholder="商品名稱" class="prod_name" :disabled="item.disabled"
                            v-model="item.prod_name"></textarea>
                    </li>
                    <!-- 價格 -->
                    <li>
                        <label for="price">
                            <input type="number" :disabled="item.disabled" v-model="item.prod_price" min="100" placeholder="價錢">NT
                        </label>
                    </li>
                    <!-- 商品描述 -->
                    <li>
                        <textarea name="" id="" placeholder="商品描述" class="news_txt" :disabled="item.disabled"
                            v-model="item.prod_info"></textarea>
                    </li>
                    <li>
                        <div class="radio_onOff">
                        <label :for="'on_' + index">
                            <input type="radio" :id="'on_' + index" :name="'select_onOff_' + index"
                                :disabled="item.disabled" v-model="item.prod_listed" value="1" />
                            上架
                        </label>
                        <label :for="'off_' + index">
                            <input type="radio" :id="'off_' + index" :name="'select_onOff_' + index"
                                :disabled="item.disabled" v-model="item.prod_listed" value="0" />
                            下架
                        </label>
                    </div>
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
            <div class="prod_count">總共有{{ prodCount}}件商品</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            allProduct: [],
            allBar: [
                {
                    // select: false,
                    // change_txt: true,
                    // imageName: "dolphin_doll.png",
                    // imageSrc: require("../../../src/assets/images/dolphin_doll.png"),
                    // category: "玩偶",
                    // prod_name: "超可愛海豚寶寶玩偶",
                    // price: "399",
                    // category: "活動",
                    // prod_detail: "超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹超可愛海豚寶寶玩偶的介紹",
                }
            ],

        }
    },
    mounted() {
        fetch("http://localhost/dida_project/public/php/productSelect.php")
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
                this.allProduct = myJson;
                console.log(this.allProduct);
            })
            .catch((error) => {
                console.error('Fetch error:', error);
                // 在这里可以添加适当的错误处理逻辑，例如显示错误消息给用户
            });
    },
    methods: {
        deleteNews(index) {
            if (confirm("取消此筆新增嗎?")) {
                this.allProduct.splice(index, 1);
            }
        },
        news_content() {
            //上傳時間
            const currentDate = new Date();
            const year = currentDate.getFullYear();
            const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
            const day = currentDate.getDate().toString().padStart(2, '0');
            const formattedDateTime = `${year}-${month}-${day}`;

            this.allProduct.push({
                prod_id: this.allProduct.length + 1,
                prod_name: "",
                prod_price: "",
                prod_info: "",
                prod_date: formattedDateTime,
                prod_listed: "1",
                prod_category: "",
                prod_img: "",
                disabled: false,
                exist: false,
            });
        },
        createNew(index, e, item) {
            if (e.target.innerText == "新增") {
                if (!item.prod_name || !item.prod_info) {
                    alert("請將商品名和描述填滿");
                    return;
                }
                else if (!this.changePic) {
                    alert("請選擇圖片");
                    return;
                }
                else if (!item.prod_category) {
                    alert("請選擇分類");
                    return;
                }
                else if (!item.prod_price&&item.prod_price<=0) {
                    alert("價錢為必填且需大於100");
                    return;
                }



                const formData = new FormData();
                let prod_id = item.prod_id;
                let prod_name = item.prod_name;
                let prod_price = item.prod_price;
                let prod_info = item.prod_info;
                let prod_listed = item.prod_listed;
                let prod_category = item.prod_category;
                let prod_date = item.prod_date;

                formData.append("prod_id", prod_id);
                formData.append("prod_name", prod_name);
                formData.append("prod_price", prod_price);
                formData.append("prod_info", prod_info);
                formData.append("prod_listed", prod_listed);
                formData.append("prod_category", prod_category);
                formData.append("prod_date", prod_date);
                formData.append("image", this.changePic);

                this.allProduct[index].disabled = true;

                fetch(`${this.$store.state.APIurl}productInsert.php`, {
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
            fetch("http://localhost/dida_project/public/php/productSelect.php")
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
                    this.allProduct = myJson;
                    console.log(this.allProduct);
                })
                .catch((error) => {
                    console.error('Fetch error:', error);
                    // 在这里可以添加适当的错误处理逻辑，例如显示错误消息给用户
                });
        },
        fileChange(e, index) {
            this.changePic="";
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

                this.allProduct[index].prod_img = src;
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
                if (!item.prod_name || !item.prod_info) {
                    alert("請將商品名和描述填滿");
                    return;
                }
                else if (!item.prod_category) {
                    alert("請選擇分類");
                    return;
                }
                else if (!item.prod_price&&item.prod_price<=0) {
                    alert("價錢為必填且需大於0");
                    return;
                } else if (this.changePic) { // 检查是否选择了新图片
                    const formData = new FormData();
                    let prod_id = item.prod_id;
                    let prod_name = item.prod_name;
                    let prod_price = item.prod_price;
                    let prod_info = item.prod_info;
                    let prod_listed = item.prod_listed;
                    let prod_category = item.prod_category;
                    let prod_date = item.prod_date;

                    formData.append("prod_id", prod_id);
                    formData.append("prod_name", prod_name);
                    formData.append("prod_price", prod_price);
                    formData.append("prod_info", prod_info);
                    formData.append("prod_listed", prod_listed);
                    formData.append("prod_category", prod_category);
                    formData.append("prod_date", prod_date);
                    formData.append("image", this.changePic);

                    fetch(`${this.$store.state.APIurl}productUpdate.php`, {
                        method: "POST",
                        body: formData,
                    })
                        .then((res) => res.json())
                        .then((result) => {
                            alert("更新成功");
                            // 重新取資料
                            this.refreshNewsData();
                            this.changePic="";
                        });
                } else {
                    // 如果没有选择新图片，只更新其他信息
                    const formData = new FormData();
                    let prod_id = item.prod_id;
                    let prod_name = item.prod_name;
                    let prod_price = item.prod_price;
                    let prod_info = item.prod_info;
                    let prod_listed = item.prod_listed;
                    let prod_category = item.prod_category;
                    let prod_date = item.prod_date;


                    formData.append("prod_id", prod_id);
                    formData.append("prod_name", prod_name);
                    formData.append("prod_price", prod_price);
                    formData.append("prod_info", prod_info);
                    formData.append("prod_listed", prod_listed);
                    formData.append("prod_category", prod_category);
                    formData.append("prod_date", prod_date);

                    fetch(`${this.$store.state.APIurl}productUpdate.php`, {
                        method: "POST",
                        body: formData,
                    })
                        .then((res) => res.json())
                        .then((result) => {
                            alert("更新成功");
                            // 重新取資料
                            this.refreshNewsData();
                            this.changePic="";
                        });
                }
            } else {
                this.allProduct[index].disabled = false;
                e.target.innerText = "確認";
            }
        },



    },
    computed: {
        prodCount() {
            return this.allProduct.length;
        },
    },
}
</script>
<style scoped lang="scss">
.prod_all {
    .select {
        display: flex;
        justify-content: space-between;

        .search {
            input[type="searchbar"] {
                border-radius: 1rem;
                outline: none;
                border: 1px solid #b7b7b7;
                padding: 3px;
                margin-right: 10px;
            }
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
                    &:nth-of-type(1) {
                        width: 25%;

                    }

                    &:nth-of-type(2) {
                        width: 20%;
                    }

                    &:nth-of-type(3) {
                        width: 15%;
            
                    }

                    &:nth-of-type(4) {
                        width: 20%;
                    }

                    &:nth-of-type(5) {
                        width: 10%;
                        
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
                        width: 7%;
                        text-align: center;

                    }

                    &:nth-of-type(2) {
                        width: 18%;
                        text-align: center;
                    }

                    &:nth-of-type(3) {
                        width: 20%;
                        height: 10rem;
                        text-align: center;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-evenly;
                        padding: 1rem;
            
                    }

                    &:nth-of-type(4) {
                        width: 15%;
                        text-align: center;

                        input[type="number"] {
                            width: 70%;
                        }
                    }

                    &:nth-of-type(5) {
                        width: 20%;
                        height: 10rem;
                        textarea{
                            height: 90%;
                        }
                    }

                    &:nth-of-type(6) {
                        width: 10%;
                    }
                    &:nth-of-type(7) {
                        width: 10%;
                        text-align: center;
                    }
                }

                textarea {
                    // resize: none;
                    width: 100%;
                    box-sizing: border-box;
                    overflow: auto;
                    padding: 0.1rem;
                    line-height: 1.5rem;
                }


                .img {
                    width: 100%;
                    aspect-ratio: 1/1;
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
                    text-align: center;

                    label {
                        display: block;
                        width: 100%;
                    }
                }
            }
        }
    }//商品內容end
    .prod_count{

        border-top: 1px solid #3f3636;
        text-align: right;
        font-size: 14px;
    }
}
</style>
