<template>
    <div id="print_contact" v-if="data!==null" class="size invoice" style="max-width: 29.7cm;" :class="{'hA4':printing}">
        <div class="title" role="button" @click="print">
            <ic_print></ic_print>
            شرکت تجاری سلامت لاین هومان
        </div>
        <div class="top">
            <div class="logo">
                <logo></logo>
                به پشتوانه ۵ دهه مشتری مداری
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
            <div class="sell" style="height: 76px;">
                <div class="title">
                    <span>خریدار</span>
                </div>
                <div class="c w-100">
                    <div>
                        <div class="c">
                            <div class="text">
                                <span>نام:</span>
                                <span v-if="data['user']['full_name']!==null && data['user']['full_name']!=='' ">{{ data['user']['full_name']}}</span>
                                <span v-else>{{ data['user']['name'] + ' ' + data['address']['lname'] }}</span>
                            </div>
                            <div class="text">
                                <span>کد ملی:</span>
                                <span>{{ data['user']['code_m'] }}</span>
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
                            <span>{{ data['user']['mobile'] }}</span>
                        </div>
                        <div class="text">
                            <span>ایمیل:</span>
                            <span>{{ data['user']['email'] }}</span>
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
                        <div>ارزش افزوده :</div>
                        <div>جمع کل :</div>
                    </div>
                </div>
                <div class="val">
                    <div>{{riyalToman(total_product)}} تومان</div>
                    <div>{{riyalToman(value_added)}} تومان</div>
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

            <div class="veryf">
                <span>امضاء مسئول فروش</span>
                <img src="/img/page/سلامت لاین.webp" alt="">
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
            data: null,
            printing:false
        }
    },
    computed: {
        value_added(){
            return (parseInt(this.data.sub_total) / 100) * 9
        },
        total_product(){
            return parseInt(this.data.sub_total) - this.value_added
        },
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
        print(){
            let vm = this
            this.printing = true
            setTimeout(function () {
                window.print()
                vm.printing = false
            },500)
        },
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
        $('.h-100').removeClass('h-100')
    }
}
</script>

<style scoped>

</style>
