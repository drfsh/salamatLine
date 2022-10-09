<template>
    <div class="pro-1-2 mt-0">
        <div class="entry-content">
            <div class="woocommerce">
                <cart-message :situation="situation" v-if="status!==''" :text="status"></cart-message>
                <div class="woocommerce-cart-holder">
                    <div class="woocommerce-cart-form">

                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">محصول</th>
                                <th class="product-price">قیمت</th>
                                <th class="product-quantity">تعداد</th>
                                <th class="product-subtotal">مجموع</th>
                            </tr>
                            </thead>
                            <tbody>

                            <product_table v-for="(v,i) in products" :key="'itemp'+i" :v="v"></product_table>

                            <tr v-if="products.length===0">
                                <td colspan="6" style="border: none !important;">
                                    <loading></loading>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="actions" style="border: none !important;">
                                    <div v-if="detail.coupon==0" class="coupon" style="float: right">
                                        <input v-model="coupon" type="text" class="input-text" id="coupon_code" placeholder="کد تخفیف">
                                        <button style="width: 140px;height: 45px;" @click="addCoupon" type="submit" class="button" name="apply_coupon">
                                            <span v-if="!couponLoading">اعمال کدتخفیف</span>
                                            <loading class="small" v-else></loading>
                                        </button>
                                    </div>
                                    <div v-else class="coupon" style="float: right">
                                        <button  style="width: 140px;height: 45px;background: #ee3737!important;" @click="removeCoupon" type="submit" class="button" name="apply_coupon">
                                            <span v-if="!couponLoading">حذف کدتخفیف</span>
                                            <loading class="small" v-else></loading>
                                        </button>
                                        <div class="p-discount">{{detail.coupon}}</div>
                                    </div>
                                    <button @click="setChange()" type="submit" class="button button_update_cart" :class="{'active':refresh}">
                                        <ic_rotate v-if="refreshStatus==='' || refreshStatus==='loading'" :class="{'fa-spin':refreshStatus==='loading'}"></ic_rotate>
                                        <ic_ticke_circle v-else></ic_ticke_circle>
                                        <span>بروزرسانی سبد خرید</span>
                                    </button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="cart-collaterals sticky-sidebar">
                    <div class="cart-collaterals-inner">
                        <div class="cart_totals">


                            <h2>جمع کل سبد خرید</h2>

                            <table cellspacing="0" class="shop_table shop_table_responsive">

                                <tbody>

                                <tr class="cart-subtotal">
                                    <th style="border: none!important;"> جمع جزء ({{detail.qty}})</th>
                                    <td style="border: none!important;" data-title="جمع جزء"><span
                                        class="woocommerce-Price-amount amount"><bdi>{{ $parent.separate(original_total) }}<span
                                        class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></td>
                                </tr>

                                <tr v-if="detail.shipping.price>0" class="cart-subtotal">
                                    <th style="border: none!important;">هزینه ارسال</th>
                                    <td style="border: none!important;"><span
                                        class="woocommerce-Price-amount amount"><bdi>{{ $parent.separate(detail.shipping.price) }}<span
                                        class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></td>
                                </tr>


                                <tr v-if="discount>0" class="cart-subtotal">
                                    <th style="background: #ffdc004d;color: #414141;">تخفیف</th>
                                    <td style="background: #ffdc004d;color: #414141;"><span
                                        class="woocommerce-Price-amount amount"><bdi>{{ $parent.separate(discount) }}<span
                                        class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></td>
                                </tr>


                                <tr class="order-total">
                                    <th style="border-top: 1px solid #e8eff9!important;">مجموع</th>
                                    <td style="color: #464646;border-top: 1px solid #e8eff9!important;" data-title="مجموع">
                                        <strong><span class="woocommerce-Price-amount amount"><bdi>{{ $parent.separate(detail.total) }}<span
                                            class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></strong>
                                    </td>
                                </tr>


                                </tbody>
                            </table>

                            <div class="wc-proceed-to-checkout">

                                <a @click="nextSetup"
                                   class="checkout-button button alt wc-forward" :class="{'disabled':situation=='warning'}">
                                   <span v-if="!setupLoading">{{stepNextText}}</span>
                                    <loading v-else class="small"></loading>
                                </a >
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .entry-content -->
    </div>
</template>

<script>
import Product_table from "./item/product_table";
import Loading from "../../loading/loading";
import CartMessage from "../topbar/cart-message";
import Ic_rotate from "../../icon/ic_rotate";
import Ic_ticke_circle from "../../icon/ic_ticke_circle";

export default {
    name: "cart_level1",
    components: {Ic_ticke_circle, Ic_rotate, CartMessage, Loading, Product_table},
    data(){
      return{
          coupon:'',
          couponLoading:false,
          refreshStatus:'',
          status:'',
          refresh:false,
          changeCount:[],
          setupLoading:false,
          stepNextText : 'ادامه جهت تسویه حساب',
          situation:'',

      }
    },
    computed: {
        products() {
            return this.$parent.products
        },
        detail() {
            return this.$parent.detail
        },
        original_total(){
            let total = 0
            for (const i in this.products) {
                total+=parseInt(this.products[i].attributes.original_price*this.products[i].quantity);
            }
            return total;
        },
        discount(){
            return this.original_total - this.detail.sub_total ;
        }
    },
    methods:{
        async nextSetup() {
            this.setupLoading = true
            let {data} = await window.axios.post('/cart/check-step', {step: 1, address: null, delivery: null})
            this.$parent.$parent.step = data.step
            this.stepNextText = data.text
            this.situation = data.situation
            this.status = data.status
            this.setupLoading = false
            window.auth = data.auth

            $('html ,body').stop().animate({scrollTop:0},500)
        },
        async addCoupon() {
            if (this.couponLoading) return''
            this.couponLoading = true
            let {data} = await window.axios.post('/add-coupon', {name:this.coupon})
            await this.$parent.$parent.getData()
            this.status = data.success
            this.couponLoading = false
        },
        async removeCoupon() {
            if (this.couponLoading) return''
            this.couponLoading = true
            let {data} = await window.axios.get('/remove-coupon')
            await this.$parent.$parent.getData()
            this.status = data.success
            this.couponLoading = false
        },
        async setChange() {
            this.refreshStatus = 'loading'

            for (const i in this.changeCount) {
                let {data} = await window.axios.post('/cart/updaterow/' + i, {number: this.changeCount[i]})

            }
            await this.$parent.$parent.getData()
            for (const i in this.changeCount) {
                this.products[i].quantity = this.changeCount[i]
            }
            this.refreshStatus = 'ok'
            this.status = 'بروزرسانی شد'

            window.cart_back2 = true
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
