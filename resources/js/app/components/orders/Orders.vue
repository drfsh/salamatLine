<template>
    <div class=" box2">
        <div class="title">سفارشات شما</div>
        <div>
            <ul class="btns-viewpager">
                <li class="item" @click="page=0" :class="{'active':page==0}">
                    <div>
                        <span class="name">جاری</span>
                        <span class="count">0</span>
                    </div>
                </li>
                <li class="item"  @click="page=1" :class="{'active':page==1}">
                    <div>
                        <span class="name">در انتظار برسی</span>
                        <span class="count">0</span>
                    </div>
                </li>
                <li class="item" @click="page=2" :class="{'active':page==2}" >
                    <div>
                        <span class="name">تحویل داده شده</span>
                        <span class="count">1</span>
                    </div>
                </li>
                <li class="item"  @click="page=3" :class="{'active':page==3}">
                    <div>
                        <span class="name">در انتظار پرداخت</span>
                        <span class="count">1</span>
                    </div>
                </li>
                <li class="item"  @click="page=4" :class="{'active':page==4}">
                    <div>
                        <span class="name">لغو شده</span>
                        <span class="count">1</span>
                    </div>
                </li>
            </ul>
        </div>
        <div style="padding: 0 22px 22px;">
            <div class="bbox">
                <div v-if="invoice==null" style="height: 380px;display: flex;align-items: center;justify-content: center;">
                    <loading></loading>
                </div>
                <div v-else-if="invoice.length==0"  class="noting-orders">
                    <img src="/img/profile/order-empty.svg">
                    <span>هنوز هیچ سفارشی ندادید</span>
                </div>
                <div v-else>
                    <item></item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loading from "../loading/loading";
import Item from "./item/item";
export default {
    name: "Orders",
    components: {Item, Loading},
    data(){
        return{
            invoice:null,
            page:0,
        }
    },
    methods:{
        async getData() {
            let {data} = await window.axios.get('/profile/orders/api/get')
            this.invoice = data
        }
    },
    mounted() {
        this.getData()
    },

}
</script>

<style scoped>

</style>
