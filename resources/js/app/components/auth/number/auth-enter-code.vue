<template>
    <div class=" info">کد ۴ رقمی ارسال شده به شماره همراه زیر را وارد کنید</div>
    <div class="alert" v-if="alert!==null">{{ alert }}</div>
    <div>
        <div class="number-edit">
            <span class="number">{{ $parent.mobile }}</span>
            <span role="button" class="text" @click="$parent.page=1">
                <ic_edit></ic_edit>
                <span>ویرایش شماره</span>
            </span>
        </div>
        <div class="input-code">
            <input type="number" id="code-1" min="0" max="9" maxlength="1" v-model="c1">
            <input type="number" id="code-2" min="0" max="9" maxlength="1" v-model="c2">
            <input type="number" id="code-3" min="0" max="9" v-model="c3" maxlength="1">
            <input type="number" id="code-4" min="0" max="9" v-model="c4" maxlength="1">
        </div>
        <div v-if="!showResend" class="timer">{{ timer }}</div>
        <div class="resend-code" v-if="showResend" role="button">
            <loading v-if="sendLoading" class="small blue"></loading>
            <span v-else @click="reSend">ارسال مجدد کد</span>
        </div>
        <div>
            <button @click="getData" class="btn-login">
                <loading v-if="loading" class="small"></loading>
                <span v-else>تایید کد</span>
            </button>
        </div>
    </div>
</template>

<script>
import Loading from "../../loading/loading";
import Ic_edit from "../../icon/ic_edit";

export default {
    name: "auth-enter-code",
    props: {
        fixed: {
            default: false
        }
    },
    components: {Ic_edit, Loading},
    data() {
        return {
            loading: false,
            alert: null,
            c1: '',
            c2: '',
            c3: '',
            c4: '',
            timeoutHandle: null,
            timer: '00:00:00',
            showResend: false,
            sendLoading: false,
        }
    },
    methods: {
        async getData() {
            this.loading = true
            let code = this.c1 + '' + this.c2 + '' + this.c3 + '' + this.c4
            let {data} = await window.axios.post('/approve-code/1', {code: code})
            if (data['color'] == 'success') {
                if (!this.fixed)
                    window.location.href = '/profile'
                else
                    window.location.reload()
            } else if (data['color'] == 'warning') {
                this.alert = data['alert']
            }
            this.loading = false
        },
        setTime(min, sec) {
            let vm = this;

            function tick() {
                vm.timer = "00:0" + min.toString() + ":" + (sec < 10 ? "0" : "") + String(sec);
                sec--;
                if (sec >= 0) {
                    vm.timeoutHandle = setTimeout(tick, 1000)
                } else {
                    if (min >= 1) {
                        setTimeout(function () {
                            vm.setTime(min - 1, 59)
                        }, 1000)
                    } else {
                        vm.showResend = true
                    }
                }
            }

            tick();
        },
        async reSend() {
            document.querySelector('.btn-login').disabled = 'disabled'
            this.sendLoading = true
            let m = {lname: '', mobile: this.$parent.mobile, name: ''}
            let {data} = await window.axios.post('/request-login/1', m)
            if (data['EnterPhone'] === true) {
                this.$parent.page = 1
            } else {
                this.setTime(2, 0)
            }
            this.sendLoading = false
            document.querySelector('.btn-login').disabled = ''
        }
    },
    mounted() {
        this.setTime(2, 0);
        // $(document).ready(function () {
        //     let inputs = $('.input-code input').keyup(function (e) {
        //         let num = inputs.index(this) + 1
        //         if (e.which === 8) {
        //             num = inputs.index(this) - 1
        //         }
        //         // let nextInput = inputs.get(num)
        //         // if (nextInput) {
        //         //     nextInput.focus();
        //         //     nextInput.select();
        //         // }
        //     })
        // })
    },
    watch: {
        c1(v) {
            if (v.toString().length > 1)
                this.c1 = this.c1.toString()[0]

            let inputs = $('.input-code input')
            let nextInput = inputs.get(1)
            nextInput.focus();
            nextInput.select();

            if (this.c1 && this.c2 && this.c3 && this.c4)
                this.getData()
        },
        c2(v) {
            if (v.toString().length > 1)
                this.c2 = this.c2.toString()[0]

            let inputs = $('.input-code input')
            let nextInput = inputs.get(2)
            nextInput.focus();
            nextInput.select();

            if (this.c1 && this.c2 && this.c3 && this.c4)
                this.getData()
        },
        c3(v) {
            if (v.toString().length > 1)
                this.c3 = this.c3.toString()[0]

            let inputs = $('.input-code input')
            let nextInput = inputs.get(3)
            nextInput.focus();
            nextInput.select();

            if (this.c1 && this.c2 && this.c3 && this.c4)
                this.getData()
        },
        c4(v) {
            if (v.toString().length > 1)
                this.c4 = this.c4.toString()[0]


            if (this.c1 && this.c2 && this.c3 && this.c4)
                this.getData()
        }
    }
}
</script>

<style scoped>

</style>
