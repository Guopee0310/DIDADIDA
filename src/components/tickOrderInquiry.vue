<template>
    <div class="tick_order_main">
        <div class="tick_area">
            <div class="tick_order_group" v-for="tick in tickOrder" :key="tick.tickImg">
                <div class="tick_img">
                    <img :src="tick.tickImg" alt="">
                </div>
                <div class="tick_info">
                    <div class="item_info tick_item">
                        <p>票種</p>
                        <p>{{ tick.tickName }}</p>
                    </div>
                    <div class="item_info tick_count">
                        <p>數量</p>
                        <p>{{ tick.tickName }}</p>
                    </div>
                    <div class="item_info tick_date">
                        <p>時間</p>
                        <p>{{ tick.tickDate }}</p>
                    </div>
                    <div class="item_info tick_price">
                        <p>金額</p>
                        <p>NT {{ tick.tickPrice }}</p>
                    </div>
                    <div>
                        <QRCode></QRCode>
                    </div>

                </div>
            </div>
        </div>
        <memChangePage></memChangePage>
    </div>
</template>

<script>
import memChangePage from '../components/memChangePage.vue';
import QRCode from '../components/QRCode.vue';
export default {
    name: "prodOrderInquiry",
    components: {
        memChangePage,
        QRCode,
    },
    data() {
        return {
            tickOrder: [
                {
                    tickImg: require("../assets/images/dolphin_pillow.jpg"),
                    tickName: "一般全票",
                    tickCount: "2",
                    tickDate: "2023.08.31",
                    tickPrice: "250",
                },
                {
                    tickImg: require("../assets/images/dolphin_pillow.jpg"),
                    tickName: "一般全票",
                    tickCount: "2",
                    tickDate: "2023.08.31",
                    tickPrice: "250",
                },
                {
                    tickImg: require("../assets/images/dolphin_pillow.jpg"),
                    tickName: "一般全票",
                    tickCount: "2",
                    tickDate: "2023.08.31",
                    tickPrice: "250",
                },
                // {
                //     tickImg: require("../assets/images/dolphin_pillow.jpg"),
                //     tickName: "一般全票",
                //     tickCount: "2",
                //     tickDate: "2023.08.31",
                //     tickPrice: "250",
                // },
            ],
        }
    }
}
</script>

<style scoped lang="scss">
.tick_order_main {
    p {
        color: map-get($colors, 'dark');
    }

    .tick_area {
        width: 500px;
        height: 880px;
        border: 0;
        border-radius: 15px;
        margin: 0 auto;
        background-color: #eeee;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;


        .tick_order_group {
            width: 460px;
            height: 208px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-evenly;
            // z-index: 2;
        }

        .tick_order_group:nth-child(4) {
            border-bottom: 0;
        }

        .tick_img {
            width: 130px;
            height: 160px;
            margin: 20px auto;
            border: 0;
        }

        .tick_img img {
            width: 100%;
        }

        .tick_info {
            width: 200px;
            height: 170px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
        }

        .item_info {
            padding: 5px;
            display: flex;
            justify-content: space-evenly;
        }

        .item_info p:first-child {
            width: 50px;
            text-align: center;
            background-color: map-get($colors, 'h2Blue');
        }

        .item_info p:nth-child(2) {
            width: 80px;
            margin-left: 10px;
        }
    }
}
</style>