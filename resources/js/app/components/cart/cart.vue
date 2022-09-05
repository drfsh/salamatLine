<template>
    <topbar :title="title" v-if="level!=-1"/>
    <loading style="margin-top: 90px;" v-if="level===-1"></loading>
    <div class="size" v-else-if="level!==0">
        <route :level="level"></route>
    </div>
    <cart_empty v-else></cart_empty>
</template>

<script>
import Topbar from "./topbar/topbar";
import Route from "./route/route";
import Loading from "../loading/loading";
import Cart_empty from "./cart_empty";

export default {
    name: "cart",
    components: {Cart_empty, Loading, Route, Topbar},
    data() {
        return {
            title: 'سبد خرید',
            level: -1,
            loading: false
        }
    },
    methods: {
        async getData() {
            let {data} = await window.axios.get('/cart/items')
            if (data.length == 0) {
                this.level = 0
            } else
                this.level = 1
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style scoped>

</style>