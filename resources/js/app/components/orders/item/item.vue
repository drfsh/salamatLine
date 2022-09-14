<template>
    <a class="order-item" :href="'/profile/order/'+item.id">
        <div class="status">

            <span class="text" v-if="item.situation=='unpaid'">
            <ic_ticke_circle></ic_ticke_circle>
                در انتظار پرداخت
            </span>
            <span class="text" v-else-if="item.situation=='paid'">
            <ic_ticke_circle></ic_ticke_circle>
                درحال پردازش
            </span>
            <span class="text" v-else-if="item.situation=='production'">
            <ic_ticke_circle></ic_ticke_circle>
                درحال آماده سازی
            </span>
            <span class="text" v-else-if="item.situation=='sending'">
            <ic_ticke_circle></ic_ticke_circle>
                آماده برای ارسال
            </span>
            <span class="text" v-else-if="item.situation=='arrived'">
            <ic_ticke_circle></ic_ticke_circle>
                ارسال شده
            </span>
            <span class="text" v-else-if="item.situation=='finish'">
            <ic_ticke_circle></ic_ticke_circle>
                تحویل شده
            </span>

            <div class="go">
                <i class="fas fa-chevron-left"></i>
            </div>
        </div>
        <div class="val">
            <span class="date">{{item.date}}</span>

            <span class="t">کدسفارش</span>
            <span class="d">{{item.id}}</span>

            <span class="t">مبلغ</span>
            <span class="d">{{separate(item.grand_total)}}
            تومان
            </span>

        </div>
        <div class="val" style="margin-top: 12px;">
            <span class="icon"><ic_award></ic_award></span>
            <span class="t" style="margin-right: 8px;">امتیاز باشگاه هواداری </span>
            <span class="d" style="margin-right: 9px;">{{item.grand_total/10000}}</span>
        </div>

        <div class="products">
            <div v-for="(v,i) in item.orders" class="item">
                <img :src="v.product.tiny">
                <span v-if="v.qty>1"><i class="fas fa-times"></i> {{v.qty}} </span>
            </div>
        </div>

        <div class="btns">
            <a :href="'/profile/orders/invoice/order/'+item.id">
                <div class="btn-f">
                <span class="icon">
                    <receipt-list></receipt-list>
                </span>
                    <span class="text">
                    مشاهده فاکتور
                </span>
                </div>
            </a>
        </div>
    </a>
</template>

<script>
import Ic_ticke_circle from "../../icon/ic_ticke_circle";
import Ic_award from "../../icon/ic_award";
import ReceiptList from "../../icon/receipt-list";

export default {
    name: "item",
    props:['item'],
    components: {ReceiptList, Ic_award, Ic_ticke_circle},
    methods:{
        separate(Number) {
            Number /= 10
            Number += '';
            Number = Number.replace(',', '');
            let x = Number.split('.');
            let y = x[0];
            let z = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(y))
                y = y.replace(rgx, '$1' + ',' + '$2');
            return y + z;
        },
    }
}
</script>

<style scoped>

</style>
