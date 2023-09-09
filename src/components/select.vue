<template>
    <div class="select">
        <select name="" id="itemClass" v-model="selectedItem">
            <option v-for="prod in prodSelect" :key="prod">{{ prod.option }}</option>
        </select>
    </div>
    <div class="select">
        <select name="" id="" v-model="selectedPrice">
            <option v-for="cost in costSelect" :key="costSelect">{{ cost.option }}</option>
        </select>
    </div>
</template>

<script>
export default {
    data() {
        return {
            prodSelect: [
                { option: '所有商品' },
                { option: '食品' },
                { option: '玩偶' },
                { option: '配飾' },
            ],
            costSelect: [
                { option: '價格' },
                { option: '由低到高' },
                { option: '由高到低' },
            ],
            selectedItem: '所有商品',
            selectedPrice: '價格'
        }
    },
    methods: {

    },
    watch: {
        selectedItem(newValue, oldValue) {
            // 在这里可以处理选项变化的逻辑
            console.log('新选项：', newValue);
            console.log('this.selectedItem', this.selectedItem)
            this.$emit('transferClass', this.selectedItem);
        },
        selectedPrice(newValue, oldValue) {
            // 在这里可以处理选项变化的逻辑
            console.log('新选项：', newValue);
            console.log('this.selectedPrice', this.selectedPrice)
            this.$emit('transferPrice', this.selectedPrice);
        },
    }

}
</script>
<style scoped lang="scss">
select {
    /* Reset Select */
    @include selectBtn($c: #a70b67)
}

/* Remove IE arrow */
select::-ms-expand {
    display: none;
}

/* Custom Select wrapper */
.select {
    position: relative;
    display: flex;
    width: 120px;
    height: 40px;
    overflow: hidden;
}

// .select::after {
//     content: '\25BC';
//     position: absolute;
//     top: 0;
//     right: 0;
//     padding: 5px 10px;
//     background-color: transparent;
//     transition: .25s all ease;
//     pointer-events: none;
//     border-radius: 50px;
//     color: #eee;
// }

option {
    background-color: #2c3e50;
}
</style>