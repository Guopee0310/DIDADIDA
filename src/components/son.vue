<template>
  <div class="card">
    <div class="heart">
      <heart></heart>
    </div>
    <div class="pic">
      <a href="#"><img src="../assets/images/dolphin_pillow.jpg" alt=""></a>
    </div>

    <div class="name">
      <a href=""> 大型乾燥花束【和煦】</a>
    </div>
    <div class="info">
      <div class="cost">
        <span>NT 750</span>
      </div>
      <div class="prod_btn">
        <div class="num">
          <input type="button" value="–">
          <input type="text" value="1" size="1">
          <input type="button" value="+">
        </div>
        <div class="buy">
          <a href="">
            <i class="fa-solid fa-cart-shopping" style="color: #9fbdce;"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
import btn2 from './btn2.vue'
import heart from './heart.vue'

export default {
  name: 'son',
  props: {
    msg1: [String, Number]
  },
  components: {
    btn2,
    heart
  }
}
</script>
<style scoped lang="scss">
.card {
  width: 270px;
  margin: 15px 15px 50px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  box-sizing: border-box;

  .heart {
    margin: 0 0 -50px auto;
    padding: 0 5px;
    z-index: 2;
  }

  .pic {
    overflow: hidden;
    margin-bottom: 10px;
  }

  .pic img {
    width: 100%;
    vertical-align: top;
    transform: scale(1);
    transition: .7s;
  }

  .pic img:hover {
    transition: .7s;
    transform: scale(1.1);
  }

  .name {
    font-size: 17px;
    margin-bottom: 15px;
    line-height: 1.5;
    font-family: Gowun Batang, 'Times New Roman', Times, NotoSerifCJKtc-Regular, serif;
    color: #333;
  }

  .name a {
    text-decoration: none;
    color: #333;
    transition: .3s;
    font-size: Gowun Batang, 'Times New Roman', Times, NotoSerifCJKtc-Regular, serif;
    display: block;
  }

  span {
    display: block;
    // font-size: 17px;
  }

  .info {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .prod_btn{
    display: flex;
  }
  .num input {
    width: 30px;
    border: 0;
    text-align: center;
    background-color: #9fbdce;
    font-size: 15px;
  }

  .num input:first-child {
    border-radius: 15px 0 0 15px;
  }

  .num input:last-child {
    border-radius: 0 15px 15px 0;
  }

  .buy {
    width: 35px;
    height: 35px;
    // border-radius: 100px;
    // border: 1.5px solid #d9d9d9;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .buy i {
    font-size: 17px;
  }

  .buy .fa-cart-shopping {
    width: 12px;
    margin: 4px 9px 0 0;
  }

  .buy:hover .fa-plus {
    display: none;
  }

  .buy:hover .fa-cart-shopping {
    display: inline-block;
  }

  .buy:hover {
    background-color: #eee;
  }


  .name a:hover {
    color: #C48710;
    transition: .2s;
  }


  .buy img:nth-child(1):hover {
    transition: .2s;
    opacity: 0;
  }



}
</style>