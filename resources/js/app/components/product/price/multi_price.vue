<template>
    <div class="multi-price">
        <div role="button" @click="thisSelect(i,v.id)" class="item" v-for="(v,i) in items"
             :class="{'active':i==select}">
            <span class="name">{{ v.title }}</span>


            <span v-if="!$parent.isDiscount">{{ $parent.separate(v.price) }} تومان </span>
            <span v-else v-for="(x,y) in $parent.discount2">
                <span style="font-size: 11px;margin-left: 11px;" v-if="x.price_id==v.id" class="old">{{ $parent.separate(v.price) }} تومان </span>
                <span v-if="x.price_id==v.id">{{ $parent.separate(v.price - x.price) }} تومان </span>
                <span v-else>{{ $parent.separate(v.price) }} تومان </span>
            </span>

        </div>
    </div>
</template>

<script>
export default {
    name: "multi_price",
    props: ['items'],
    data() {
        return {
            select: -1
        }
    },
    methods: {
        thisSelect(i, id) {
            if (i == this.select)
                this.select = -1
            else {
                this.select = i
                this.$parent.mp = id
            }
        }
    },
    mounted() {
        console.log(this.$parent.discount2)
    }
}
</script>

<style scoped>

</style>