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
                <span class="d">{{ data['id'] }}</span>

                <span class="t">تاریخ فاکتور : </span>
                <span class="d">{{ data['date_n'] }}</span>
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
            <div class="sell" style="height: 70px;">
                <div class="title">
                    <span>خریدار</span>
                </div>
                <div class="c w-100">
                    <div>
                        <div class="c">
                            <div class="text">
                                <span>نام:</span>
                                <span>{{ data['address']['name'] + ' ' + data['address']['lname'] }}</span>
                            </div>
                            <div class="text">
                                <span>شرکت:</span>
                                <span>{{ data['address']['company'] }}</span>
                            </div>
                        </div>
                        <div style="margin-top: 8px;" class="text">
                            <span>آدرس:</span>
                            <span>{{ data['client_address'] }}</span>
                        </div>
                    </div>
                    <div class="c">
                        <div class="text">
                            <span>شماره تماس:</span>
                            <span>{{ data['address']['mobile'] }}</span>
                        </div>
                        <div class="text">
                            <span>ایمیل:</span>
                            <span>{{ data['address']['email'] }}</span>
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
                    <th>SL-{{ v.id }}</th>
                    <th>{{ v.product.title }} <span v-if="v.detail!==null">{{ v.detail.content }}</span></th>
                    <th>{{ riyalToman(parseInt(v.price) + discount(v.detail)) }} تومان</th>
                    <th>{{ v.qty }}</th>
                    <th>{{ riyalToman(discount(v.detail) * v.qty) }} تومان</th>
                    <th>{{ riyalToman(v.total) }} تومان</th>
                </tr>
                <tr class="footer">
                    <th colspan="2">جمع موارد</th>
                    <th>{{ riyalToman(priceAll) }} تومان</th>
                    <th>{{ countAll }}</th>
                    <th>{{ riyalToman(discountAll) }} تومان</th>
                    <th>{{ riyalToman(data.sub_total) }} تومان</th>
                </tr>
                </tbody>
            </table>

            <div class="finish">
                <div class="t">
                    <div class="type_send">
                        <span>ارسال از طریق :</span>
                        <span>{{ type_send }}</span>
                    </div>
                    <div class="titlr">
                        <div>جمع محصولات :</div>
                        <div>هزینه ارسال :</div>
                        <div>جمع کل :</div>
                    </div>
                </div>
                <div class="val">
                    <div>{{riyalToman(data.sub_total)}} تومان</div>
                    <div>{{riyalToman(data.shipping)}} تومان</div>
                    <div>{{riyalToman(data.grand_total)}} تومان</div>
                </div>
            </div>

            <div class="price_fa">
                <span>جمع کل به حروف : </span>
                <span>{{data.price_fa}}</span>
            </div>

            <div class="alert">
                لطفا در هنگام دریافت سفارش اقلام را بدقت چک کنید
            </div>
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
    props: ['id'],
    data() {
        return {
            data: null
        }
    },
    computed: {
        type_send() {
            if (this.data.type_send == 1) {
                return 'تحویل حضوری'
            } else if (this.data.type_send == 2) {
                return ' ارسال پیشتاز و فوری '
            } else if (this.data.type_send == 3) {
                return  ' ارسال عادی'
            }
        },
        discountAll() {
            let val = 0
            let orders = this.data.orders
            for (const x in orders) {
                let detail = orders[x]['detail']
                val += parseInt(this.discount(detail)) * orders[x]['qty']
            }
            return val
        },
        countAll() {
            let val = 0
            let orders = this.data.orders
            for (const x in orders) {
                let c = orders[x]['qty']
                val += parseInt(c)

            }
            return val
        },
        priceAll() {
            let val = 0
            let orders = this.data.orders
            for (const x in orders) {
                let c = orders[x]['price']
                val += parseInt(c) + this.discount(orders[x]['detail'])

            }
            return val
        }
    },
    methods: {
        discount(v) {
            if (v === null || v.discount == null)
                return 0
            else
                return parseInt(v.discount)
        },
        async getData() {
            let {data} = await window.axios.get('/profile/orders/api/get/' + this.id)
            if (data.id===undefined)
            {
                location.href = '/profile'
                return
            }
            this.data = data
        },
        riyalToman(n) {
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
