<template>
    <div class=" box2">
        <div class="title">سفارشات شما</div>
        <div>
            <ul class="btns-viewpager">
                <li class="item" @click="page=0" :class="{'active':page==0}">
                    <div>
                        <span class="name">جاری</span>
                        <span  class="count">{{count[0]}}</span>
                    </div>
                </li>
                <li class="item" @click="page=1" :class="{'active':page==1}">
                    <div>
                        <span class="name">در انتظار برسی</span>
                        <span  class="count">{{count[1]}}</span>
                    </div>
                </li>
                <li class="item" @click="page=2" :class="{'active':page==2}">
                    <div>
                        <span class="name">تحویل داده شده</span>
                        <span  class="count">{{count[2]}}</span>
                    </div>
                </li>
                <li class="item" @click="page=3" :class="{'active':page==3}">
                    <div>
                        <span class="name">در انتظار پرداخت</span>
                        <span  class="count">{{count[3]}}</span>
                    </div>
                </li>
                <li class="item" @click="page=4" :class="{'active':page==4}">
                    <div>
                        <span class="name">لغو شده</span>
                        <span  class="count">{{count[4]}}</span>
                    </div>
                </li>
            </ul>
        </div>
        <div style="padding: 0 22px 22px;">
            <div class="bbox" style="border-radius: 0">
                <div v-if="invoice==null"
                     style="height: 380px;display: flex;align-items: center;justify-content: center;">
                    <loading></loading>
                </div>
                <div v-else-if="itemsShow.length==0" class="noting-orders">
                    <img src="/img/profile/order-empty.svg">
                    <span>هنوز هیچ سفارشی ندادید</span>
                </div>
                <div v-else>
                    <item v-for="(v,i) in itemsShow" :item="v"></item>
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
    data() {
        return {
            invoice: null,
            page: 0,
            itemsShow: [],
            count:[0,0,0,0,0]
        }
    },
    methods: {
        async getData() {
            let {data} = await window.axios.get('/profile/orders/api/get')
            this.invoice = data
            this.itemsShow = data['invoice_current']
            this.count = [
                data['invoice_current'].length,
                data['invoice_paid'].length,
                data['invoice_finish'].length,
                data['invoice_unpaid'].length,
                0
            ]
        }
    },
    mounted() {
        this.getData()
    },
    watch: {
        page(v) {
            if (v == 0)
                this.itemsShow = this.invoice['invoice_current']
            else if (v == 1) {
                this.itemsShow = this.invoice['invoice_paid']
            } else if (v == 2)
                this.itemsShow = this.invoice['invoice_finish']
            else if (v == 3)
                this.itemsShow = this.invoice['invoice_unpaid']
            else if (v == 4)
                this.itemsShow = []

        }
    }

}
</script>

<style scoped>

</style>
