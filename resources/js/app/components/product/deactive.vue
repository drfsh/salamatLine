<template>
    <p><small>متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق لیست زیر، از
        محصولات مشابه این کالا دیدن نمایید</small></p>
    <div class="gap"></div>
    <main>
        <a class="button gray expanded icon" @click="sendData">
           <span v-if="!loading">
            <i class="fas fa-bell"></i>موجود شد به من اطلاع بده
           </span>
            <loading class="small" v-else></loading>
        </a>
        <div v-if="status!=''" class="callout mt2 warning"><small>{{status}}</small></div>
    </main>
</template>

<script>
import Loading from "../loading/loading";
export default {
    name: "deactive",
    components: {Loading},
    props: ['id'],
    data() {
        return {
            loading: false,
            status: '',
        }
    },
    methods: {
        async sendData() {
            this.loading = true;
            let {data} = await window.axios.post('/notify-stock/' + this.id)
            this.status = data['status']
            this.loading = false
        }
    }
}
</script>

<style scoped>

</style>