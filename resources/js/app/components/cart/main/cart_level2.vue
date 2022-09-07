<template>
    <div class="pro-1-2 mt-0">
        <article id="post-19" class="post-19 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="woocommerce">
                    <cart-message v-if="status!==''" :text="status"></cart-message>
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="checkout woocommerce-checkout">
                        <cart_addresses v-if="address_id===null"></cart_addresses>
                        <edit_address v-else></edit_address>

                        <h3 id="order_review_heading">سفارش شما</h3>
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <table class="shop_table woocommerce-checkout-review-order-table">
                                <thead>
                                <tr>
                                    <th class="product-name">محصول</th>
                                    <th class="product-total">جمع جزء</th>
                                </tr>
                                </thead>
                                <tbody v-if="products.length!==0">
                                <tr v-for="(v,i) in products" class="cart_item">
                                    <td class="product-name">
                                        {{ v.name }}&nbsp;{{ v.attributes.feature }} <strong
                                        class="product-quantity">×&nbsp;{{ v.quantity }}</strong></td>
                                    <td class="product-total">
                                        <span class="woocommerce-Price-amount amount"><bdi>{{ $parent.separate(v.price * v.quantity) }}<span
                                            class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></td>
                                </tr>
                                </tbody>
                                <tfoot v-if="detail.length!==0 && products.length!==0">
                                <tr class="order-total">
                                    <th>مجموع</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi>{{ $parent.separate(detail.total) }}<span
                                        class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></strong></td>
                                </tr>


                                </tfoot>
                                <tfoot v-else>
                                <tr>
                                    <td colspan="6" style="border: none !important;">
                                        <loading></loading>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                            <div id="payment" class="woocommerce-checkout-payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    <li class="wc_payment_method payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio"
                                               name="payment_method" value="bacs" checked="checked"
                                               data-order_button_text="">

                                        <label for="payment_method_bacs">
                                            انتقال مستقیم بانکی </label>
                                        <div class="payment_box payment_method_bacs" style="">
                                            <p>پرداخت خود را مستقیما به حساب بانکی ما واریز کنید.خواهشمندیم شماره سفارش
                                                خود را بعنوان کد ارجاع پرداخت استفاده کنید.سفارش شما تا زمانی که وجوه به
                                                حساب ما وارد نشود ارسال نخواهد شد.</p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                               name="payment_method" value="cheque" data-order_button_text="">

                                        <label for="payment_method_cheque">
                                            پرداخت با چک </label>
                                        <div class="payment_box payment_method_cheque" style="display: none;">
                                            <p>لطفا چک خود را به نام فروشگاه، خیابان فروشگاه، شهر فروشگاه، ایالت/کشور
                                                فروشگاه، کدپستی فروشگاه بفرستید.</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="form-row place-order">
                                    <noscript>
                                        به دلیل اینکه مرورگر شما جاوا اسکریپت را پشتیبانی نمی کند ، یا غیر فعال است ،
                                        لطفا کلیک کنید روی <em>بروزرسانی جمع </em> قبل از اینکه سفارش خود را ثبت کنید.در
                                        صورتیکه این کار را نکنید ممکن است مبلغ قابل پرداخت شما بیش از چیزی که در بالا
                                        مشخص شده است باشد <br/>
                                        <button type="submit" class="button alt"
                                                name="woocommerce_checkout_update_totals" value="به روز رسانی جمع کل">به
                                            روز رسانی جمع کل
                                        </button>
                                    </noscript>

                                    <div class="woocommerce-terms-and-conditions-wrapper">
                                        <div class="woocommerce-privacy-policy-text"><p>ما حریم خصوصی شما را رعایت
                                            میکنیم</p>
                                        </div>
                                    </div>


                                    <button type="submit" class="button alt" name="woocommerce_checkout_place_order"
                                            id="place_order" value="ثبت سفارش" data-value="ثبت سفارش">ثبت سفارش
                                    </button>

                                    <input type="hidden" id="woocommerce-process-checkout-nonce"
                                           name="woocommerce-process-checkout-nonce" value="3c963071d5"><input
                                    type="hidden" name="_wp_http_referer"
                                    value="/sepidtest/?wc-ajax=update_order_review&amp;elementor_page_id=19"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </div>
</template>

<script>
import Loading from "../../loading/loading";
import AddressCard from "../../address/card/address-card";
import Ic_location from "../../icon/ic_location";
import Ic_user1 from "../../icon/ic_user1";
import Ic_mobile2 from "../../icon/ic_mobile2";
import CartMessage from "../topbar/cart-message";
import Edit_address from "./level2/edit_address";
import Cart_addresses from "./level2/cart_addresses";

export default {
    name: "cart_level2",
    components: {Cart_addresses, Edit_address, CartMessage, Ic_mobile2, Ic_user1, Ic_location, AddressCard, Loading},
    computed: {
        products() {
            return this.$parent.products
        },
        detail() {
            return this.$parent.detail
        },
    },
    data() {
        return {
            status: '',
            auth: false,
            addresses: null,
            address_id: null,
            address: null

        }
    },
    methods: {
        selectAddress(v) {
            this.address = v
            let vm = this
            setTimeout(function () {
                vm.address_id = vm.address.id
                vm.status = ''
            }, 500)
        },
        async getAddress() {
            let {data} = await window.axios.get('/cart/address/list')
            this.addresses = data;
            if (data.length > 0)
                this.status = 'ادرس را انتخاب کنید'
            else
            {
                this.status = 'یک ادرس ایجاد کنید'
                this.address_id = 0
            }
        }
    },
    mounted() {
        this.getAddress()
    }
}
</script>

<style scoped>

</style>