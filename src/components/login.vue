<template>
    <div  v-if="showLogin"> 
     
        <div class="backplate" @click="showLogin = !showLogin"></div>
    
        <div class="container" :class="{ 'right-panel-active': isSignUp }" id="container">
          <!-- signup固定填單 -->
          <div class="form-container sign-up-container">
            <form action="#">
              <h1>創建帳號</h1>
              <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="social"><i class="fa-brands fa-square-instagram"></i></a>
              </div>
              <span>或使用電子郵件登入</span>
              <input type="text" placeholder="姓名" />
              <input type="email" placeholder="電子信箱" />
              <input type="password" placeholder="密碼" />
              <button>註冊</button>
            </form>
          </div>
          
          <!-- signin固定填單 -->
          <div class="form-container sign-in-container">
            <form action="#">
              <h1>登入</h1>
              <div class="social-container">
                  <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
                  <a href="#" class="social"><i class="fa-brands fa-square-instagram"></i></a>
              </div>
              <span>或使用您的帳號</span>
              <input type="email" placeholder="電子信箱" />
              <input type="password" placeholder="密碼" />
              <a href="#">忘記密碼?</a>
              <button >登入</button>
            </form>
          </div>
          <!-- 滑蓋區 -->
          <div class="overlay-container">
            <div class="overlay">
              <!-- signin滑蓋 -->
              <div class="overlay-panel overlay-left">
                <h1>歡迎回來!</h1>
                <p>登入與DIDADIDA一起探索海底世界吧!</p>
                <button class="ghost" @click="toggleSignUp">登入</button>
              </div>
              <!-- signup滑蓋 --> 
              <div class="overlay-panel overlay-right">
                <h1>你好!</h1>
                <p>創建帳號加入DIDADIDA的海洋探索行列吧!</p>
                <button class="ghost" @click="toggleSignUp">註冊</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </template>
  
  <script>
   export default {
      data() {
        return {
          isSignUp: false,
          showLogin:true
        };
      },
      methods: {
        toggleSignUp() {
          this.isSignUp = !this.isSignUp;
        },
      },
    };
  </script>
  
  <style scoped>
  

  /* @import url("https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap");
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800'); */
  

  
  * {
      box-sizing: border-box;
  }
  
  body {
      background: #f6f5f7;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      margin: -20px 0 50px;
      position: relative;
  }
  .backplate{
      width: 100%;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
      position: fixed;
      top: 0;
      left: 0;
  }
  h1 {
      font-weight: bold;
      margin: 0;
  }
  
  h2 {
      text-align: center;
  }
  
  p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
  }
  
  span {
      font-size: 12px;
  }
  
  a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
  }
  
  button {
      border-radius: 20px;
      border: 1px solid #0b2d7b;
      background-color: #0b2d7b;
      color: #FFFFFF;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
  }
  
  button:active {
      transform: scale(0.95);
  }
  
  button:focus {
      outline: none;
  }
  
  button.ghost {
      background-color: transparent;
      border-color: #FFFFFF;
      cursor: pointer;
  }
  
  form {
      background-color: #FFFFFF;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
  }
  
  input {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
  }
  
  .container {
      background-color: #fff;
      border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
              0 10px 10px rgba(0,0,0,0.22);
      position: fixed;
      overflow: hidden;
      width: 768px;
      max-width: 100%;
      min-height: 480px;
      /* margin: 0 auto; */
      transform: translate(50%,-50%);
      top: 50%;
      right: 50%;
      
  }
  
  .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
  }
  
  .sign-in-container {
      left: 0;
      width: 50%;
      z-index: 2;
  }
  
  .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
  }
  
  .sign-up-container {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
  }
  
  .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
  }
  
  @keyframes show {
      0%, 49.99% {
          opacity: 0;
          z-index: 1;
      }
      
      50%, 100% {
          opacity: 1;
          z-index: 5;
      }
  }
  
  .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
  }
  
  .container.right-panel-active .overlay-container{
      transform: translateX(-100%);
  }
  
  .overlay {
      background: #0b2d7b;
      background: -webkit-linear-gradient(to right, #0b2d7b, #475aab);
      background: linear-gradient(to right, #0b2d7b, #475aab);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #FFFFFF;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
        transform: translateX(0);
      transition: transform 0.6s ease-in-out;
  }
  
  .container.right-panel-active .overlay {
        transform: translateX(50%);
  }
  
  .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
  }
  
  .overlay-left {
      transform: translateX(-20%);
  }
  
  .container.right-panel-active .overlay-left {
      transform: translateX(0);
  }
  
  .overlay-right {
      right: 0;
      transform: translateX(0);
  }
  
  .container.right-panel-active .overlay-right {
      transform: translateX(20%);
  }
  
  .social-container {
      margin: 20px 0;
  }
  
  .social-container a {
      border: 1px solid #DDDDDD;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
  }
  
    </style>
    
    
  