<template>
  <Tabs value="name1">
    <TabPane label="購物訂單" name="name1">
      <div class="titleAll">
        <select name="" id="">
          <option value="">訂單編號</option>
          <option value="">會員姓名</option>
        </select>
        <input type="text" placeholder="請輸入訂單編號" />
        <div>搜尋</div>
      </div>
    </TabPane>
    <TabPane label="購票訂單" name="name2">标签二的内容</TabPane>
  </Tabs>
</template>
<script>
export default {
  name: "orderMg",
  data() {
    return {};
  },
  computed: {},
  mounted() {},

  methods: {},
};
</script>
<style lang="scss" scoped>
.titleAll {
  display: flex;
}
</style>
