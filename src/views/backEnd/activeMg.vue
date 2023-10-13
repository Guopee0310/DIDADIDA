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
            <th>開始/結束時間</th>
            <th>編輯</th>
        </tr>
        <tr v-for="(item, index) in allactive" :key="index">
            <td>
                <div class="picBox">
                    <img :src="'../all_images/news/' + item.active_img" :alt="item.active_img ? item.active_img : '未選圖片'">
                </div>
                <input type="file" accept="image/*,.jpg" @change="fileChange($event, index)" :ref="'fileInput' + index"
                    :disabled="item.disabled" name="image" :title="item.active_img">
            </td>
            <td>
                標題:<input type="text" v-model="item.actvie_title"><br>
                內容:<input type="text" v-model="item.active_content">
            </td>
            <td>{{ item.active_date }}</td>
            <td>
                開始時間:<input type="date"><br>
                結束時間:<input type="date">
            </td>
            <td>
                <button>修改</button><br>
                <button>刪除</button>
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
        news_content() {
            //上傳時間
            const currentDate = new Date();
            const year = currentDate.getFullYear();
            const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
            const day = currentDate.getDate().toString().padStart(2, '0');
            const formattedDateTime = `${year}-${month}-${day}`;

            this.allactive.push({
                active_id: this.allactive.length + 1,
                active_title: "",
                active_img: "",
                active_content: "",
                active_date: formattedDateTime,
                active_category: "",
                active_state: "",
                active_star: "",
                active_end: "",
                disabled: false,
                exist: false,
            });
        },
        fileChange(e, index) {
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
                // this.checkBase64Image(image.src, index);
            });
        },
    },


    computed: {


    },
}
</script>
  
<style scoped lang="scss">
table {
    width: 100%;
    margin: 10px 0;

    tr {
        border-bottom: 1px solid black;
        text-align: left;

        td {
            padding: 15px 0;
            line-height: 3;
        }
    }


}
</style>
  