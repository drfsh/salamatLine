<template>
    <div>
        <div class="price" v-html="price"></div>
        <div class="d-add-shop">
        <span class="bbox count-box">
            <span class="btn circle-hover" role="button" @click="add"><ic_add></ic_add></span>
            <span class="count">{{ count }}</span>
            <span class="btn circle-hover" role="button" @click="minus"><ic_minus></ic_minus></span>
        </span>
            <button role="button" @click="adToCard" class="btn add">
            <span v-if="!loading">
            <ic_basket></ic_basket>
            افزودن به سبد خرید
            </span>
                <loading v-else class="small"></loading>
            </button>
            <div class="info-orng">
                <span><ic_shield></ic_shield></span>
                <span>تا ۸ سال ضمانت دارد</span>
            </div>
        </div>
    </div>
</template>

<script>
import Ic_add from "../icon/ic_add";
import Ic_minus from "../icon/ic_minus";
import Ic_basket from "../icon/ic_basket";
import Loading from "../loading/loading";
import Ic_shield from "../icon/ic_shield";

export default {
    name: "add-card",
    components: {Ic_shield, Loading, Ic_basket, Ic_minus, Ic_add},
    props: {
        price: {
            default: '0',
        },
        id: {
            default: '0',
        },
    },
    data() {
        return {
            count: 1,
            maxCount: 10,
            minCount: 1,
            loading: false
        }
    },
    methods: {
        add() {
            if (this.count !== this.maxCount)
                this.count++
        },
        minus() {
            if (this.count !== this.minCount)
                this.count--
        },
        async adToCard() {
            this.loading = true
            let {data} = await window.axios.post('/cart/add/' + this.id)
            this.loading = false
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>