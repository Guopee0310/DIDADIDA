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
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</template>
<script>
export default {
    data() {
        return {

        };
    },
    computed: {},
    mounted() {
        fetch(`${this.$store.state.APIurl}activeMg.php`)
            .then(function (response) {
                return response.json();
            })

            .then((myJson) => {
                for (let i = 0; i < myJson.length; i++) {
                    myJson[i].banner_pic = require(`../../../public/all_images/banner/${myJson[i].banner_pic}`);
                    myJson[i].isDis = true;
                }
                this.bannerAll = myJson;
            });
    },
    methods: {
        createNew() {
            if (this.bannerAll.length >= 5) {
                alert("已達上限");
                return;
            } else {
                this.bannerAll.push(["", true]);
            }
        },
        delRow(item, index) {
            const formData = new FormData();
            let banner_id = this.bannerAll[index].banner_id;

            formData.append("banner_id", banner_id);

            fetch(`${this.$store.state.APIurl}activeMg.php`, {
                method: "POST",
                body: formData,
            }).then((res) => res.json());
            this.bannerAll.splice(index, 1);
        },
        updatePic(index, e) {
            if (e.target.innerText == "確認") {
                this.bannerAll[index].isDis = true;
                e.target.innerText = "修改";

                const formData = new FormData();
                let banner_id = this.bannerAll[index].banner_id;
                let banner_pic = this.bannerAll[index].banner_pic;

                formData.append("banner_id", banner_id);
                formData.append("banner_pic", banner_pic);
                // 使用fetch或axios將數據發送到PHP後端
                fetch(`${this.$store.state.APIurl}activeMg.php`, {
                    method: "post",
                    body: formData,
                })
                    .then((res) => res.json())
                    .then((result) => alert("圖片更新OK"));
                return;
            }
            this.bannerAll[index].isDis = false;
            e.target.innerText = "確認"
        },
        indexPlus(idx) {
            return (idx += 1);
        },
        getImagePath(index) {
            // 使用 require 导入图片，确保路径正确
            return require(`@/assets/images/bannerAll[${index}]`);
        },
        pushImg(e, index) {
            // console.log(e.target.files[0].name);
            // console.log(index);
            // this.bannerAll[
            //   index
            // ][0] = require(`../../assets/images/${e.target.files[0].name}`);
            // this.bannerAll[index][1] = true;

            let file = e.target.files[0];
            this.changePic = file;
            console.log("file", file);

            let readFile = new FileReader();
            readFile.readAsDataURL(file);
            readFile.addEventListener("load", function () {
                let image = new Image();
                image.src = readFile.result;
                console.log(image.src);
                image.style.width = "100%";
                image.style.height = "100%";
                document.querySelectorAll(".imgBox")[index].innerHTML = "";
                document.querySelectorAll(".imgBox")[index].appendChild(image);
            });
        },
    },
};
</script>
  
<style scoped lang="scss"></style>
  