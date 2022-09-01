<template>
    <div class="d-add-shop">
        <div class="w-100">
            <!--price and discount one price-->
            <one_price v-if="price!==null"></one_price>
            <!--end-->
            <!--multi price-->
            <multi_price v-if="multiprice2.length!==0" :items="multiprice2"></multi_price>
            <!--end multi price-->
        </div>
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
        <div v-if="status!==null">
            <div class="gap"></div>
            <div class="callout warning"><small>{{ status }}</small></div>
        </div>
        <div class="info-orng">
            <span><ic_shield></ic_shield></span>
            <span>تا ۸ سال ضمانت دارد</span>
        </div>
    </div>
</template>

<script>
import Ic_add from "../icon/ic_add";
import Ic_minus from "../icon/ic_minus";
import Ic_basket from "../icon/ic_basket";
import Loading from "../loading/loading";
import Ic_shield from "../icon/ic_shield";
import One_price from "./price/one_price";
import Multi_price from "./price/multi_price";

export default {
    name: "add-card",
    components: {Multi_price, One_price, Ic_shield, Loading, Ic_basket, Ic_minus, Ic_add},
    props: {
        singleprice: {
            default: 0,
        },
        id: {
            default: '0',
        },
        discount: {
            default: [],
        },
        multiprice: {
            default: [],
        },
        multifeature: {
            default: [],
        },
    },
    data() {
        return {
            count: 1,
            maxCount: 10,
            minCount: 1,
            loading: false,
            discount2: [],
            multiprice2: [],
            multifeature2: [],
            mp: null,
            mf: null,
            status: null,
        }
    },
    computed: {
        price() {
            if (this.singleprice == '')
                return null

            if (!this.isDiscount)
                return this.separate(this.singleprice)
            else
                return this.separate(this.singleprice - this.discount2[0]['price'])
        },
        isDiscount() {
            if (this.discount2.length > 0)
                return true
            else return false
        }
    },
    methods: {
        separate(Number) {
            Number /= 10
            Number += '';
            Number = Number.replace(',', '');
            let x = Number.split('.');
            let y = x[0];
            let z = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(y))
                y = y.replace(rgx, '$1' + ',' + '$2');
            return y + z;
        },
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
            let m = {mf: this.mp, mp: this.mp};
            let {data} = await window.axios.post('/cart/add/' + this.id, m)
            this.status = data.status;
            this.loading = false
        }
    },
    mounted() {
        this.discount2 = JSON.parse(this.discount)
        this.multiprice2 = JSON.parse(this.multiprice)
        this.multifeature2 = JSON.parse(this.multifeature)
    }
}
</script>

<style scoped>

</style>