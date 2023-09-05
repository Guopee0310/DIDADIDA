<template>
<div class="product_allCards">
  <Son :msg1="son" v-for="i in 20" ></Son> 
</div>
  <!-- card -->
 </template>
   
 <script>
 import Son from '../components/son.vue'
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
    Son
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