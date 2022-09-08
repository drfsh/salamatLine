<template>
<div role="button" class="item" @click="select(v.gregorian)" :class="{'active':$parent.delivery===v.gregorian}">
    <span class="text">
        {{v.title}}
    </span>
    <span class="content">
        {{v.full}}
    </span>
</div>
</template>

<script>
export default {
    name: "cart_date_item",
    props:['v'],
    methods:{
        select(g){
            this.$parent.delivery = g;
        }
    }
}
</script>

<style scoped>

</style>
