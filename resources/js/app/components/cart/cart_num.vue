<template>
    <div class="sepid-mini-cart-header btnh">
        <a style="display:flex;" href="/cart">
            <ic_basket></ic_basket>
            <span id="header-num-cart" class="num">{{ num }}</span>
        </a>
        <mini_cart :data="data"></mini_cart>
    </div>
</template>

<script>
import Ic_basket from "../icon/ic_basket2";
import Mini_cart from "./mini_cart/mini_cart";
export default {
    name: "cart_num",
    components: {Mini_cart, Ic_basket},
    data() {
        return {
            num: 0,
            data:null,
        }
    },
    methods: {
        async getData() {
            let {data} = await window.axios.get('/cart/detail')
            if (data.error == 'please login'){
                this.num = 0
            }
            else
            {
                this.num = data.qty
                this.data = data
            }
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style scoped>

</style>
