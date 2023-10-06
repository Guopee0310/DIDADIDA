<template>
  <section class="profile__main">
    <!-- 姓名 -->
    <div class="field__group mem_name">
      <div class="name">
        <div class="field__label">姓名</div>

        <input
          type="text"
          class="field_input"
          maxlength="50"
          v-model="mem_name"
          disabled
        />
      </div>
      <!-- <div class="surname">
                <div class="field__label">姓</div>
                <input type="text" class="field_input" maxlength="50">
            </div> -->
    </div>
    <!-- 性別 -->
    <div class="field__group">
      <div>
        <div class="field__label">性別</div>
        <input type="text" class="field_input" />
      </div>
    </div>
    <!-- 出生日期 -->
    <div class="field__group">
      <div>
        <div class="field__label">出生日期</div>
        <input type="date" class="field_input" v-model="mem_birth" />
      </div>
    </div>
    <!-- 電話號碼 -->
    <div class="field__group">
      <div>
        <div class="field__label">電話號碼</div>
        <input type="tel" class="field_input" v-model="mem_mob" />
      </div>
    </div>
    <!-- Email -->
    <div class="field__group">
      <div>
        <div class="field__label">聯絡Email</div>
        <input type="email" class="field_input mem_email" v-model="mem_email" />
      </div>
    </div>
    <!-- 地址 -->
    <div class="field__group">
      <div>
        <div class="field__label">地址</div>
        <input type="text" class="field_input mem_addr" v-model="mem_address" />
      </div>
    </div>
  </section>
  <div class="field__action">
    <button class="mem_btn">儲存</button>
  </div>
</template>
<script>
export default {
  name: "memAccoutSettings",
  data() {
    return {
      mem_list: [],
      mem_address: "",
      mem_mob: "",
      mem_email: "",
      mem_birth: "",
      mem_gender: "",
      mem_name: "",
    };
  },
  mounted() {
    if (this.$store.state.userName) {
      const formData = new FormData();

      let mem_name = this.$store.state.userName;

      formData.append("mem_name", mem_name);

      fetch(`${this.$store.state.APIurl}memAccoutSetting.php`, {
        method: "post",
        body: formData,
      })
        .then((res) => res.json())
        .then((data) => {
          this.mem_list = data;
          this.mem_address = this.mem_list[0].mem_address;
          this.mem_mob = this.mem_list[0].mem_mob;
          this.mem_email = this.mem_list[0].mem_email;
          this.mem_birth = this.mem_list[0].mem_birth;
          this.mem_gender = this.mem_list[0].mem_gender;
          this.mem_name = this.mem_list[0].mem_name;
        });
    }
  },
};
</script>

<style scoped lang="scss">
.profile__main {
  width: 450px;
  height: 550px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;

  .field__group {
    width: 430px;

    .field__label {
      letter-spacing: 1px;
      font-size: map-get($fontSizes, "p");
    }

    .field_input {
      width: 430px;
      height: 40px;
      margin: 5px 0;
      padding: 10px;
      letter-spacing: 1px;
      font-size: map-get($fontSizes, "p");
      border: 1px solid #333;
      border-radius: 5px;
    }
  }

  .mem_name {
    display: flex;
    justify-content: space-between;

    .field_input {
      width: 200px;
    }
  }
}

.field__action {
  width: 500px;
  margin: 0 auto;
  text-align: center;
  border-top: 1px solid;
  padding-top: 30px;
  margin-top: 60px;

  .mem_btn {
    width: 150px;
    height: 40px;
    border: 0;
    border-radius: 5px;
    font-size: map-get($fontSizes, "p");
    letter-spacing: 1px;
    color: map-get($colors, "light");
    background-color: map-get($colors, "h2Blue");
  }
}

@media screen and (max-width: 414px) {
  .profile__main {
    margin-top: 20px;

    .field__group {
      margin: 5px 30px;
      flex-direction: column;
    }

    .mem_email,
    .mem_addr {
      width: 300px;
    }

    .field_input {
      border: 0;
    }
  }

  .field__action {
    right: 25px;
    bottom: 70px;
  }
}
</style>
