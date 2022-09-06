<template>
    <div class="pro-1-2 mt-0">
        <div class="entry-content">
            <div class="woocommerce">
                <div class="woocommerce-cart-holder">
                    <form class="woocommerce-cart-form" action="https://tarheiran.ir/sepidtest/cart/" method="post">

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

                                    <div class="coupon" style="float: right">
                                        <input type="text"
                                               name="coupon_code"
                                               class="input-text"
                                               id="coupon_code" value=""
                                               placeholder="کد تخفیف">
                                        <button type="submit" class="button" name="apply_coupon"
                                                value="اعمال کدتخفیف">اعمال کدتخفیف
                                        </button>
                                    </div>

                                    <button type="submit" class="button button_update_cart" name="update_cart"
                                            value="بروزرسانی سبد خرید" disabled="" aria-disabled="true">بروزرسانی
                                        سبد خرید
                                    </button>


                                    <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce"
                                           value="b77690bd76"><input type="hidden" name="_wp_http_referer"
                                                                     value="/sepidtest/cart/"></td>
                            </tr>

                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="cart-collaterals sticky-sidebar">
                    <div class="cart-collaterals-inner">
                        <div class="cart_totals">


                            <h2>جمع کل سبد خرید</h2>

                            <table cellspacing="0" class="shop_table shop_table_responsive">

                                <tbody>

                                <tr  class="cart-subtotal">
                                    <th style="border: none!important;">جمع جزء</th>
                                    <td style="border: none!important;" data-title="جمع جزء"><span class="woocommerce-Price-amount amount"><bdi>4,350,000<span
                                        class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></td>
                                </tr>


                                <tr class="order-total">
                                    <th style="border-top: 1px solid #e8eff9!important;">مجموع</th>
                                    <td style="border-top: 1px solid #e8eff9!important;" data-title="مجموع"><strong><span class="woocommerce-Price-amount amount"><bdi>4,350,000<span
                                        class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></strong>
                                    </td>
                                </tr>


                                </tbody>
                            </table>

                            <div class="wc-proceed-to-checkout">

                                <a href="https://tarheiran.ir/sepidtest/checkout/"
                                   class="checkout-button button alt wc-forward">
                                    ادامه جهت تسویه حساب</a>
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

export default {
    name: "cart_level1",
    components: {Loading, Product_table},
    computed: {
        products() {
            return this.$parent.products
        }
    }
}
</script>

<style scoped>

</style>
