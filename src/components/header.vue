<template>
    <div class="wrap" id="header">
        <div id="app">
            <div class="header">
                <div class="logo">
                    <router-link to="/" @click="hideBanner()"><img src="../assets/images/dida_logo.png"></router-link>
                </div>

                <nav class="main-nav">
                    <router-link to="/about">關於我們</router-link>
                    <router-link to="/news">最新消息</router-link>
                    <router-link to="/explore">探索海洋生物</router-link>
                    <!-- @click="toFooter()" -->
                    <router-link to="/product">DIDA商城</router-link>
                    <span><i class="fa-solid fa-user" style="color: #eeeeee;"></i></span>
                    <span><i class="fa-solid fa-cart-shopping" style="color: #eeeeee;"></i></span>

                    <div class="select">
                        <select v-model="selectName">

                            <option v-for="item in language" :value="item.option">{{ item.option }}</option>
                        </select>
                    </div>
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


export default {
    name: 'HomeView',
    components: {

    },
    data() {
        return {

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
    },
    watch: {
        "$route.query"(nVal, oVal) {
            console.log(nVal)
        },
    },
    methods: {
        hideBanner() {
            this.$router.push({ path: '/', query: { section: 'hide' } })
        }
        // toFooter(){
        //     this.$router.push({ path: '/product', query: { article: 'footer' } });
        //     this.$router.push({path:'/', query:{section : 'footer' }})
        // }
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

    .main-nav {
        display: flex;
        justify-content: center;
        align-items: center;

        select {

            @include selectBtn;

        }
    }
}

.logo img {
    vertical-align: top;
    width: 80px;
}





.main-nav a {
    line-height: 40px;
    padding: 10px;
    text-decoration: none;
    color: white;
    font-size: map-get($fontSizes, 'nav');
}

select {
    background-color: #fff;
    border: none;
    border-radius: 20px;
    padding: 10px;
    font-size: map-get($fontSizes, 'p');
    cursor: pointer;
    /* background-image:url(imgs/Vector.png) ;
            background-position: right center; */
    /* appearance: none; */
    /* -moz-appearance: none; */
    width: 150px;
}

.select {
    @include btnWidth;
}

.select::after {
    @include arrow;
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
  