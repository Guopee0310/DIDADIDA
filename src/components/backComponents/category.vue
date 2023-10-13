<template>
    <div>
        <select name="" id="" v-model="selectedCategory">
            <option v-for="(item, index) in categorySelect" :key="index" :value="item.value">{{ item.option }}</option>
        </select>
    </div>
</template>
    
<script>
export default {
    data() {
        return {
            categorySelect: [{ option: "分類", value: "" }, { option: "表演", value: "表演" }, { option: "優惠", value: "優惠" }, { option: "活動", value: "活動" }],
            selectedCategory:"",
        };
    },
    emits: ["category"],
    watch: {
        selectedCategory(newValue, oldValue) {
            this.$emit("category", this.selectedCategory);
        },
    },
};
</script>
    
<style scoped lang="scss"></style>
    