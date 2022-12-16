<template>
    <div class="pro-1-2 mt-0">
        <article id="post-19" class="post-19 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="woocommerce">
                    <cart-message v-if="status!==''" :text="status"></cart-message>
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="checkout woocommerce-checkout">

                        <div class="cart-send bank">
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
import Full_loading from "../../loading/full_loading";
import CartMessage from "../topbar/cart-message";

export default {
    name: "cart_level4",
    components: {CartMessage, Full_loading},
    data() {
        return {
            status: '',
            fullLoading:false,
            isContinue:false,
            bank:0
        }
    },

    methods: {
        back(){
            this.$parent.$parent.step=3
            $('html ,body').stop().animate({scrollTop: 0}, 500)
        },
        async nextStep() {
            if (!this.isContinue) return ''
            this.fullLoading = true

            let m = {
                address: this.$parent.address_id, delivery: this.$parent.delivery,typeSend:this.$parent.typeSend
            }

            await window.axios.post('/payment/pasargad', m)

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
