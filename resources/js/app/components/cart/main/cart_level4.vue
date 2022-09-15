<template>
    <div class="pro-1-2 mt-0">
        <article id="post-19" class="post-19 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="woocommerce">
                    <cart-message v-if="status!==''" :text="status"></cart-message>
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="checkout woocommerce-checkout">

                        <div class="cart-send bank" style="margin-top: 39px;">
                            <h3 style="font-size: 18px;font-weight: 400;color: #3b4359;">انتخاب درگاه پرداخت</h3>
                            <div class="items">
                                <div @click="bank=1" role="button" class="item"
                                     :class="{'active':bank===1}">
                                    <span class="text">
                                        پاسارگاد
                                    </span>
                                    <span class="icon">
                                        <img style="height: 51px;left: 21px;" src="/img/page/pasargad.jfif"/>
                                    </span>
                                </div>

                                <div @click="bank=2" role="button" class="item"
                                     :class="{'active':bank===2}">
                                    <span class="text">
                                        ایران کیش
                                    </span>
                                    <span class="icon">
                                        <img style="height: 51px;left: 21px;" src="/img/page/irankish.png"/>
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div class="cart-finish">
                            <div class="info">
                                <div class="item">
                                    <ic_ticke_circle></ic_ticke_circle>
                                    تحویل به صورت
                                    <a>حضوری</a>
                                    دارای امتیاز
                                    <a>باشگاه هواداری</a>
                                    میباشد
                                </div>
                                <div class="item">
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
                            </div>

                                <div class="nextstep">
                                    <a @click="nextStep" class="checkout-button button alt wc-forward" :class="{'disabled':!isContinue}"><span>انتقال به درگاه پرداخت</span></a>
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
    name: "cart_level4",
    components: {Full_loading, Ic_ticke_circle, Ic_p_circle, Ic_dliver_fast, Ic_dliver, Cart_date_item, CartMessage},
    data() {
        return {
            status: '',
            fullLoading:false,
            isContinue:false,
            bank:0
        }
    },

    methods: {
        async nextStep() {
            if (!this.isContinue) return ''
            this.fullLoading = true

            let m = {
                address: this.$parent.address_id, delivery: this.$parent.delivery,typeSend:this.$parent.typeSend
            }
            let {data} = await window.axios.post('/payment/pasargad', m)


            this.fullLoading = false
            $('html ,body').stop().animate({scrollTop:0},500)
        }
    },
    watch:{
        bank(v){
            if (v!==0){
                this.isContinue = true
            }
        }
    }
}
</script>

<style scoped>

</style>
