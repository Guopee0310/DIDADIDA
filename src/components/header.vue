<template>
  <div class="wrap">
        <div id="app">
            <div class="header">
                <div class="logo">
                    <a href="index.html">
                        <img src="../assets/images/dida_logo.png">
                    </a>
                </div>
                <!-- <img src="../assets/images/購物車.png" alt=""> -->
                <nav class="main-nav">

            
                    <a :href="page.link" v-for="page in nav" :key="nav.name">{{page.name}}</a>
                    <a :href="link.link" v-for="link in icon"><span v-html="link.imgSrc"></span></a>



                    <select v-model="selectName">
                    
                        <option v-for="item in language" :value="item.option">{{item.option}}</option>
                    </select>
                </nav>



            </div>
           
            <!-- <a href="#" class="Smart">
                <img src="imgs/問號.png" alt="智能小幫手">
            </a> -->

        </div>
    </div>
</template>
  
<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
    name: 'HomeView',
    components: {
        
    },
    data() {
        return {
            nav: [{
                            link: "abouts.html",
                            name: '關於我們'
                        },
                        {
                            link: "news.html",
                            name: '最新消息'
                        },
                        {
                            link: "team.html",
                            name: '探索海洋生物'
                        },
                        {
                            link: "dida_shop.html",
                            name: 'DIDA商城'
                        },
                    ],
                    icon: [{
                            link: "#",
                            eAlt: '會員登入icon',
                            imgSrc: '<i class="fa-solid fa-user" style="color: #eeeeee;"></i>'
                        },
                        {
                            link: "#",
                            eAlt: '購物車icon',
                            imgSrc: '<i class="fa-solid fa-cart-shopping" style="color: #eeeeee;"></i>'
                        }
                    ],
                    selectName: '繁體中文',

                    language: [
                        {
                            option: '繁體中文'
                        },
                        {
                            option: '簡體中文'
                        },
                        {
                            option: '韓文'
                        },
                        {
                            option: '日文'
                        },

                    ]

    }
}
}
</script>
<style scoped lang="scss">
// @import "~@/assets/scss/base/reset.scss";

.wrap {
            width: 100%;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #232D47;
           
        }

        .logo img {
            vertical-align: top;
            width: 80px;
        }

        .main-nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-nav a {
            line-height: 40px;
            padding: 10px;
            text-decoration: none;
            color: white;
            font-size: 32px;
        }

        select {
            background-color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            /* background-image:url(imgs/Vector.png) ;
            background-position: right center; */
            /* appearance: none; */
            /* -moz-appearance: none; */
            width: 150px;
        }

        /* 滑鼠懸停時的樣式 */
        select:hover {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* 選擇狀態的樣式 */
        select:focus {
            outline: none;
            border: 2px solid #3498db;
        }

        /* 下拉選項樣式 */
        option {
            background-color: #fff;
            color: #333;

        }

        /* 選擇的下拉選項樣式 */
        option:checked {
            background-color: #3498db;
            color: #fff;
        }
        /* .Smart{
            position: fixed;
            right:0;
            bottom:0;
            width:100px;
        }
        .Smart img{
            width:50%;
            vertical-align: top;
        } */
</style>
  