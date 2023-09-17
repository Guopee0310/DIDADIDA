<template>
  <div style="height: 100px;">
    <div class="photo_stickers">
      <img src="../assets/images/member_nini.jpg" alt="">
    </div>
  </div>

  <div class="member_hello">
    <p>妮妮，您好！</p>
  </div>

  <div class="bonuspoints">
    <p>我的紅利點數 : <span>100</span> 點</p>
  </div>

  <div class="mem_main">
    <div>
      <div class="verification">
        <div class="verification_google">
          <img src="../assets/images/google_icon.png" alt="">
          <span>Google</span>
        </div>
        <label class="verification_label" for="verification_id">
          已驗證<input class="verification_input" type="checkbox" value="" id="verification_id" style="zoom: 160%;">
        </label>
      </div>

      <div class="member_nav">
        <button @click="btn = 'mem_account_settings'"><span>會員帳號設定</span></button>
        <button @click="btn = 'prod_order_inquiry'"><span>購物訂單查詢</span></button>
        <button @click="btn = 'tick_order_inquiry'"><span>購票訂單查詢</span></button>
        <!-- <button @click="btn = 'mem_bonuspoint'"><span>我的紅利點數</span></button> -->
        <button @click="btn = 'favorites_list'"><span>我的收藏清單</span></button>
      </div>
    </div>

    <div v-if="btn === 'mem_account_settings'" class="mem_account_settings">
      <h6>會員帳號設定</h6>
      <section class="profile__main">
        <div class="field__group" id="member_name">
          <div class="name">
            <div class="field__label">名</div>
            <input type="text" class="field_input" maxlength="50">
          </div>
          <div class="surname">
            <div class="field__label">姓</div>
            <input type="text" class="field_input" maxlength="50">
          </div>
        </div>
        <div class="field__group">
          <div>
            <div class="field__label">性別</div>
            <input type="text" class="field_input">
          </div>

        </div>
        <div class="field__group">
          <div>
            <div class="field__label">出生日期</div>
            <input type="date" class="field_input">
          </div>

        </div>
        <div class="field__group">
          <div>
            <div class="field__label">電話號碼</div>
            <input type="tel" class="field_input">
          </div>

        </div>
        <div class="field__group">
          <div>
            <div class="field__label">聯絡Email</div>
            <input type="email" class="field_input mem_email">
          </div>
        </div>
        <div class="field__group">
          <div>
            <div class="field__label">地址</div>
            <input type="text" class="field_input mem_addr">
          </div>
        </div>
      </section>
      <div class="field__action">
        <button class="mem_btn">儲存</button>
      </div>
    </div>

    <div v-else-if="btn === 'prod_order_inquiry'" class="prod_order_inquiry">
      <h6>購物訂單查詢</h6>
      <div class="prod_order_main">
        <div class="order_area">
          <div class="prod_order_group" v-for="prod in prodOrder" :key="prod.prodImg">
            <div class="prod_img">
              <img :src="prod.prodImg" alt="">
            </div>
            <div class="prod_info">
              <div class="item_info prod_item">
                <p>品項</p>
                <p>{{ prod.prodName }}</p>
              </div>
              <div class="item_info prod_count">
                <p>數量</p>
                <p>{{ prod.prodCount }}</p>
              </div>
              <div class="item_info prod_date">
                <p>時間</p>
                <p>{{ prod.prodDate }}</p>
              </div>
              <div class="item_info prod_price">
                <p>金額</p>
                <p>NT {{ prod.prodPrice }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="change_page">
          <button>下一頁</button>
        </div>
      </div>
    </div>

    <div v-else-if="btn === 'tick_order_inquiry'" class="tick_order_inquiry">
      <h6>購票訂單查詢</h6>
      <div class="tick_order_main">
        <div class="tick_area">
          <div class="tick_order_group" v-for="tick in tickOrder" :key="tick.tickImg">
            <div class="tick_img">
              <img :src="tick.tickImg" alt="">
            </div>
            <div class="tick_info">
              <div class="item_info tick_item">
                <p>票種</p>
                <p>{{ tick.tickName }}</p>
              </div>
              <div class="item_info tick_count">
                <p>數量</p>
                <p>{{ tick.tickName }}</p>
              </div>
              <div class="item_info tick_date">
                <p>時間</p>
                <p>{{ tick.tickDate }}</p>
              </div>
              <div class="item_info tick_price">
                <p>金額</p>
                <p>NT {{ tick.tickPrice }}</p>
              </div>
              <QRCode></QRCode>
            </div>
          </div>
        </div>
        <div class="change_page">
          <button>下一頁</button>
        </div>
      </div>
    </div>

    <div v-else="btn === 'mem_bonuspoint'" class="favorites_list">
      <h6>我的收藏清單</h6>
      <div class="favorites_list_main">
        <div class="favorites_list_area">
          <div class="favorites_list_group" v-for="favo in favoList" :key="favo.favoImg">
            <div class="favorites_list_img">
              <img :src="favo.favoImg" alt="">
            </div>
            <div class="favorites_list_info">
              <div>
                <h5>{{ favo.favoName }}</h5>
                <p>NT {{ favo.favoPrice }}</p>
              </div>
              <div>
                <p>{{ favo.favoIntroduction.mainIntro }}</p>
                <p>{{ favo.favoIntroduction.recommendation }}</p>
                <p>{{ favo.favoIntroduction.size }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="change_page">
          <button>下一頁</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// import VueQrcode from '../../node_modules/vue-qrcode';
import QRCode from '../components/QRCode.vue';
export default {
  components: {
    QRCode,
  },
  data() {
    return {
      btn: 'mem_account_settings',
      showModal: false,
      qrCodeData: 'https://yahoo.com.tw', // QR碼連到的地方
      prodOrder: [
        {
          prodImg: require("../assets/images/dolphin_pillow.jpg"),
          prodName: "極舒適海豚",
          prodCount: "2",
          prodDate: "2023.08.31",
          prodPrice: "399",
        },
        {
          prodImg: require("../assets/images/dolphin_pillow.jpg"),
          prodName: "極舒適海豚",
          prodCount: "2",
          prodDate: "2023.08.31",
          prodPrice: "399",
        },
        {
          prodImg: require("../assets/images/dolphin_pillow.jpg"),
          prodName: "極舒適海豚抱枕",
          prodCount: "2",
          prodDate: "2023.08.31",
          prodPrice: "399",
        },
      ],
      tickOrder: [
        {
          tickImg: require("../assets/images/dolphin_pillow.jpg"),
          tickName: "一般全票",
          tickCount: "2",
          tickDate: "2023.08.31",
          tickPrice: "250",
        }
      ],
      favoList: [
        {
          favoImg: require("../assets/images/dolphin_pillow.jpg"),
          favoName: "極舒適海豚抱枕",
          favoPrice: "499",
          favoIntroduction: {
            mainIntro: "海豚玩偶採用了沖繩傳統染色技法「紅型染」設計而成，充滿沖繩色彩。",
            recommendation: "同一系列產品中更有「海豚鑰匙圈」可供選擇。",
            size: "尺寸：14×11×22.5公分",
          },
        },
      ]

    }
  },
}

</script>
<style scoped lang="scss">
.header {
  position: relative;
}

.photo_stickers {
  display: inline-block;
  width: 270px;
  height: 270px;
  // border: 1px solid #333;
  border-radius: 50%;
  overflow: hidden;
  position: absolute;
  top: 60%;
  left: 6%;
  z-index: 2;

  img {
    width: 100%;
    height: 100%;
  }
}

.member_hello {
  width: 1200px;
  padding: 30px 55px 0px 55px;
  margin: 0 auto;
  font-size: map-get($fontSizes, 'h3');
}

.bonuspoints {
  width: 400px;
  margin-left: 90px;

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
}

.verification {
  width: 400px;
  height: 80px;
  margin: 30px;
  padding: 30px;
  border: 1px solid #333;
  border-radius: 15px;
  font-size: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;

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
  height: 400px;
  margin: 30px;
  border: 1px solid #333;
  border-radius: 15px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;

  button {
    width: 320px;
    height: 60px;
    border: 1px solid #333;
    border-radius: 15px;
    cursor: pointer;
  }

  span {
    font-size: map-get($fontSizes, 'h4');
    letter-spacing: 1px;
  }
}

h6 {
  padding: 20px 55px;
  font-size: map-get($fontSizes, 'h3');
}

.mem_account_settings {
  width: 600px;
  height: 800px;
  margin: 30px;
  border: 1px solid #333;
  border-radius: 15px;
  position: relative;



  .profile__main {
    height: 550px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  .field__label {
    letter-spacing: 1px;
    font-size: map-get($fontSizes, 'h4');
  }

  .field_input {
    width: 200px;
    height: 40px;
    margin: 5px 0;
    padding: 10px;
    letter-spacing: 1px;
    font-size: map-get($fontSizes, 'h4');
    border: 1px solid #333;
    border-radius: 5px;
  }

  .field__group {
    display: flex;
    justify-content: space-between;
    margin: 0 60px;
  }

  .mem_email,
  .mem_addr {
    width: 500px;
  }

  .mem_btn {
    width: 150px;
    height: 40px;
    border: 1px solid #333;
    border-radius: 5px;
    font-size: map-get($fontSizes, 'h4');
    letter-spacing: 1px;
  }

  .field__action {
    position: absolute;
    right: 45px;
    bottom: 60px;
  }
}



.prod_order_inquiry {
  width: 600px;
  height: 800px;
  margin: 30px;
  border: 1px solid #333;
  border-radius: 15px;

  .order_area {
    width: 500px;
    height: 650px;
    // border: 1px solid #333;
    border-radius: 15px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
  }

  .prod_order_group {
    width: 500px;
    height: 200px;
    border-bottom: 1px solid #333;
    display: flex;
    justify-content: space-evenly;
  }

  .prod_order_group:last-child {
    border-bottom: 0;
  }

  .prod_img {
    width: 200px;
    height: 150px;
    margin: 20px auto;
    border: 1px solid #333;
  }

  .prod_img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .prod_info {
    width: 200px;
    height: 150px;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
  }

  .item_info {
    display: flex;
    justify-content: space-evenly;
  }

  .item_info p:first-child {
    width: 50px;
    text-align: center;
    background-color: #eee;
  }

  .item_info p:nth-child(2) {
    width: 120px;
    margin-left: 10px;
  }
}

.tick_order_inquiry {
  width: 600px;
  height: 800px;
  margin: 30px;
  border: 1px solid #333;
  border-radius: 15px;

  .tick_area {
    width: 500px;
    height: 650px;
    // border: 1px solid #333;
    border-radius: 15px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
  }

  .tick_order_group {
    width: 500px;
    height: 208px;
    border-bottom: 1px solid #333;
    display: flex;
    justify-content: space-evenly;
  }

  .tick_order_group:last-child {
    border-bottom: 0;
  }

  .tick_img {
    width: 130px;
    height: 160px;
    margin: 20px auto;
    border: 1px solid #333;
  }

  .tick_img img {
    width: 100%;
  }

  .tick_info {
    width: 200px;
    height: 170px;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
  }

  .item_info {
    padding: 5px;
    display: flex;
    justify-content: space-evenly;
  }

  .item_info p:first-child {
    width: 50px;
    text-align: center;
    background-color: #eee;
  }

  .item_info p:nth-child(2) {
    width: 80px;
    margin-left: 10px;
  }

}

.favorites_list {
  width: 600px;
  height: 800px;
  margin: 30px;
  border: 1px solid #333;
  border-radius: 15px;

  .favorites_list_area {
    width: 500px;
    height: 650px;
    // border: 1px solid #333;
    border-radius: 15px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
  }

  .favorites_list_group {
    width: 500px;
    height: 208px;
    border-bottom: 1px solid #333;
    display: flex;
    align-items: center;
  }

  h5 {
    font-size: map-get($fontSizes, 'h4');
  }

  p {
    font-size: map-get($fontSizes, 'span');
  }

  .favorites_list_group:last-child {
    border-bottom: 0;
  }

  .favorites_list_img {
    width: 150px;
    height: 150px;
    margin: 20px auto;
    border: 1px solid #333;
  }

  .favorites_list_img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .favorites_list_info {
    width: 300px;
  }
}

.change_page {
  text-align: center;

  button {
    width: 80px;
    height: 30px;
    border: 1px solid;
    border-radius: 5px;
  }
}
</style>