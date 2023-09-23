<template>
    <div class="prod_order_main">
        <div class="order_area">
            <div class="prod_order_group" v-for="prod in prodOrder" :key="prod.prodImg">
                <div class="prod_img">
                    <img :src="prod.prodImg" alt="">
                </div>
                <div class="prod_info">
                    <div class="item_info prod_item">
                        <p>品項</p>
                        <p>{{ prod.prodName }}</p>
                    </div>
                    <div class="item_info prod_count">
                        <p>數量</p>
                        <p>{{ prod.prodCount }}</p>
                    </div>
                    <div class="item_info prod_date">
                        <p>時間</p>
                        <p>{{ prod.prodDate }}</p>
                    </div>
                    <div class="item_info prod_price">
                        <p>金額</p>
                        <p>NT {{ prod.prodPrice }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import memChangePage from '../components/memChangePage.vue';
export default {
    name: "prodOrderInquiry",
    components: {
        memChangePage,
    },
    data() {
        return {
            prodOrder: [
                {
                    prodImg: require("../assets/images/dolphin_pillow.jpg"),
                    prodName: "極舒適海豚",
                    prodCount: "2",
                    prodDate: "2023.08.31",
                    prodPrice: "399",
                },
                {
                    prodImg: require("../assets/images/dolphin_pillow.jpg"),
                    prodName: "極舒適海豚",
                    prodCount: "2",
                    prodDate: "2023.08.31",
                    prodPrice: "399",
                },
                {
                    prodImg: require("../assets/images/dolphin_pillow.jpg"),
                    prodName: "極舒適海豚抱枕",
                    prodCount: "2",
                    prodDate: "2023.08.31",
                    prodPrice: "399",
                },
                {
                    prodImg: require("../assets/images/dolphin_pillow.jpg"),
                    prodName: "極舒適海豚抱枕",
                    prodCount: "2",
                    prodDate: "2023.08.31",
                    prodPrice: "399",
                },
                {
                    prodImg: require("../assets/images/dolphin_pillow.jpg"),
                    prodName: "極舒適海豚抱枕",
                    prodCount: "2",
                    prodDate: "2023.08.31",
                    prodPrice: "399",
                },
            ],
        }
    }
}
</script>

<style scoped lang="scss">
.prod_order_main {
    p {
        color: map-get($colors, 'dark');
    }

    .order_area {
        width: 500px;
        height: 850px;
        border: 0;
        border-radius: 15px;
        margin: 0 auto;
        background-color: #eeee;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        overflow-y: scroll;

        &::-webkit-scrollbar {
            width: 10px;
        }

        &::-webkit-scrollbar-track-piece {
            background: transparent;
        }

        &::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, 0.4);
            border: 1px solid slategrey;
        }

        &::-webkit-scrollbar-track {
            box-shadow: transparent;
        }

        &::-webkit-scrollbar-button {
            height: 5px;
            background: transparent;
            border-radius: 4px;
        }


        .prod_order_group {
            width: 460px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-evenly;
            z-index: 2;
        }

        .prod_order_group:last-child {
            border-bottom: 0;
        }

        .prod_img {
            width: 200px;
            height: 150px;
            margin: 20px auto;
            border: 0;
        }

        .prod_img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .prod_info {
            width: 200px;
            height: 150px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .item_info {
            display: flex;
            justify-content: space-evenly;
        }

        .item_info p:first-child {
            width: 50px;
            text-align: center;
            background-color: map-get($colors, 'h2Blue');
        }

        .item_info p:nth-child(2) {
            width: 120px;
            margin-left: 10px;
        }
    }
}

@media screen and (max-width: 414px) {
    .prod_order_main {
        .order_area {
            width: 330px;
            height: 720px;

            .prod_order_group {
                width: 300px;
                flex-direction: column;
            }

            .prod_img {
                width: 50%;
            }

            .prod_info {
                width: 50%;
                margin: 0 auto;
            }
        }
    }

}
</style>