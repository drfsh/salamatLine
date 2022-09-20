<template>
    <div class="share-link-pop">
        <div class="dismiss" @click="close"></div>
        <div class="diactive_no card-share-link position-relative bg-w" :class="{active:show}">

            <i style="
    font-size: 16px;
    color: rgb(191, 191, 191);
    top: 7px;
    background: transparent;
    left: 10px;
    right: unset;" class="fas fa-times" @click="close"></i>

            <div style="margin-top: 14px;font-size: 13px;">

                <div class="title">اطلاع رسانی از طریق پیامک</div>

                <ul class="list">
                    <li>
                        <label>
                            <input type="checkbox">
                            زمانی که محصول حراج شد
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox">
                            زمانی که محصول موجود شد
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox">
                            زمانی که محصول فروش ویژه شد
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox">
                            زمانی که نسخه جدید محصول منتشر شد
                        </label>
                    </li>
                </ul>

                <input type="number" v-model="$parent.mobile" placeholder="شماره موبایل" >
                <a @click="sendData" style="float: unset;margin-top: 3px;" class="button wc-forward">ثبت</a>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "diactive_not",
    props:['id'],
    data(){
        return{
            show:false
        }
    },
    methods:{
        close(){
            let vm = this
            vm.show = false
            setTimeout(function () {
                vm.$parent.show_p=false
            },200)
        },
        async sendData() {
            this.close()
            this.$parent.sendData()
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
