<template>
    <div class="pro-1-2 mt-0">
        <article id="post-19" class="post-19 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="woocommerce">
                    <cart-message v-if="status!==''" :situation="error" :text="status"></cart-message>
                    <div v-if="!auth" style="margin-top: -20px;" class="woocommerce-message woocommerce-error" role="alert" >
                        حساب کاربری از قبل دارید؟
                        <span class="link-login" @click="login">برای ورود اینجا کلیک کنید</span>
                    </div>
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="checkout woocommerce-checkout">
                        <edit_address v-if="address_id==0 || edit"></edit_address>
                        <cart_addresses v-else></cart_addresses>
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
                                        <span class="woocommerce-Price-amount amount"><bdi>{{$parent.separate(v.price * v.quantity) }}<span
                                                class="woocommerce-Price-currencySymbol">تومان</span></bdi></span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot v-if="detail.length!==0 && products.length!==0">
                                    <tr class="order-total">
                                        <th style="border-top: 1px solid #e8eff9 !important;">مجموع</th>
                                        <td><strong><span class="woocommerce-Price-amount amount"><bdi>{{$parent.separate(detail.total)}}<span
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

                                <div v-if="address_id==0 || edit " id="payment" class="woocommerce-checkout-payment">
                                    <cart_address_map></cart_address_map>
                                </div>

                            </div>
                            <div class="nextstep">
                                <a
                                    style="" @click="back"
                                    class="checkout-button button alt wc-forward back"><span>مرحله قبل</span>
                                </a>
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
        auth(){
            return window.auth
        }
    },
    data() {
        return {
            error:'',
            edit:false,
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
        login(){
            window.boxAlert.show = true
            window.boxAlert.type = "login"
        },
        back(){
            this.$parent.$parent.step=1
            $('html ,body').stop().animate({scrollTop: 0}, 500)
        },
        selectAddress(v,t=false) {
            this.address = v
            this.edit = t
            let vm = this
            setTimeout(function () {
                vm.address_id = vm.address.id
                vm.status = ''
                if (vm.address_id !== 0)
                    vm.isContinue = true
                else
                {
                    vm.isContinue = false
                    $('html ,body').stop().animate({scrollTop: 0}, 500)
                }
            }, 200)
        },
        async getAddress() {
            let {data} = await window.axios.get('/cart/address/list')
            this.addresses = data;
            if (data.length > 0)
                this.status = 'آدرس را انتخاب کنید'
            else {
                this.status = 'یک آدرس ایجاد کنید'
                this.address_id = 0
            }
        },
        alertM(text) {
            this.status = text
            this.error = 'warning'
            $('html ,body').stop().animate({scrollTop: 0}, 500)
        },
        async nextStep() {
            if (!this.isContinue) return ''


            if (this.address.title == null) {
                this.alertM('آدرس را ویرایش و عنوان را وارد کنید')
                return ''
            }
            if (this.address.mobile == null) {
                this.alertM('آدرس را ویرایش و نام را وارد کنید')
                return ''
            }
            if (this.address.lname == null) {
                this.alertM('آدرس را ویرایش و نام خانوادگی را وارد کنید')
                return ''
            }
            if (this.address.email == null) {
                this.alertM('آدرس را ویرایش و ایمیل را وارد کنید')
                return ''
            }
            if (this.address.province_id == null) {
                this.alertM('آدرس را ویرایش و استان را انتخاب کنید')
                return ''
            }
            if (this.address.city_id == null) {
                this.alertM('آدرس را ویرایش و شهر را انتخاب کنید')
                return ''
            }
            if (this.address.content == null) {
                this.alertM('آدرس را ویرایش و آدرس را وارد کنید')
                return ''
            }

            if (this.address.city_id!==1 || this.address.province_id!==1){
                if (this.address.zipcode == null) {
                    this.alertM('آدرس را ویرایش و کدپستی را وارد کنید')
                    return ''
                }
            }

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
            $('html ,body').stop().animate({scrollTop: 0}, 500)
        }
    },
    mounted() {
        let vm =this
        if (window.auth)
        this.getAddress()
        else{
            this.status = 'جهت ادامه فرایند خرید وارد حساب کاربری خود شوید!'
            this.error = 'warning'
        }
        let inter = setInterval(function () {
            if (window.auth)
            {
                vm.auth = true
                this.getAddress()
                clearInterval(inter)
            }else {
                vm.auth = false
            }
        }, 500)
    }
}
</script>

<style scoped>

</style>
