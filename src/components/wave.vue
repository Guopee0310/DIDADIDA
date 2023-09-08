<template>
    
<div class="banner_pic">  
<div class="bannerTitle">
  <h1>周邊商品</h1>
  <h2>SHOP</h2>
</div>
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
  <defs>
    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v30h-355z">
    </path>
  </defs>
  <g class="parallax">
    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.6" />
    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(70, 130, 191,0.7)" />
    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
  </g>
</svg>
</div>
</template>
  
<script>


export default {
  name: 'son',
 
}
</script>
<style scoped lang="scss">
  
body {
  margin:0;
}


.banner_pic{
height:90vh;
position: relative;
background-image: url(../../public/all_images/cenote-280252_1920.jpg);
background-position: bottom;
background-size: cover;
display: flex;
justify-content: center;
align-items: center;
.bannerTitle{
 display: flex;
 justify-content: center;
 align-items: center;
 flex-direction: column;
 color: map-get($colors, 'light');
 
 h1{
  border-bottom: 1px solid map-get($colors, 'light');
 }
  font-size: map-get($fontSizes, 'h1');
  h2{
    font-size: map-get($fontSizes, 'h2');
  }
}
}




.waves {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 15%;
  vertical-align: top;
}


/* Animation */

.parallax > use {
  animation: move-forever 20s cubic-bezier(.55,.6,.59,.5)infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 15s;
}
.parallax > use:nth-child(2) {
  animation-delay: -4s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -6s;
  animation-duration: 18s;
}

@keyframes move-forever {
  0% {
   transform: translate(-90px,0);
  }
  100% { 
    transform: translate(85px,0);
  }
}
@media (max-width: 768px) {
    .waves {
        height: 40px;
        min-height: 40px;
    }
}
</style>