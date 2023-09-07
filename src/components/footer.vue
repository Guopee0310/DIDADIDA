<template>
    <footer>
        <div class="footer_wrap">
            <div class="footer_item">
                <h3>{{ footerTitle.about }}</h3>
                <ul v-for="about in footer_aboutArray" :key="footerAbout">
                    <li><a :href="about.link">{{ about.name }}</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.news }}</h3>
                <ul v-for="news in footer_newsArray" :key="footerNews">
                    <li><a :href="news.link">{{ news.name }}</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.animal }}</h3>
                <ul v-for="animal in footer_animalArray" :key="footerAnimal">
                    <li><a :href="animal.link">{{ animal.name }}</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.buy }}</h3>
                <ul v-for="buy in footer_buyArray" :key="footerBuy">
                    <li><a :href="buy.link">{{ buy.name }}</a></li>
                </ul>
            </div>
            <div class="footer_item">
                <h3>{{ footerTitle.media }}</h3>
                <ul v-for="media in footer_mediaArray" :key="footerMedia">
                    <li><a :href="media.link"><span v-html="media.name"></span></a></li>
                </ul>
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
                { link: '#', name: '常見問答' },
                { link: '#', name: '園區導覽' },
                { link: '#', name: '互動遊戲' },
            ],
            footer_newsArray: [
                { link: '#', name: '最新活動' },
                { link: '#', name: '表演資訊' },
                { link: '#', name: '優惠消息' },
            ],
            footer_animalArray: [
                { link: '#', name: '表層海洋帶' },
                { link: '#', name: '中層海洋帶' },
                { link: '#', name: '深層海洋帶' },
                { link: '#', name: '深淵層海洋帶' },
            ],
            footer_buyArray: [
                { link: '#', name: 'DIDA購物' },
                { link: '#', name: 'DIDA購票' },
            ],
            footer_mediaArray: [
                { link: '#', name: '<i class="fa-regular fa-heart" style="color: #232d47;"></i>' },
                { link: '#', name: '' },
                { link: '#', name: '' },
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
    padding: 35px 0;
    background-color: #232D47;

    .footer_wrap {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto 55px;
        display: flex;
        justify-content: space-between;

        h3 {
            color: #eee;
            margin: 35px 0 25px;
        }

        a {
            color: #eee;
            opacity: 0.7;
            text-decoration: none;
            transition: .3s;
        }

        a:hover {
            opacity: 1;
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
        font-size: 8px;
        text-align: justify;
    }
}
</style>
  