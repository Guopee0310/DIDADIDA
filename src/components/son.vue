<template>
    
    
    <div class="product_card">
        <heart></heart>
        <img src="../assets/logo.png" alt="">
        <span>NTD450</span>
         <p>Lorem ipsum dolor sit</p>
    </div>
</template>
  
<script>
import btn2 from './btn2.vue'
import heart from './heart.vue'

export default {
  name: 'son',
  props:{
    msg1:[String,Number]
  },
  components:{
    btn2,
    heart
  }
}
</script>
<style scoped>
  .product_card{
    width: calc(100% / 4 - 20px);
    border: 1px solid blue;
    color: blue;
    font-size: 20px;
    margin-top: 20px;
  }
</style>