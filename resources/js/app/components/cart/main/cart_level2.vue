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

                        <div class="cell-30-left">
                            <h3 class="order_review_heading">سفارش شما</h3>
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
                                        <span class="woocommerce-Price-amount amount"><bdi>{{
                                                $parent.separate(v.price * v.quantity)
                                            }}<span
                                                class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot v-if="detail.length!==0 && products.length!==0">
                                    <tr class="order-total">
                                        <th style="border-top: 1px solid #e8eff9 !important;">مجموع</th>
                                        <td><strong><span class="woocommerce-Price-amount amount"><bdi>{{
                                                $parent.separate(detail.total)
                                            }}<span
                                                class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></strong>
                                        </td>
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

                                <div v-if="address_id!==null" id="payment" class="woocommerce-checkout-payment">
                                    <cart_address_map></cart_address_map>
                                </div>

                            </div>
                            <div class="nextstep">
                                <a @click="nextStep" :class="{'disabled':!isContinue}"
                                   class="checkout-button button alt wc-forward"><span>ثبت سفارش</span></a>
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
import Loading from "../../loading/loading";
import AddressCard from "../../address/card/address-card";
import Ic_location from "../../icon/ic_location";
import Ic_user1 from "../../icon/ic_user1";
import Ic_mobile2 from "../../icon/ic_mobile2";
import CartMessage from "../topbar/cart-message";
import Edit_address from "./level2/edit_address";
import Cart_addresses from "./level2/cart_addresses";
import Cart_address_map from "./level2/cart_address_map";
import Full_loading from "../../loading/full_loading";

export default {
    name: "cart_level2",
    components: {
        Full_loading,
        Cart_address_map,
        Cart_addresses, Edit_address, CartMessage, Ic_mobile2, Ic_user1, Ic_location, AddressCard, Loading
    },
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
            address: {
                city_id: null,
                company: null,
                content: null,
                district_id: null,
                email: null,
                lat: null,
                lname: null,
                lng: null,
                mobile: null,
                name: null,
                province_id: null,
                title: null,
                zipcode: null
            },
            isContinue: false,
            fullLoading: false
        }
    },
    methods: {
        selectAddress(v) {
            this.address = v
            let vm = this
            setTimeout(function () {
                vm.address_id = vm.address.id
                vm.status = ''
                vm.isContinue = true
                $('html ,body').stop().animate({scrollTop:0},500)
            }, 200)
        },
        async getAddress() {
            let {data} = await window.axios.get('/cart/address/list')
            this.addresses = data;
            if (data.length > 0)
                this.status = 'ادرس را انتخاب کنید'
            else {
                this.status = 'یک ادرس ایجاد کنید'
                this.address_id = 0
            }
        },
        async nextStep() {
            if (!this.isContinue) return ''
            this.fullLoading = true

            let m = {
                step: this.$parent.step, address: this.address_id, delivery: null,
                address_model: this.address
            }
            let {data} = await window.axios.post('/cart/check-step', m)

            this.$parent.$parent.step = data.step
            this.status = data.status
            this.$parent.address_id = data.address
            this.fullLoading = false
            $('html ,body').stop().animate({scrollTop:0},500)
        }
    },
    mounted() {
        this.getAddress()
    }
}
</script>

<style scoped>

</style>
