<template>
    <div class=" info">لطفا کد کشور را انتخاب و شماره خود را وارد کنید</div>
    <div class="alert" v-if="alert!==null">{{ alert }}</div>
    <div class="">
        <div class="input-phone">
            <div>
                <input v-model="mobile" type="text" id="number">
            </div>
            <div class="select-code">
                <img src="#">
                <span>(+98)</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <div v-if="showName" class="input-login rtl">
            <div>
                <input v-model="name" type="text" placeholder="نام" required>
            </div>
            <div class="icon">
                <ic_user1></ic_user1>
            </div>
        </div>
        <div>
            <button @click="setRequest" class="btn-login">
                <loading v-if="loading" class="small"></loading>
                <span v-else>ورود</span>
            </button>
        </div>
    </div>

</template>

<script>
import AuthGoogle from "../auth-google";
import Ic_email from "../../icon/ic_email";
import Ic_user1 from "../../icon/ic_user1";
import Loading from "../../loading/loading";

export default {
    name: "auth-phone",
    components: {Loading, Ic_user1, Ic_email, AuthGoogle},
    data() {
        return {
            mobile: '09',
            name: '',
            showName: false,
            loading: false,
            alert: null,
            EnterCode:false
        }
    },
    methods: {
        async setRequest() {
            if (this.loading===true) return''

            let input = document.getElementById('number')
            this.loading = true
            input.disabled = 'disabled'
            let m = {lname: '', mobile: this.mobile, name: this.name}
            let {data} = await window.axios.post('/request-login/1', m)

            if (data['EnterPhone'] === true) {
                this.alert = data['alert']
                if (data['show_name'] == true) {
                    this.showName = true
                }
            }else if (data['EnterPhone']===false){
                this.$parent.mobile = this.mobile
               this.$parent.page = 3
            }
            this.loading = false
            input.disabled = ''
        }
    },
    mounted() {
        this.mobile =this.$parent.mobile
    }
}
</script>

<style scoped>

</style>