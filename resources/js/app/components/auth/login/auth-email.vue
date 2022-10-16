<template>
    <errors :items="error"></errors>
    <div class=" info">ایمیل و پسورد خود را وارد کنید</div>
    <form class="f-ho">
        <input type="hidden" name="_token" :value="csrf_token">
        <div class="input-login">
            <div class="hw100">
                <input name="email" type="email" v-model="email" placeholder="youremail@example.com">
            </div>
            <div class="icon">
                <ic_email></ic_email>
            </div>
        </div>
        <div class="input-login">
            <div class="hw100">
                <input name="password" type="password" v-model="password" placeholder="*******" >
            </div>
            <div class="icon">
                <ic_key></ic_key>
            </div>
        </div>
        <div style="margin-bottom: 4px;" class="input-login">
            <div class="hw100">
                <input name="captcha" type="text" v-model="captchaCode" placeholder="کد امنیتی" >
            </div>
            <div class="icon">
                <ic_shild_lock></ic_shild_lock>
            </div>
        </div>
        <div class="captcha">
            <ic_refresh @click="getCaptcha"></ic_refresh>
            <span v-html="captcha"></span>
        </div>
        <div class="check-q">
            <input type="checkbox" class="m-0" name="remember" id="remember">
            <label for="remember">
                مرا به خاطرت نگه دار
            </label>
        </div>
        <div>
            <button type="button" @click="login" class="btn-login m-0" :class="{'active':going}">
                <loading v-if="loading" class="small"></loading>
                <span v-else-if="going">در حال انتقال...</span>
                <span v-else>ورود</span>
            </button>
        </div>
    </form>
    <div style="
    margin-bottom: 15px;
    font-size: 13px;
    margin-top: 10px;">
        <a href="/password/reset">بازیابی رمز عبور</a>
    </div>
</template>

<script>
import Ic_email from "../../icon/ic_email";
import Ic_key from "../../icon/ic_key";
import Loading from "../../loading/loading";
import Ic_refresh from "../../icon/ic_refresh";
import Ic_shild_lock from "../../icon/ic_shild_lock";
import Errors from "../popup/errors";
export default {
    name: "auth-email",
    components: {Errors, Ic_shild_lock, Ic_refresh, Loading, Ic_key, Ic_email},
    computed:{
        csrf_token(){
            return window.csrf_token
        }
    },
    data(){
        return{
            captcha:'',
            captchaCode:'',
            email:'',
            password:'',
            loading:false,
            error:[],
            going:false
        }
    },
    methods:{
        async getCaptcha() {
            let {data} = await window.axios.get('/reload-captcha')
            this.captcha = data.captcha;
        },
        async login() {
            if (this.loading || this.going) return
            this.loading = true
            let m = {email: this.email, password: this.password, captcha: this.captchaCode}
            let {data} = await window.axios.post('/login', m)
            if (data['true']==true)
            {
                location.href = data.redirect
                this.error = []
                this.going = true
            }else {
                this.getCaptcha()
                this.error = data.messages
            }
            this.loading = false
        }
    }
    ,mounted() {
        this.getCaptcha()
    }
}
</script>

<style scoped>

</style>
