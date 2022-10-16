<template>
    <div class="input">
        <input type="text" v-model="email">
        <span>ایمیل خود را وارد نمایید</span>
    </div>
    <div role="button" v-if="status!=''" class="status mb2">
        {{ status }}
    </div>
    <div role="button" @click="send" class="btn submit">
        عضویت
    </div>
    <p style="margin-top: 13px;text-align: center;">
        با عضویت در خبرنامه فروشگاه سلامت لاین میتوانید از جدید ترین اخبار و تخفیف های هفتگی با خبر شوید
    </p>
</template>

<script>
export default {
    name: "newsletter",
    data() {
        return {
            email: '',
            status: ''
        }
    },
    methods: {
        async send() {
            let vm = this
            let {data} = await window.axios.post('/subscribe', {email: this.email})
            if (data.errors && data.errors.length > 0) {
                console.log(data)
                this.status = data.errors.email[0];
            } else {
                this.status = data.status
                setTimeout(function () {
                    vm.status = ''
                }, 2000)
            }
        }
    }
}
</script>

<style scoped>

</style>
