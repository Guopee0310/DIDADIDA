<template>
  <div style="height: 100px">
    <div class="photo_stickers">
      <img src="../assets/images/member_nini.jpg" alt="" />
    </div>
  </div>

  <div class="member_hello">
    <p>{{ this.$store.state.userName }}，您好！</p>
  </div>

  <div class="bonuspoints">
    <p>我的紅利點數 : <span>100</span> 點</p>
  </div>

  <div class="mem_main">
    <div>
      <div class="verification">
        <div class="verification_google">
          <img src="../assets/images/google_icon.png" alt="" />
          <span>Google</span>
        </div>
        <label class="verification_label" for="verification_id">
          已驗證<input
            class="verification_input"
            type="checkbox"
            value=""
            id="verification_id"
            style="zoom: 160%"
          />
        </label>
      </div>

      <div class="member_nav">
        <button @click="btn = 'mem_account_settings'">
          <span>會員帳號設定</span>
        </button>
        <button @click="btn = 'prod_order_inquiry'">
          <span>購物訂單查詢</span>
        </button>
        <button @click="btn = 'tick_order_inquiry'">
          <span>購票訂單查詢</span>
        </button>
        <!-- <button @click="btn = 'mem_bonuspoint'"><span>我的紅利點數</span></button> -->
        <button @click="btn = 'favorites_list'">
          <span>我的收藏清單</span>
        </button>
      </div>
    </div>

    <div v-if="btn === 'mem_account_settings'" class="mem_account_settings">
      <h6>會員帳號設定</h6>
      <section class="profile__main">
        <div class="field__group" id="member_name">
          <div class="name">
            <div class="field__label">名</div>
            <input type="text" class="field_input" maxlength="50" />
          </div>
          <div class="surname">
            <div class="field__label">姓</div>
            <input type="text" class="field_input" maxlength="50" />
          </div>
        </div>
        <div class="field__group">
          <div>
            <div class="field__label">性別</div>
            <input type="text" class="field_input" />
          </div>
        </div>
        <div class="field__group">
          <div>
            <div class="field__label">出生日期</div>
            <input type="date" class="field_input" />
          </div>
        </div>
        <div class="field__group">
          <div>
            <div class="field__label">電話號碼</div>
            <input type="tel" class="field_input" />
          </div>
        </div>
        <div class="field__group">
          <div>
            <div class="field__label">聯絡Email</div>
            <input type="email" class="field_input mem_email" />
          </div>
        </div>
        <div class="field__group">
          <div>
            <div class="field__label">地址</div>
            <input type="text" class="field_input mem_addr" />
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
          <div class="prod_order_group">
            <div class="prod_img">
              <img src="../assets/images/dolphin_doll.png" alt="" />
            </div>
            <div class="prod_info">
              <div class="item_info prod_item">
                <p>品項</p>
                <p>海豚玩偶</p>
              </div>
              <div class="item_info prod_count">
                <p>數量</p>
                <p>2件</p>
              </div>
              <div class="item_info prod_date">
                <p>時間</p>
                <p>2023.08.31</p>
              </div>
              <div class="item_info prod_price">
                <p>金額</p>
                <p>NT 900</p>
              </div>
            </div>
          </div>
          <div class="prod_order_group">
            <div class="prod_img">
              <img src="../assets/images/Nemo_doll.jpg" alt="" />
            </div>
            <div class="prod_info">
              <div class="item_info prod_item">
                <p>品項</p>
                <p>海豚玩偶</p>
              </div>
              <div class="item_info prod_count">
                <p>數量</p>
                <p>2件</p>
              </div>
              <div class="item_info prod_date">
                <p>時間</p>
                <p>2023.08.31</p>
              </div>
              <div class="item_info prod_price">
                <p>金額</p>
                <p>NT 900</p>
              </div>
            </div>
          </div>
          <div class="prod_order_group">
            <div class="prod_img">
              <img src="../assets/images/sealion_doll.png" alt="" />
            </div>
            <div class="prod_info">
              <div class="item_info prod_item">
                <p>品項</p>
                <p>海豚玩偶</p>
              </div>
              <div class="item_info prod_count">
                <p>數量</p>
                <p>2件</p>
              </div>
              <div class="item_info prod_date">
                <p>時間</p>
                <p>2023.08.31</p>
              </div>
              <div class="item_info prod_price">
                <p>金額</p>
                <p>NT 900</p>
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
          <div class="tick_order_group">
            <div class="tick_img">
              <img src="" alt="" />
            </div>
            <div class="tick_info">
              <div class="item_info tick_item">
                <p>票種</p>
                <p>一般全票</p>
              </div>
              <div class="item_info tick_count">
                <p>數量</p>
                <p>1張</p>
              </div>
              <div class="item_info tick_date">
                <p>時間</p>
                <p>2023.08.31</p>
              </div>
              <div class="item_info tick_price">
                <p>金額</p>
                <p>NT 900</p>
              </div>
              <div>
                <button class="qr_btn" @click="showModal = true">
                  顯示電子票券
                </button>
                <transition name="fade">
                  <div v-if="showModal" class="modal">
                    <div class="modal-content">
                      <div class="qrcode-content">
                        <div class="qrcode-img">
                          <span class="close" @click="showModal = false"
                            >&times;</span
                          >
                          <vue-qrcode
                            :value="qrCodeData"
                            :size="150"
                          ></vue-qrcode>
                        </div>
                        <div class="qrcode-info">
                          <div
                            style="height: 60px; border-left: 3px solid #333"
                          ></div>
                          <div>
                            <p>DIDADIDA好時光全票</p>
                            <p>2023.08.31</p>
                            <p>請掃描電子票券入場</p>
                          </div>
                        </div>
                        <div class="qr-confirm-btn" @click="showModal = false">
                          <button>確認</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </transition>
              </div>
            </div>
          </div>
          <div class="tick_order_group">
            <div class="tick_img">
              <img src="" alt="" />
            </div>
            <div class="tick_info">
              <div class="item_info tick_item">
                <p>票種</p>
                <p>一般全票</p>
              </div>
              <div class="item_info tick_count">
                <p>數量</p>
                <p>1張</p>
              </div>
              <div class="item_info tick_date">
                <p>時間</p>
                <p>2023.08.31</p>
              </div>
              <div class="item_info tick_price">
                <p>金額</p>
                <p>NT 900</p>
              </div>
              <div>
                <button class="qr_btn" @click="showModal = true">
                  顯示電子票券
                </button>
                <transition name="fade">
                  <div v-if="showModal" class="modal">
                    <div class="modal-content">
                      <div class="qrcode-content">
                        <div class="qrcode-img">
                          <span class="close" @click="showModal = false"
                            >&times;</span
                          >
                          <vue-qrcode
                            :value="qrCodeData"
                            :size="150"
                          ></vue-qrcode>
                        </div>
                        <div class="qrcode-info">
                          <div
                            style="height: 60px; border-left: 3px solid #333"
                          ></div>
                          <div>
                            <p>DIDADIDA好時光全票</p>
                            <p>2023.08.31</p>
                            <p>請掃描電子票券入場</p>
                          </div>
                        </div>
                        <div class="qr-confirm-btn" @click="showModal = false">
                          <button>確認</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </transition>
              </div>
            </div>
          </div>
          <div class="tick_order_group">
            <div class="tick_img">
              <img src="" alt="" />
            </div>
            <div class="tick_info">
              <div class="item_info tick_item">
                <p>票種</p>
                <p>一般全票</p>
              </div>
              <div class="item_info tick_count">
                <p>數量</p>
                <p>1張</p>
              </div>
              <div class="item_info tick_date">
                <p>時間</p>
                <p>2023.08.31</p>
              </div>
              <div class="item_info tick_price">
                <p>金額</p>
                <p>NT 900</p>
              </div>
              <div>
                <button class="qr_btn" @click="showModal = true">
                  顯示電子票券
                </button>
                <transition name="fade">
                  <div v-if="showModal" class="modal">
                    <div class="modal-content">
                      <div class="qrcode-content">
                        <div class="qrcode-img">
                          <span class="close" @click="showModal = false"
                            >&times;</span
                          >
                          <vue-qrcode
                            :value="qrCodeData"
                            :size="150"
                          ></vue-qrcode>
                        </div>
                        <div class="qrcode-info">
                          <div
                            style="height: 60px; border-left: 3px solid #333"
                          ></div>
                          <div>
                            <p>DIDADIDA好時光全票</p>
                            <p>2023.08.31</p>
                            <p>請掃描電子票券入場</p>
                          </div>
                        </div>
                        <div class="qr-confirm-btn" @click="showModal = false">
                          <button>確認</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </transition>
              </div>
            </div>
          </div>
        </div>
        <div class="change_page">
          <button>下一頁</button>
        </div>
      </div>
    </div>
    <!-- <div v-else-if="btn === 'mem_bonuspoint'" class="mem_bonuspoint">
      <h6>我的紅利點數</h6>
      <div class="nowpoint">
        <p>目前點數 : <span>100</span> 點 </p>
      </div>
      <div class="point_record">
        <table>
          <caption>點數紀錄</caption>
          <tr>
            <th>日期</th>
            <th>項目</th>
            <th>點數</th>
          </tr>
          <tr>
            <td>8 / 31</td>
            <td>試手氣</td>
            <td> + 110 點 </td>
          </tr>
          <tr>
            <td>9 / 1</td>
            <td>商品折抵</td>
            <td> - 10 點 </td>
          </tr>
        </table>
      </div>
      <div class="change_page">
        <button>下一頁</button>
      </div>
    </div> -->
    <div v-else="btn === 'mem_bonuspoint'" class="favorites_list">
      <h6>我的收藏清單</h6>
      <div class="favorites_list_main">
        <div class="favorites_list_area">
          <div class="favorites_list_group">
            <div class="favorites_list_img">
              <img src="../assets/images/dolphin_doll.png" alt="" />
            </div>
            <div class="favorites_list_info">
              <div>
                <h5>海豚玩偶</h5>
                <p>NT 450</p>
              </div>
              <div>
                <p>
                  海豚玩偶採用了沖繩傳統染色技法「紅型染」設計而成，充滿沖繩色彩。
                </p>
                <p>同一系列產品中更有「海豚鑰匙圈」可供選擇。</p>
                <p>尺寸：14×11×22.5公分</p>
              </div>
            </div>
          </div>
          <div class="favorites_list_group">
            <div class="favorites_list_img">
              <img src="../assets/images/dolphin_doll.png" alt="" />
            </div>
            <div class="favorites_list_info">
              <div>
                <h5>海豚玩偶</h5>
                <p>NT 450</p>
              </div>
              <div>
                <p>
                  海豚玩偶採用了沖繩傳統染色技法「紅型染」設計而成，充滿沖繩色彩。
                </p>
                <p>同一系列產品中更有「海豚鑰匙圈」可供選擇。</p>
                <p>尺寸：14×11×22.5公分</p>
              </div>
            </div>
          </div>
          <div class="favorites_list_group">
            <div class="favorites_list_img">
              <img src="../assets/images/dolphin_doll.png" alt="" />
            </div>
            <div class="favorites_list_info">
              <div>
                <h5>海豚玩偶</h5>
                <p>NT 450</p>
              </div>
              <div>
                <p>
                  海豚玩偶採用了沖繩傳統染色技法「紅型染」設計而成，充滿沖繩色彩。
                </p>
                <p>同一系列產品中更有「海豚鑰匙圈」可供選擇。</p>
                <p>尺寸：14×11×22.5公分</p>
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
import VueQrcode from "../../node_modules/vue-qrcode";

export default {
  components: {
    VueQrcode,
  },
  data() {
    return {
      btn: "mem_account_settings",
      showModal: false,
      qrCodeData: "https://yahoo.com.tw", // QR碼連到的地方
    };
  },
};
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
  font-size: map-get($fontSizes, "h3");
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
    font-size: map-get($fontSizes, "h4");
    letter-spacing: 1px;
  }
}

h6 {
  padding: 20px 55px;
  font-size: map-get($fontSizes, "h3");
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
    font-size: map-get($fontSizes, "h4");
  }

  .field_input {
    width: 200px;
    height: 40px;
    margin: 5px 0;
    padding: 10px;
    letter-spacing: 1px;
    font-size: map-get($fontSizes, "h4");
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
    font-size: map-get($fontSizes, "h4");
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
    justify-content: space-evenly;
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
    width: 80px;
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
    justify-content: space-evenly;
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

  .qr_btn {
    width: 150px;
    margin: 5px;
  }
}

// .mem_bonuspoint {
//   width: 600px;
//   height: 800px;
//   margin: 30px;
//   border: 1px solid #333;
//   border-radius: 15px;

//   .nowpoint {
//     width: 300px;
//     height: 80px;
//     border-bottom: 1px solid;
//     margin: 0 auto;
//     display: flex;
//     justify-content: center;
//     align-items: center;

//     p {
//       font-size: map-get($fontSizes, 'div');
//     }

//     span {
//       font-size: map-get($fontSizes, 'h3');
//     }
//   }

//   .point_record {
//     width: 500px;
//     height: 500px;
//     margin: 20px auto;

//     table {
//       width: 500px;

//       caption {
//         font-size: map-get($fontSizes, 'div');
//         margin-bottom: 10px;
//       }

//       tr {
//         height: 30px;
//         border-bottom: 1px solid #ddd;
//       }

//       td,
//       th {
//         text-align: center;
//         vertical-align: middle;
//       }
//     }
//   }
// }

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
    justify-content: space-evenly;
  }

  .favorites_list_group {
    width: 500px;
    height: 208px;
    border-bottom: 1px solid #333;
    display: flex;
    align-items: center;
  }

  h5 {
    font-size: map-get($fontSizes, "h4");
  }

  p {
    font-size: map-get($fontSizes, "span");
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

.modal {
  // display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.3);
  z-index: 10;
  justify-content: center;
  align-items: center;

  .modal-content {
    width: 500px;
    height: 550px;
    margin: 0 auto;
    border: 0;
    border-radius: 15px;
    text-align: center;
    background-color: #fff;
    padding: 20px;
    position: relative;
    top: 30px;
    display: flex;
    align-items: center;
  }

  .close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }

  .qrcode-content {
    width: 420px;
    height: 480px;
    margin: 0 auto;
    border: 0;
    border-radius: 15px;
    background-color: aqua;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
  }

  .qrcode-img {
    width: 200px;
    height: 200px;
    margin: 0 auto;

    img {
      width: 100%;
      border: 0;
      border-radius: 15px;
    }
  }

  .qrcode-info {
    width: 200px;
    height: 120px;
    margin: 0 auto;
    text-align: justify;
    display: flex;
    // flex-direction: column;
    justify-content: space-evenly;
    align-items: center;

    p {
      font-size: map-get($fontSizes, "p");
    }
  }

  .qr-confirm-btn button {
    width: 70px;
    height: 40px;
    border: 0;
    border-radius: 10px;
    background-color: map-get($colors, "mainColor");
    color: #eee;
    font-weight: bold;
  }
}

// 彈窗顯示與隱藏延遲動畫效果
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
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
