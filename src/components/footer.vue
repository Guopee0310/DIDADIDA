<template>
    <footer id="footer">
        <div class="footer_wrap">
            <div class="footer_item">
                <h3>{{ footerTitle.about }}</h3>
                <ul>
                    <li v-for="about in footer_aboutArray" :key="about"><router-link :to="about.link">{{ about.name
                    }}</router-link></li>

                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.news }}</h3>
                <ul>
                    <!-- <li><a :href="news.link">{{ news.name }}</a></li> -->
                    <li v-for="news in footer_newsArray" :key="news"><router-link :to="news.link">{{ news.name
                    }}</router-link></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.animal }}</h3>
                <ul>
                    <li v-for="animal in footer_animalArray" :key="animal"><router-link :to="animal.link">{{
                        animal.name }}</router-link></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.buy }}</h3>
                <ul>
                    <li v-for="buy in footer_buyArray" :key="buy"><router-link :to="buy.link">{{ buy.name
                    }}</router-link></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.media }}</h3>
                <div>
                    <span v-for="media in footer_mediaArray" :key="media"><router-link :to="media.link"><i
                                :class="media.name"></i></router-link></span>
                </div>
            </div>
            <div class="deco-right">
                <img src="../../public/all_images/footer/deco_fish.png" alt="">
            </div>
            <div class="deco-left">
                <img src="../../public/all_images/footer/deco_coral.png" alt="">
            </div>
        </div>
        <div class="copyright">
            <p>{{ copyright }}</p>
        </div>
    </footer>
</template>
  
<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
    name: 'HomeView',
    components: {
        HelloWorld
    },
    data() {
        return {
            footerTitle: {
                about: '關於我們',
                news: '最新消息',
                animal: '探索海洋生物',
                buy: 'DIDA商城',
                media: '社群媒體'
            },
            footer_aboutArray: [
                { link: '/faq', name: '常見問答' },
                { link: '/guide', name: '園區導覽' },
                { link: '/interact', name: '互動遊戲' },
            ],
            footer_newsArray: [
                { link: '/news', name: '最新活動' },
                { link: '#', name: '表演資訊' },
                { link: '#', name: '優惠消息' },
            ],
            footer_animalArray: [
                { link: '#', name: '表層海洋帶' },
                { link: '#', name: '中層海洋帶' },
                { link: '#', name: '深層海洋帶' },
                { link: '#', name: '深淵層海洋帶' },
                { link: '#', name: '超深淵層海洋帶' },
            ],
            footer_buyArray: [
                { link: '/product', name: 'DIDA購物' },
                { link: '/ticket', name: 'DIDA購票' },
            ],
            footer_mediaArray: [
                { link: '#', name: 'fa-brands fa-square-facebook" style="color: #eeeeee;' },
                { link: '#', name: 'fa-brands fa-instagram" style="color: #eeeeee;' },
                { link: '#', name: 'fa-brands fa-youtube" style="color: #eeeeee;' },
            ],
            copyright: '本網站為緯育TibaMe_前端設計工程師班CHD103學員專題成果作品,本平台僅供學習、展示之用。若有抵觸有關著作權, 或有第三人主張侵害智慧財產權等情事, 均由學員負法律上責任, 緯育公司概不負責。若有侵權疑慮, 您可以私訊[緯育TibaMe], 後續會由專人協助處理。'
        }

    }
}
</script>
<style scoped lang="scss">
// @import "~@/assets/scss/base/reset.scss";

footer {
    width: 100%;
    padding: 190px 0;
    background-color: map-get($colors, 'mainColor');
    position: relative;

    .footer_wrap {
        max-width: 960px;
        width: 100%;
        margin: 0 auto 35px;
        display: flex;
        justify-content: space-between;
        overflow: hidden;

        h3 {
            color: #eee;
            margin: 55px 0 25px;
            font-size: map-get($fontSizes , 'nav');
        }

        a {
            color: #eee;
            text-decoration: none;
            transition: .3s;
        }

        a:hover {
            color: map-get($colors, h2Blue);
            transition: .3s;
        }

        li {
            margin: 5px 0;
        }

    }

    p {
        width: 960px;
        color: #eee;
        margin: auto;
        font-size: map-get($fontSizes, 'mini');
        text-align: center;
        padding: 0 0 25px;
    }

    .footer_item {
        span {
            margin-right: 5px;
            font-size: 17px;
        }

    }

    .deco-right {
        position: absolute;
        bottom: 0;
        right: 0;

        img {
            vertical-align: bottom;
            width: 200px;
        }
    }

    .deco-left {
        position: absolute;
        bottom: 0;
        left: 0;

        img {
            vertical-align: bottom;
            width: 200px;
        }
    }
}
</style>
  