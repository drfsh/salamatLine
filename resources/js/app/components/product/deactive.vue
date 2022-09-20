<template>
    <p><small>متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق لیست زیر، از
        محصولات مشابه این کالا دیدن نمایید</small></p>
    <div class="gap"></div>
    <main>
        <a class="button gray expanded icon" @click="show_p=true">
           <span v-if="!loading">
            <i class="fas fa-bell"></i>موجود شد به من اطلاع بده
           </span>
            <loading class="small" v-else></loading>
        </a>
    </main>
    <diactive_not v-if="show_p"></diactive_not>
</template>

<script>
import Loading from "../loading/loading";
import Diactive_not from "./diactive_not/diactive_not";
export default {
    name: "deactive",
    components: {Diactive_not, Loading},
    props: {
        id:{
            default: 0
        },
        number:{
            default:'',
        }
    },
    data() {
        return {
            mobile:'',
            loading: false,
            status: '',
            show_p:false
        }
    },
    methods: {
        async sendData() {
            this.loading = true;
            let {data} = await window.axios.post('/notify-stock/' + this.id)
            this.status = data['status']
            window.newCardAdd = data.status
            this.loading = false
            $('html ,body').stop().animate({scrollTop:0},500)
        }
    },
    mounted() {
        this.mobile = this.number
    }
}
</script>

<style scoped>

</style>
