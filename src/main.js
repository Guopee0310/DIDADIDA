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
            表層海洋帶: 'Epipelagic',
            中層海洋帶: 'Mesopelagic',
            深層海洋帶: 'Bathypelagic',
            深淵層海洋帶: 'Abyssopelagic',
            超深淵層海洋帶: 'Hadopelagic',
            DIDA購物: 'Shopping',
            DIDA購票: 'Ticketing',
            // index -------------------------------------
            DIDADIDA海洋館: 'DIDADIDA AQUARIUM',
            營業時間: 'Opening Hours',
            最後入場: 'Last Tours',
            今日入園人數: 'Number of People Today',
            // Ticket ------------------------------------
            票價資訊: 'Ticket Information',
            票種: 'Ticket Type',
            一般票: 'Regular Ticket',
            學生票: 'Student Ticket',
            孩童票: 'Children Ticket',
            愛心票: 'Disabled Ticket',
            團體票: 'Group Ticket',
            價格: 'Price',
            適用對象: 'Suitable',
            '限18歲(含)以上成人使用': 'Restricted to adults aged 18 years and above (inclusive).',
            '限12歲(含)以上持學生證之學生適用': 'Only available to students aged 12 or above (inclusive) with a student ID card.',
            '限4歲(含)以上及未滿12歲兒童適用': 'Restricted to children aged 4 years and above and under 12 years old.',
            '限持有身心障礙證明者、身心障礙者的1位陪同者、孕婦、滿65歲以上長者適用': 'Applicable only to people with a disability certificate, one person accompanying the person with a disability, pregnant women, and seniors over 65 years old.',
            '15人以上適用': 'Applicable to more than 15 people.',
            '未滿4歲且有家長陪同的幼童可免費入場': 'Children under 4 years old and accompanied by their parents can enter for free.',
            選擇日期與票數: 'Select Date & Number of Tickets',
            選擇數量: 'Select Quantity',
            全部重選: 'Reselect All',
            成人: 'Adult',
            兒童: 'Children',
            學生: 'Student',
            長者: 'Elder',
            '(18~64歲)': '(18~64 years old)',
            '(4~11歲)': '(4~11 years old)',
            '(12歲以上(含)持學生證者)': '(Those 12 years old and above(inclusive) holding student ID card)',
            '(65歲以上(含))': '(65 years and above (inclusive))',
            每人: 'per',
            總金額: 'Total',
            立即購票: 'Buy Now',
            購票須知: 'Ticket Purchase Instructions',
            '未滿 4 歲的兒童可免費入場，需有家長陪同入場。': 'Children under 4 years old are admitted free and must be accompanied by a parent.',
            '下訂時請以「票券使用日」為主，下訂後即無法變更，敬請留意。': 'Please note that the "ticket expiration date" is the main one when placing an order. It cannot be changed after the order is placed.',
            '訂單一次最高訂購上限為 6 張，每日場次數量為限量販售，售完為止。': 'The maximum order limit for one order is 6, and the number of daily sessions is limited and sold while stocks last.',
            '訂單恕不接受部分變更，若需變更入場日及場次請整筆重新下訂。': 'Partial changes to orders will not be accepted. If you need to change the entry date and venue, please place a new order in full.',
            '長者票（博愛票）適用對象：限持有身心障礙證明者、身心障礙者的1位陪同者、孕婦、滿65歲以上長者適用。': `Applicable objects for senior citizens' tickets(fraternity tickets): Only those with a disability certificate, one companion of a person with a disability, pregnant women, and seniors over 65 years old.`,
            '本館禁止攜帶外食、寵物，可攜帶開水。': 'No outside food or pets are allowed in the hotel, but boiled water is allowed.',
            '館內提供嬰兒車租借，未提供輪椅租借，敬請旅客見諒。': 'Strollers are available for rent in the museum, but wheelchairs are not available for rent. Please forgive me.',
            '請務必於訂購時確認訂購之票種是否正確，資格是否符合。': 'Please be sure to confirm whether the ticket type you ordered is correct and whether you meet the qualifications when ordering.',
            '此商品恕無法使用任何折扣券，敬請見諒。': 'Please understand that no discount coupons can be used on this product.',
            '購票時請主動出示相關證件供售票處工作人員驗證，相關證件說明如下：': 'When purchasing tickets, please take the initiative to present relevant documents for verification by the ticket office staff. The relevant documents are explained as follows:',
            ' 1. 學生票：本人有效學生證正本(若為應屆畢業生則提供當年度正式入學通知單或註冊單及攜帶身分證)。': '1. Student ticket: The original of my valid student ID card (if you are a fresh graduate, please provide the official admission notice or registration form of the current year and bring your ID card).',
            ' 2. 兒童票、長者票(博愛票)：身心障礙證明、孕婦健康手冊、國民身分證或政府核發附有照片、身分證字號及出生年、月、日等足以證明身分證件。': '2. Child tickets and elderly tickets (fraternity tickets): certificate of physical and mental disabilities, maternal health handbook, national identity card or government-issued document with photo, ID card number and year, month, and day of birth that are sufficient to prove identity.',
            // ------------------------------------------------
        },
    },
},
);

const vueApp = createApp(App);
vueApp.use(store);
vueApp.use(router);
vueApp.use(ViewUIPlus); // 套件也要宣告
vueApp.use(i18n); // 語言切換
vueApp.use(VCalendar, {}); // 日曆套件
vueApp.mount("#app");

router.beforeEach((to, from, next) => {
    // 每次路由切換時，將頁面滾動到頂部
    window.scrollTo(0, 0);
    next();
});
