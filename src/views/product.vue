<template>
  <header1></header1>
  <wave></wave>
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
 import wave from '../components/wave.vue'
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
    header1,
    wave
   }
 }
 </script>
<style scoped lang="scss">
@font-face {
    font-family: 'YourFontFamily'; /* 替换为你的字体名称 */
    src: url('../assets/font/NotoSerifCJKtc-Regular.otf') format('otf'); /* 替换为字体文件的实际路径 */
    
  }
  *{
    font-family: 'YourFontFamily' 
  }
.product_allCards{
display: flex;
justify-content: space-between;
align-items: center;
flex-wrap: wrap;
}
div{
  font-size: map-get($fontSizes, 'div');
}
</style>