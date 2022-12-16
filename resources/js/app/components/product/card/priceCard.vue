<template>
    <div class="price-box">

        <div v-if="data.discount_price && active" class="price ho c">
            <div class="" v-html="data.showing_price"></div>
        </div>
        <div v-else-if="active" class="grid-x align-middle price">
            <div class="cell shrink">
                <div class="old" v-html="data.showing_price"></div>
            </div>
            <div v-html="data.discount_price"></div>
        </div>

        <div v-if="data.price_hide==true && !active" class="price text-center">تماس بگیرید</div>
        <div v-else-if="!active" class="price text-center">موجود نیست</div>

        <basket-product
            :id="data.id"
            :name="data.title"
            :model="data.subtitle"
            :img="data.tiny"
            :active="active">
        </basket-product>
    </div>

</template>

<script>
import BasketProduct from "../holder/basket-product/basket-product";

export default {
    name: "priceCard",
    components: {BasketProduct},
    computed: {
        data() {
            return this.$parent.data
        },
        active() {
            if (this.data.active && !this.data.price_hide)
                return 1
            else
                return 0
        },
    }
}
</script>

<style scoped>

</style>