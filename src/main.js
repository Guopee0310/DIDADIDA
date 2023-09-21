import { createApp } from "vue";
import ViewUIPlus from "view-ui-plus";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "view-ui-plus/dist/styles/viewuiplus.css";
import { createI18n } from "vue-i18n";
import VCalendar from "v-calendar";
import "v-calendar/style.css";

const i18n = createI18n({
    locale: 'zh-TW', // 默認語言
    fallbackLocale: 'zh-TW', // 找不到 messages 的翻譯，就使用設定的語言
    messages: {
        en: {
            // 對應中文: '英文翻譯',
            // header & footer --------------------------
            關於我們: 'About DIDADIDA',
            最新消息: 'News',
            探索海洋生物: 'Explor Sea Animals',
            DIDA商城: 'DIDA Mall',
            社群媒體: 'Social Media',
            常見問答: 'Q & A',
            園區導覽: 'Park Quide',
            互動遊戲: 'Interactive Game',
            最新活動: 'Latest Activity',
            表演資訊: 'Performance Information',
            優惠消息: 'Discount News',
            表層海洋帶: 'Epipelagic Zone',
            中層海洋帶: 'Mesopelagic Zone',
            深層海洋帶: 'Bathypelagic Zone',
            深淵層海洋帶: 'Abyssopelagic Zone',
            超深淵層海洋帶: 'Hadopelagic Zone',
            DIDA購物: 'DIDA Shopping',
            DIDA購票: 'DIDA Ticketing',
            // index -------------------------------------
            DIDADIDA海洋館: 'DIDADIDA AQUARIUM',
            營業時間: 'Opening Hours',
            最後入場: 'Last Tours',
            // Ticket ------------------------------------
            購票資訊: 'Ticket Purchase Information'
        },
    },
  },
);

const vueApp = createApp(App);
vueApp.use(store);
vueApp.use(router);
vueApp.use(ViewUIPlus); //套件也要宣告
vueApp.use(i18n); // 語言切換
vueApp.use(VCalendar, {});
vueApp.mount("#app");

router.beforeEach((to, from, next) => {
  // 每次路由切换时，将页面滚动到顶部
  window.scrollTo(0, 0);
  next();
});
