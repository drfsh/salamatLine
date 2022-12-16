<template>
<div class="auth-box">
    <div class="title-p" v-if="false">
        <div class="current-page">ورود</div>
        <a href="/register" class="next-page">
            ثبت نام
            <ic_arrow_left></ic_arrow_left>
        </a>
    </div>
    <h4 v-if="page!==1">ورود</h4>
    <h4 v-else>ورود یا ثبت نام</h4>

    <div v-if="page===1" class="user-type-">
        <span>نوع کاربری خود را انتخابی کنید</span>
        <div style="margin: 13px 0;">
            <input id="dc" class="rd1" type="radio" v-model="userType" value="0">
            <label for="dc">
                مصرف کننده
            </label>
            <input id="df" class="rd1" type="radio" v-model="userType" value="1">
            <label for="df">
                همکار و متخصص
            </label>
        </div>
    </div>

    <div class="body-login text-center">
        <auth-phone v-if="page===1"></auth-phone>
        <auth-email v-if="page===2"></auth-email>
        <auth-enter-code v-if="page===3"></auth-enter-code>
        <div v-if="page!==3">
            <div class="or-line">
                <span class="line"></span>
                <span class="text">یا</span>
                <span class="line"></span>
            </div>
            <auth-google></auth-google>
            <div>

                <a @click="page=2" v-if="page===1" class="open-auth-email">
                    <span class="icon-email">
                        <ic_email></ic_email>
                    </span>
                    <span class="google-button__text">ورود با ایمیل</span>
                </a>
                <a v-if="page===2" @click="page=1" class="open-auth-email">
                    <span class="icon-email">
                        <ic_mobile></ic_mobile>
                    </span>
                    <span class="google-button__text">ورود با شماره</span>
                </a>
            </div>
            <div>
                <a href="/page/legal" target="_blank">
                    <span class="q">قوانین استفاده از سلامت لاین را پذیرفته ام</span>
                </a>
            </div>
        </div>
    </div>


</div>
</template>

<script>
import AuthPhone from "./number/auth-phone";
import AuthGoogle from "./auth-google";
import Ic_email from "../icon/ic_email";
import Ic_mobile from "../icon/ic_mobile";
import AuthEmail from "./login/auth-email";
import AuthEnterCode from "./number/auth-enter-code";
import Ic_arrow_left from "../icon/ic_arrow_left";
export default {
    name: "login",
    components: {Ic_arrow_left, AuthEnterCode, AuthEmail, Ic_mobile, Ic_email, AuthGoogle, AuthPhone},
    data(){
        return{
            page:1,
            mobile:'09',
            userType : 0
        }
    }
}
</script>

<style scoped>

</style>
