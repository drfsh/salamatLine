<template>
    <div class="mini-cart-3">

        <div v-if="$parent.num!==0" class="widget_shopping_cart_content">

            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                <li v-for="v in products" class="woocommerce-mini-cart-item mini_cart_item">
                    <span role="button" @click="itemDelete(v.id)" class="remove remove_from_cart_button">×</span>
                    <a class="cart-item-image">
                    <img width="300" height="300" :src="v.attributes.img"
                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
                    </a>
                    <div class="cart-item-content">
                        <a :href="'/products/'+v.attributes.slug" class="product-title">{{v.name}}</a>
                        <span class="quantity">{{ v.quantity }} ×
                            <span class="woocommerce-Price-amount amount">
                                <bdi>{{convert(v.price)}}
                                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                                </bdi>
                            </span>
                        </span>
                    </div>
                </li>
            </ul>

            <p class="woocommerce-mini-cart__total total">
                <strong>
                    <i class="fi fi-rr-label"></i>
                    مبلغ کل:
                </strong>
                <span class="woocommerce-Price-amount amount">
                    <bdi>{{convert(data.total)}}
                        <span class="woocommerce-Price-currencySymbol">
                            تومان
                        </span>
                    </bdi>
                </span>
            </p>


            <p class="woocommerce-mini-cart__buttons buttons">
                <a href="/cart" class="button wc-forward">مشاهده سبد خرید</a>
                <a href="/cart" class="button checkout wc-forward">تسویه حساب</a>
            </p>
        </div>
        <div v-else>
            <img style="max-width: 100px" src="/img/page/empty-cart.svg" alt="سبد خرید">
            <h2 style="font-size: 12px;margin: 13px;" class="title-empty">سبد خرید شما خالی است!</h2>
        </div>
    </div>
</template>

<script>
import {riyalToman} from '../../../utils/tools'
export default {
    name: "mini_cart",
    props:['data'],
    data(){
        return{
            products:null,
        }
    },
    methods:{
        async getData() {
            let {data} = await window.axios.get('/cart/items')
            this.products = data
        },
        convert(n){
            return riyalToman(n)
        },
        async itemDelete(i) {
            delete this.products[i]
            let {data} = await window.axios.get('/cart/remove-cart-item/' + i);
            this.$parent.getData()
        }
    },
    mounted() {
        this.getData()
        let vm = this
        setInterval(async function () {
            let x = $('#header-num-cart').text()
            if (x != vm.$parent.num) {
                await vm.getData()
                vm.$parent.getData()
            }
        },1000)
    }
}
</script>

<style scoped>

</style>
