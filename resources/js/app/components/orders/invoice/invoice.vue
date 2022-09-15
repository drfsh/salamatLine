<template>
    <div v-if="data!==null" class="size invoice" style="max-width: 29.7cm;">
        <div class="title">
            <ic_print></ic_print>
        </div>
        <div class="top">
            <div class="logo">
                <logo></logo>
            </div>
            <div class="code val">
                <span class="t">شماره فاکتور : </span>
                <span class="d">{{data['id']}}</span>

                <span class="t">تاریخ فاکتور : </span>
                <span class="d">{{data['date_n']}}</span>
            </div>
        </div>
        <div>
            <div class="sell">
                <div class="title">
                    <span>فروشنده</span>
                </div>
                <div class="c w-100">
                    <div class="c">
                        <div class="text">
                            <span>نام:</span>
                            <span>فروشگاه اینترنتی سلامت لاین</span>
                        </div>
                        <div class="text">
                            <span>آدرس:</span>
                            <span>تهران، خیابان ولیعصر، بالاتر از جامی، پلاک ۱۰۷۰</span>
                        </div>
                    </div>

                    <div class="c">
                        <div class="text">
                            <span>کدپستی:</span>
                            <span>۱۲۳۴۵۶۷۸</span>
                        </div>
                        <div class="text">
                            <span>شماره تماس:</span>
                            <span>021-66462985</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sell" style="height: 67px;">
                <div class="title">
                    <span>خریدار</span>
                </div>
                <div class="c w-100">
                    <div>
                        <div class="c">
                            <div class="text">
                                <span>نام:</span>
                                <span>{{data['address']['name'] + ' ' + data['address']['lname']}}</span>
                            </div>
                            <div class="text">
                                <span>شرکت:</span>
                                <span>{{data['address']['company']}}</span>
                            </div>
                        </div>
                        <div style="margin-top: 8px;" class="text">
                            <span>آدرس:</span>
                            <span>{{data['client_address']}}</span>
                        </div>
                    </div>
                    <div class="c">
                        <div class="text">
                            <span>شماره تماس:</span>
                            <span>{{data['address']['mobile']}}</span>
                        </div>
                        <div class="text">
                            <span>ایمیل:</span>
                            <span>{{data['address']['email']}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>محصولات</th>
                    <th>قیمت واحد</th>
                    <th>تعداد</th>
                    <th>میزان تخفیف</th>
                    <th>جمع کل</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(v,i) in data.orders">
                    <th>SL-{{v.id}}</th>
                    <th>{{v.product.title}} <span v-if="v.detail!==null">{{v.detail.content}}</span></th>
                    <th>{{riyalToman(v.price)}} تومان</th>
                    <th>{{v.qty}}</th>
                    <th>{{riyalToman(discount(v.detail.discount))}} تومان</th>
                    <th>{{riyalToman(v.total)}} تومان</th>
                </tr>
                <tr>
                    <th colspan="2">جمع موارد</th>
                    <th>قیمت واحد</th>
                    <th>تعداد</th>
                    <th>{{riyalToman(discountAll)}}</th>
                    <th>جمع کل</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <loading v-else></loading>
</template>

<script>
import {riyalToman} from '../../../utils/tools'
import Loading from "../../loading/loading";
import Logo from "../../icon/logo";
import Ic_print from "../../icon/ic_print";
export default {
    name: "invoice",
    components: {Ic_print, Logo, Loading},
    props:['id'],
    data(){
      return{
          data:null
      }
    },
    computed:{
        dis(){
            let val = 0
            let orders = this.data.orders
            for (const x in orders) {
                let detail = orders[x]['detail']
                val += this.discount(detail.discount)
            }
            return val
        }
    },
    methods:{
        discount(v){
            if (v===null)
                return 0
            else return  v
        },
        async getData() {
            let {data} = await window.axios.get('/profile/orders/api/get/' + this.id)
            this.data = data
            if (data.length===0)
                location.href = '/profile'
        },
        riyalToman(n){
            return riyalToman(n)
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style scoped>

</style>