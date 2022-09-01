<template>
    <div class="multi-price">
        <div class="item" v-for="(v,i) in items">
            <span class="name">{{v.title}}</span>
            <span>{{$parent.separate(v.price)}} تومان </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "multi_price",
    props:['items'],
    mounted() {
        console.log(this.items)
    }
}
</script>

<style scoped>

</style>