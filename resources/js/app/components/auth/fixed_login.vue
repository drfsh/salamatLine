<template>
    <div class="fixed_login">
        <div @click="close" class="disabling"></div>
        <div :class="{'active':show}" class="auth-box">
            <i role="button" @click="close" class="fas fa-times"></i>
            <h4>ورود </h4>

            <div class="body-login text-center">
                <auth-phone v-if="page===1"></auth-phone>
                <auth-email v-if="page===2"></auth-email>
                <auth-enter-code :fixed="this" v-if="page===3"></auth-enter-code>
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
    </div>
</template>

<script>
import AuthPhone from "./number/auth-phone";
import AuthGoogle from "./auth-google";
import Ic_email from "../icon/ic_email";
import Ic_mobile from "../icon/ic_mobile";
import AuthEmail from "./login/auth-email";
import AuthEnterCode from "./number/auth-enter-code";
export default {
    name: "fixed_login",
    components: {AuthEnterCode, AuthEmail, Ic_mobile, Ic_email, AuthGoogle, AuthPhone},
    data(){
        return{
            page:1,
            mobile:'09',
            show:false
        }
    },
    methods:{
        close(){
            let vm = this
            vm.show = false
            setTimeout(function () {
                vm.$parent.showLogin=false
                window.boxAlert.type = ''
            },200)
        }
    },
    mounted() {
        let vm = this
        setTimeout(function () {
            vm.show = true
        },100)
    }
}
</script>

<style scoped>

</style>
