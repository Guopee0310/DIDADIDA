<template>
  <header1></header1>
  <login></login>
<div class="product_allCards">
  <Son :msg1="son" v-for="i in 20" ></Son> 
</div>
  <!-- card -->
  <footer1></footer1>
 </template>
   
 <script>
 import Son from '../components/son.vue'
 import login from '../components/login.vue'
 import footer1 from '../components/footer.vue'
 import header1 from '../components/header.vue'
 export default {
   name: 'product',
   data() {
    return {
        son:'子元件'
    }
   },
   props: {
     msg: String
   },
   components:{
    Son,
    footer1,
    login,
    header1
   }
 }
 </script>
<style scoped lang="scss">
.product_allCards{
display: flex;
justify-content: space-between;
align-items: center;
flex-wrap: wrap;
}
</style>