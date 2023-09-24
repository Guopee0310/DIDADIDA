<template>
  <div class="stickers">
    <div class="photo_stickers">
      <img src="../assets/images/member_nini.jpg" alt="" />
    </div>
  </div>

  <div class="member_hello">
    <div class="deco_fishes">
      <img src="../../public/all_images/deco/deco_fishes.png" alt="" />
    </div>
    <p>{{ this.$store.state.userName }}，您好！</p>
  </div>

  <div class="bonuspoints">
    <p>
      我的紅利點數 : <span>{{ remainingTodos }}</span> 點
    </p>
  </div>

  <div class="mem_main">
    <div>
      <div class="verification">
        <div class="verification_google">
          <img src="../assets/images/google_icon.png" alt="" />
          <span>Google</span>
        </div>
        <label class="verification_label" for="verification_id">
          已驗證<input class="verification_input" type="checkbox" value="" id="verification_id" style="zoom: 160%" />
        </label>
      </div>

      <div class="member_nav">
        <button @click="btn = 'mem_account_settings'">
          <span>{{ $t('會員帳號設定') }}</span>
        </button>
        <button @click="btn = 'prod_order_inquiry'">
          <span>{{ $t('購物訂單查詢') }}</span>
        </button>
        <button @click="btn = 'tick_order_inquiry'">
          <span>{{ $t('購票訂單查詢') }}</span>
        </button>
        <button @click="btn = 'favorites_list'">
          <span>{{ $t('我的收藏清單') }}</span>
        </button>
        <div class="bubble group_r">
          <img src="../../public/all_images/bubble1.png" alt="" />
        </div>
        <div class="bubble group_l">
          <img src="../../public/all_images/bubble2.png" alt="" />
        </div>
      </div>
      <div class="mempic">
        <img src="../../public/all_images/pipi.jpg" alt="" />
      </div>
    </div>

    <div v-if="btn === 'mem_account_settings'" class="mem_account_settings member_area">
      <h6>{{ $t('會員帳號設定') }}</h6>
      <memAccoutSettings></memAccoutSettings>
      <memAreaBG></memAreaBG>
    </div>

    <div v-else-if="btn === 'prod_order_inquiry'" class="prod_order_inquiry member_area">
      <h6>{{ $t('購物訂單查詢') }}</h6>
      <prodOrderInquiry></prodOrderInquiry>
      <memAreaBG></memAreaBG>
    </div>

    <div v-else-if="btn === 'tick_order_inquiry'" class="tick_order_inquiry member_area">
      <h6>{{ $t('購票訂單查詢') }}</h6>
      <tickOrderInquiry></tickOrderInquiry>
      <memAreaBG></memAreaBG>
    </div>

    <div v-else="btn === 'mem_bonuspoint'" class="favorites_list member_area">
      <h6>{{ $t('我的收藏清單') }}</h6>
      <favoritesList></favoritesList>
      <memAreaBG></memAreaBG>
    </div>
  </div>
</template>
<script>
import memAccoutSettings from "../components/memAccoutSettings.vue";
import prodOrderInquiry from "../components/prodOrderInquiry.vue";
import tickOrderInquiry from "../components/tickOrderInquiry.vue";
import favoritesList from "../components/favoritesList.vue";
import memAreaBG from "../components/memAreaBG.vue";
import { mapGetters } from "vuex";
export default {
  components: {
    memAccoutSettings,
    prodOrderInquiry,
    tickOrderInquiry,
    favoritesList,
    memAreaBG,
  },
  data() {
    return {
      btn: "mem_account_settings",
    };
  },
  computed: {
    score() {
      return this.$store.state.totalScorePoint;
    },
    ...mapGetters(["remainingTodos"]),
  },
  methods: {

  }
};
</script>
<style scoped lang="scss">
.stickers {
  width: 1200px;
  height: 100px;
  margin: 0 auto;
  position: relative;

  .photo_stickers {
    display: inline-block;
    width: 270px;
    height: 270px;
    border-radius: 50%;
    overflow: hidden;
    position: absolute;
    top: -160px;
    left: 65px;
    z-index: 2;

    img {
      width: 100%;
      height: 100%;
    }
  }
}



.member_hello {
  width: 1200px;
  padding: 30px 55px 0px 55px;
  margin: 0 auto;
  font-size: map-get($fontSizes, "h3");
  position: relative;

  .deco_fishes {
    position: absolute;
    top: -180px;
    right: 230px;
  }
}

.bonuspoints {
  padding-left: 60px;
  width: 1200px;
  margin: 0 auto;

  p {
    font-size: 14px;

    span {
      font-size: 20px;
    }
  }
}

.mem_main {
  width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-evenly;

  .verification {
    width: 400px;
    height: 80px;
    margin: 30px;
    padding: 30px;
    border: 0;
    border-radius: 15px;
    font-size: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: map-get($colors, "bgc");

    .verification_google {
      width: 100px;
      display: flex;
      justify-content: space-evenly;
      align-items: center;
    }

    .verification_label {
      width: 100px;
      display: flex;
      justify-content: space-evenly;
      align-items: center;
    }
  }

  .member_nav {
    width: 400px;
    height: 500px;
    margin: 30px;
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    background-color: map-get($colors, "secondary");
    position: relative;

    .bubble {
      position: absolute;
    }

    .group_r {
      right: -30px;
      bottom: -180px;
    }

    .group_l {
      left: -40px;
      bottom: -415px;
    }

    button {
      width: 320px;
      height: 60px;
      border: 0;
      border-radius: 15px;
      cursor: pointer;
      background-color: #fff;
    }

    :hover {
      background-color: map-get($colors, 'memBtn');
    }

    span {
      font-size: map-get($fontSizes, "h4");
      letter-spacing: 1px;
    }
  }

  h6 {
    padding: 20px 55px;
    font-size: map-get($fontSizes, "h3");
  }

  .member_area {
    width: 600px;
    height: 1000px;
    margin: 30px;
    border: 0;
    border-radius: 15px;
    position: relative;
    background-color: map-get($colors, "mainColor");
    color: map-get($colors, "light");
    overflow: hidden;
  }

  .mempic {
    display: inline-block;
    width: 370px;
    height: 320px;
    border-radius: 50% 65% 65% 50%;
    overflow: hidden;
    margin: 20px 35px;
    position: relative;

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
}



@media screen and (max-width:768px) {
  .stickers {
    .photo_stickers {
      width: 200px;
      height: 200px;
      top: -120px;
    }
  }

  .member_hello {
    width: 100%;
    font-size: map-get($fontSizes, "h5");

    .deco_fishes {
      right: 100px;
    }
  }

  .mem_main {
    width: 100%;
    flex-direction: column;
    align-items: center;

    .verification {
      width: 600px;
    }

    .member_nav {
      width: 600px;

      button {
        width: 550px;
      }
    }

    .mempic,
    .bubble {
      display: none;
    }
  }

}

@media screen and (max-width:414px) {
  .stickers {
    height: 40px;

    .photo_stickers {
      width: 120px;
      height: 120px;
      top: -75px;
    }
  }

  .member_hello {
    width: 100%;
    font-size: map-get($fontSizes, "h5");

    .deco_fishes {
      right: -100px;
      top: -80px;

      img {
        width: 60%;
      }
    }
  }

  .mem_main {
    width: 100%;

    h6 {
      padding: 20px 25px;
    }

    .verification {
      width: 350px;
    }

    .member_nav {
      width: 350px;
      height: 380px;
      margin: 0 30px;
      background-color: map-get($colors, 'bgc');

      button {
        width: 310px;
        background-color: map-get($colors, 'memnav');
      }
    }

    .member_area {
      width: 350px;
      height: 850px;
      background-color: map-get($colors, 'bgc');
      color: map-get($colors, 'dark');
    }

    .mempic,
    .bubble {
      display: none;
    }
  }
}
</style>
