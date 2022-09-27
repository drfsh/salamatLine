<template>
    <div class="pro-1-2 mt-0">
        <article id="post-19" class="post-19 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="woocommerce">
                    <cart-message v-if="status!==''" :text="status"></cart-message>
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="checkout woocommerce-checkout">

                        <div class="cart-date">
                            <h3 style="font-size: 18px;font-weight: 400;color: #3b4359;">زمان تحویل کالا</h3>
                            <div class="items">
                                <cart_date_item v-for="(v,i) in date" :key="'item_date'+i" :v="v"></cart_date_item>
                            </div>
                        </div>
                        <div class="cart-send" style="margin-top: 39px;">
                            <h3 style="font-size: 18px;font-weight: 400;color: #3b4359;">نوع ارسال کالا</h3>
                            <div class="items">
                                <div @click="typeSend=1" role="button" class="item"
                                     :class="{'active':typeSend===1}">
                                    <span class="text">
                                        تحویل به صورت حضوری
                                    </span>
                                    <span class="icon">
                                        <ic_p_circle></ic_p_circle>
                                    </span>
                                </div>

                                <div @click="typeSend=2" role="button" class="item"
                                     :class="{'active':typeSend===2}">
                                    <span class="text">
                                        ارسال به صورت پیشتاز و فوری
                                    </span>
                                    <span class="icon">
                                        <ic_dliver_fast></ic_dliver_fast>
                                    </span>
                                </div>

                                <div @click="typeSend=3" role="button" class="item"
                                     :class="{'active':typeSend===3}">
                                    <span class="text">
                                        ارسال به صورت عادی
                                    </span>
                                    <span class="icon">
                                        <ic_dliver></ic_dliver>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-send">
                            <a
                                style="width: auto;float: right;margin-top: 20px;" @click="back"
                                class="checkout-button button alt wc-forward"><span>مرحله قبل</span>
                            </a>
                        </div>

                        <div class="cart-finish w-100">
                            <div class="info">
                                <div :class="{'active':typeSend==1}" class="item">
                                    <ic_ticke_circle></ic_ticke_circle>
                                    تحویل به صورت
                                    <a>حضوری</a>
                                    دارای امتیاز
                                    <a>باشگاه هواداری</a>
                                    میباشد
                                </div>
                                <div :class="{'active':typeSend==2}" class="item">
                                    <ic_ticke_circle></ic_ticke_circle>
                                    هزینه ارسال به صورت
                                    <a>پیشتاز</a>
                                    و
                                    <a>فوری</a>
                                    در شهر تهران و حومه بر عهده
                                    <a href="">مشتری</a>
                                    میباشد
                                </div>
                                <div class="item">
                                    <ic_ticke_circle></ic_ticke_circle>
                                    هزینه ارسال کالا برای
                                    <a>شهرستان ها</a>
                                    بر عهده
                                    <a>مشتری</a>
                                    میباشد
                                </div>
                                <div class="item">
                                    <ic_ticke_circle></ic_ticke_circle>
                                    ارسال رایگان برای خرید بالای یک میلیون تومان در شهر تهران
                                </div>
                            </div>

                            <div class="nextstep">
                                <a @click="nextStep" class="checkout-button button alt wc-forward"
                                   :class="{'disabled':!isContinue}"><span>انتخاب درگاه پرداخت</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </div>
    <full_loading v-if="fullLoading"></full_loading>
</template>

<script>
import CartMessage from "../topbar/cart-message";
import Cart_date_item from "./level3/cart_date_item";
import Ic_dliver from "../../icon/ic_dliver";
import Ic_dliver_fast from "../../icon/ic_dliver_fast";
import Ic_p_circle from "../../icon/ic_p_circle";
import Ic_ticke_circle from "../../icon/ic_ticke_circle";
import Full_loading from "../../loading/full_loading";

export default {
    name: "cart_level3",
    components: {Full_loading, Ic_ticke_circle, Ic_p_circle, Ic_dliver_fast, Ic_dliver, Cart_date_item, CartMessage},
    data() {
        return {
            status: '',
            date: [],
            delivery: '',
            typeSend: 0,
            fullLoading: false,
            isContinue: false
        }
    },
    methods: {
        back() {
            this.$parent.$parent.step = 2
            $('html ,body').stop().animate({scrollTop: 0}, 500)
        },
        async getdate() {
            let {data} = await window.axios.get('/cart/check-date')
            this.date = data;
        },
        async nextStep() {
            if (!this.isContinue) return ''
            this.fullLoading = true

            let m = {
                step: this.$parent.step,
                address: this.$parent.address_id,
                delivery: this.delivery,
                typeSend: this.typeSend
            }
            let {data} = await window.axios.post('/cart/check-step', m)

            this.$parent.$parent.step = data.step
            this.status = data.text
            this.$parent.typeSend = data.typeSend
            this.$parent.delivery = data.delivery

            this.fullLoading = false
            $('html ,body').stop().animate({scrollTop: 0}, 500)
        }
    },
    mounted() {
        this.getdate()
    },
    watch: {
        delivery(v) {
            if (v) {
                if (this.typeSend !== 0) {
                    this.isContinue = true
                }
            }
        },
        typeSend(v) {
            if (v !== 0) {
                if (this.delivery) {
                    this.isContinue = true
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
