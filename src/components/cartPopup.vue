<template>

    <div class="cart-popup" v-if="showCartPopup">
      <div class="cart-content">
        <p>已加入購物車</p>
        <img src="\all_images\doctor dida.png" alt="">
      </div>
    </div>

  </template>
  
  <script>
  import { mapState, mapMutations } from "vuex";
  
  export default {
    computed: {
      ...mapState(["showCartPopup"])
    },
    methods: {
        ...mapMutations(["toggleCartPopup"]),
        closeCartPopup() {
      // 延迟一秒后关闭购物车弹出视图
      setTimeout(() => {
        this.toggleCartPopup();
      }, 500); // 500毫秒（1秒）后关闭
    }
    }
  };
  </script>
  
  <style scoped>
  /* 样式可根据需要自定义 */

  .cart-popup {
    z-index:6 ;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    border: 1px solid #ccc;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    opacity: 1; /* 初始不透明 */
  transition: opacity 0.25s; /* 添加过渡效果 */
  }
  /* 在购物车弹出视图消失时设置为透明 */
.cart-popup.v-leave-active {
  opacity: 0;
}
  
  .cart-content {
    text-align: center;
  }
  .cart-content img {
    width: 10%;
  }
  
  
  .cart-content p {
    font-size: 18px;
    margin: 0;
    padding: 10px;
  }
  

  </style>
  