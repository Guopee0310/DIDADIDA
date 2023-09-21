<template>
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
</template>
<script>
export default {
    name: "memAccoutSettings",
    data() {
        return {

        }
    },
}
</script>

<style scoped lang="scss">
.profile__main {
    height: 550px;
    margin-top: 60px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;


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
}



.field__action {
    position: absolute;
    right: 45px;
    bottom: 60px;

    .mem_btn {
        width: 150px;
        height: 40px;
        border: 0;
        border-radius: 5px;
        font-size: map-get($fontSizes, 'h4');
        letter-spacing: 1px;
        color: map-get($colors, 'light');
        background-color: map-get($colors, 'secondary');
    }
}
</style>