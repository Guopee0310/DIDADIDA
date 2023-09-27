<template>
  <div v-if="loginCheck" class="loginFirst">
    <div class="login_bg">
      <div class="logo">
        <img src="../../../public/all_images/logo_all.svg" alt="" />
      </div>
      <div class="input_area">
        <label for="account">
          <img src="../../../public/all_images/backStage/user.png" alt="" />
          <input
            id="account"
            type="text"
            placeholder="帳號"
            v-model="loginMail"
            ref="loginMail"
          />
        </label>
        <label for="psw">
          <img src="../../../public/all_images/backStage/key.png" alt="" />
          <input
            id="psw"
            type="password"
            placeholder="密碼"
            v-model="loginPassword"
            ref="loginPassword"
        /></label>

        <div class="loginBtn" @click="checkLogin">登入</div>
      </div>
    </div>
  </div>

  <div class="slotAll" v-else>
    <div class="controlWidth">
      <div class="featureBox">
        <router-link
          :to="i[1]"
          v-for="(i, index) in featureAll"
          :key="index"
          :class="['singleFeature', { active: $route.path === i[1] }]"
          @click="toggleFeature(i)"
        >
          {{ i[0] }}
        </router-link>
      </div>
      <div class="differentBox">
        <div class="userName">
          <div>User:Super</div>
          <div class="logoutBtn" @click="logoutToHome">登出</div>
        </div>
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "backHome",
  data() {
    return {
      loginMail: "group4",
      loginPassword: 123,
      loginCheck: true,
      featureAll: [
        ["首頁輪播圖片管理", "/backHome/homePicMg", false],
        ["最新消息管理", "/backHome/newsMg", false],
        ["會員管理", "/backHome/memberMg", false],
        ["訂單管理", "/backHome/orderMg", false],
        ["商品管理", "/backHome/productMg", false],
        ["票券管理", "/backHome/ticketMg", false],
        ["智能小幫手", "/backHome/helperMg", false],
        ["互動", "/backHome/gamesMg", false],
      ],
      activeIndex: -1,
    };
  },

  methods: {
    logoutToHome() {
      this.$router.push("/backHome");
      this.loginCheck = true;
    },
    checkLogin() {
      if (
        this.$refs.loginMail.value == this.loginMail &&
        this.$refs.loginPassword.value == this.loginPassword
      ) {
        this.loginCheck = false;
        this.$router.push("/backHome/homePicMg");
      }
    },
    toggleFeature(index) {
      if (this.activeIndex === index) {
        this.activeIndex = -1;
      } else {
        this.activeIndex = index;
      }
    },
    isActive(index) {
      return this.activeIndex === index;
    },
  },
};
</script>
<style scoped lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.loginFirst {
  height: 100vh;
  display: flex;
  width: 100%;
  justify-content: center;
  align-items: center;
  background-image: url(../../../public/all_images/backStage/back_loginBg.jpg);
  background-size: cover;

  .login_bg {
    width: 60%;
    height: 80vh;
    padding: 1.5rem 0;
    border-radius: 0.5rem;
    background-color: #7e7878a8;

    .logo {
      width: 11%;
      margin: auto;

      img {
        width: 100%;
        vertical-align: top;
      }
    }

    .input_area {
      width: 50%;
      // margin: auto;
      display: flex;
      flex-direction: column;
      margin: 1rem auto;
      position: relative;
      padding: 15px 0 0;
      margin-top: 10px;

      label {
        display: flex;
        align-items: center;

        img {
          width: 10%;
          padding: 0.5rem;
          vertical-align: top;
          text-align: center;
          font-size: 20px;
          background-color: #ddd5b7;
          border-radius: 0.3em 0 0 0.3em;
        }
      }

      input {
        width: 90%;
        padding: 0.5rem;
        margin: 1rem 0;
        background: rgba(170, 195, 228, 0.742);
        border: 2px solid transparent;
        border-radius: 4px;
        box-shadow: rgb(0 0 0 / 12%) 0px 1px 3px, rgb(0 0 0 / 24%) 0px 1px 2px;
        outline: none;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;

        &:focus {
          border-color: #e9ae66;
          outline: 0;
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),
            0 0 8px rgba(233, 174, 102, 0.6);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),
            0 0 8px rgba(233, 174, 102, 0.6);
        }
      }

      .loginBtn {
        text-align: center;
        width: 100%;
        margin-left: auto;
        cursor: pointer;
        outline: 0;
        border: 0;
        padding: 0.5rem;
        border-radius: 3rem;
        margin: 1rem 0;
        font-weight: 600;
        color: #ffffff;
        box-shadow: rgb(116, 235, 213) -2px -2px 0px 2px,
          rgb(159, 172, 230) 0px 0px 0px 4px,
          rgba(0, 0, 0, 0.05) 0px 0px 2px 7px;
        transition: all 0.2s;

        &:hover {
          box-shadow: rgb(159, 172, 230) -2px -2px 0px 2px,
            rgb(116, 235, 213) 0px 0px 0px 4px,
            rgba(0, 0, 0, 0.05) 0px 0px 2px 7px;
          transform: scale(1.01);
          color: #dbdbdb;
        }
      }
    }
  }
}

.slotAll {
  max-width: 100vw;
  height: 100vh;
  margin: auto;
  padding-top: 50px;
  // background-image: url(../../../public/all_images/backStage/watercolor-bg.jpg);
  // background-size: cover;

  .controlWidth {
    width: 90%;
    display: flex;
    justify-content: space-between;
    margin: 0 auto;

    .featureBox {
      width: 15%;
      border-radius: 1rem;
      background-color: map-get($colors, "h2Blue");
      display: flex;
      flex-direction: column;
      height: fit-content;
      padding: 20px;
      box-shadow: black 0.1em 0.1em 0.1em;

      .singleFeature {
        background-color: map-get($colors, "mainColor");
        cursor: pointer;
        color: map-get($colors, "light");
        font-weight: 600;
        padding: 10px 5px;
        margin: 5px 0;
        border-radius: 0.5rem;
        text-align: center;
      }

      .active {
        background-color: map-get($colors, "accent");
        color: map-get($colors, "light");
      }
    }

    .differentBox {
      padding: 2em;
      position: relative;
      background-color: map-get($colors, "bgc");
      width: 80%;
      border-radius: 0.3rem;
      box-shadow: black 0.1em 0.1em 0.1em;

      .userName {
        position: absolute;
        top: -30px;
        right: 50px;
        display: flex;
        align-items: center;

        .logoutBtn {
          border: 1px black solid;
          padding: 3px;
          cursor: pointer;
        }
      }

      .allTabs {
        position: absolute;
        display: flex;
        translate: 0 -100%;
        left: 20px;

        div {
          margin: 0 10px;
          border: 1px black solid;
          border-bottom: none;
          padding: 0 10px;
          cursor: pointer;
        }
      }
    }
  }
}
</style>
