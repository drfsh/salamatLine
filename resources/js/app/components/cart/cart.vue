<template>
    <topbar :title="title" v-if="level!=-1"/>
    <loading style="margin-top: 90px;" v-if="level===-1"></loading>
    <cart_main v-else-if="level!==0"></cart_main>
    <cart_empty v-else></cart_empty>
</template>

<script>
import Topbar from "./topbar/topbar";
import Route from "./route/route";
import Loading from "../loading/loading";
import Cart_empty from "./cart_empty";
import Cart_main from "./main/cart_main";

export default {
    name: "cart",
    components: {Cart_main, Cart_empty, Loading, Route, Topbar},
    data() {
        return {
            title: 'سبد خرید',
            level: -1,
            loading: false,
            detail:[]
        }
    },
    methods: {
        async getData() {
            let {data} = await window.axios.get('/cart/detail')
            if (data.qty == 0) {
                this.level = 0
            } else
            {
                this.level = 1
                this.detail = data
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
