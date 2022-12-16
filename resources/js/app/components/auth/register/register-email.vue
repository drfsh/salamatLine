<template>
    <errors :items="error"></errors>
    <form class="f-ho">
        <input type="hidden" name="_token" :value="csrf_token">
        <div class="input-login rtl">
            <div class="hw100">
                <input name="name" v-model="name" type="text" placeholder="نام " required>
            </div>
            <div class="icon">
                <ic_user1></ic_user1>
            </div>
        </div>
        <div class="input-login rtl">
            <div class="hw100">
                <input name="email" type="email" v-model="email" placeholder="ایمیل" required>
            </div>
            <div class="icon">
                <ic_email></ic_email>
            </div>
        </div>
        <div class="input-login rtl">
            <div class="hw100">
                <input name="password" type="password" v-model="password" placeholder="پسورد" required>
            </div>
            <div class="icon">
                <ic_key></ic_key>
            </div>
        </div>
        <div style="margin-bottom: 4px;" class="input-login rtl">
            <div class="hw100">
                <input name="captcha" type="text" v-model="captchaCode" placeholder="کد امنیتی" required>
            </div>
            <div class="icon">
                <ic_shild_lock></ic_shild_lock>
            </div>
        </div>
        <div class="captcha">
            <ic_refresh @click="getCaptcha"></ic_refresh>
            <span v-html="captcha"></span>
        </div>
        <div>
            <button type="button" class="btn-login"  :class="{'active':going}" @click="register">
                <loading v-if="loading" class="small"></loading>
                <span v-else-if="going">در حال انتقال...</span>
                <span v-else>ثبت نام</span>
            </button>
        </div>
    </form>
</template>

<script>
import Ic_email from "../../icon/ic_email";
import Ic_key from "../../icon/ic_key";
import Loading from "../../loading/loading";
import Ic_user1 from "../../icon/ic_user1";
import Ic_shild_lock from "../../icon/ic_shild_lock";
import Ic_refresh from "../../icon/ic_refresh";
import Errors from "../popup/errors";

export default {
    name: "register-email",
    components: {Errors, Ic_refresh, Ic_shild_lock, Ic_user1, Loading, Ic_key, Ic_email},
    computed: {
        csrf_token() {
            return window.csrf_token
        }
    },
    data(){
        return{
            captcha:'',
            name:'',
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
        async register() {
            if (this.loading || this.going) return
            this.loading = true
            let m = {name:this.name,email: this.email, password: this.password, captcha: this.captchaCode}
            let {data} = await window.axios.post('/register', m)
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
    },
    mounted() {
        this.getCaptcha()
    }
}
</script>

<style scoped>

</style>
