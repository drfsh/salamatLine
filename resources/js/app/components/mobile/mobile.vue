<template>
    <label>شماره تلفن همراه</label>
    <div style="position: relative">
        <input type="number" v-model="p">
        <div role="button" @click="sendVerify" style="
            position: absolute;
    left: 3px;
    background: rgb(9, 72, 115);
    color: white;
    padding: 5px;
    border-radius: 5px;
    top: 2px;" v-if="authShow">
            <span v-if="!loading && enterCode==false">تایید شماره</span>
            <span v-else-if="!loading && enterCode==true">ارسال مجدد کد</span>
            <span v-else>loading...</span>
        </div>
    </div>
    <div v-if="enterCode==true" style="position: relative">
        <label>کد دریافت شده را وارد کنید</label>
        <input type="number" v-model="code">
        <div role="button" @click="codeVerify" style="
            position: absolute;
    left: 3px;
    background: rgb(9, 72, 115);
    color: white;
    padding: 5px;
    border-radius: 5px;
    top: 2px;" v-if="authShow">
            <span v-if="!loading">تایید</span>
            <span v-else>loading...</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "mobile",
    props: ['mobile'],
    data() {
        return {
            p: '',
            authShow: false,
            enterCode:false,
            loading:false,
            code:'',
            phone:''
        }
    },
    methods:{
        async codeVerify() {
            let {data} = await window.axios.post('/profile/verifyUser', {mobile: this.phone,code:this.code})
            if (data.color == 'success') {
                this.enterCode = false
                this.authShow = false
                alert('شماره با موفقیت ثبت شد!')
            }else{
                alert('کد اشتباه است!')
            }
        },
        async sendVerify() {
            if (this.p!== '')
            {
                this.phone = this.p
                this.verifyDialog(this.p)
            }
            else
                $.alert('مشخصات را واردکنید')
        },
        async verifyDialog(value) {
            this.loading = true
            let {data} = await window.axios.post('/profile/sendCodeVerify',{mobile:value,})
            if (data.EnterPhone==false){
                this.enterCode = true
            }
            this.loading = false
        },

    },
    mounted() {
        this.p = this.mobile
    },
    watch: {
        p(v) {
            if (v !== this.mobile) {
                this.authShow = true
            } else
                this.authShow = false
        }
    }
}
</script>

<style scoped>

</style>