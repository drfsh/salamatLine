<template>
<div role="button" class="item" @click="select(v.gregorian,v.active)"  :class="{'active':$parent.delivery===v.gregorian,'disable':!v.active}">
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
        select(g,active){
            if (active)
            this.$parent.delivery = g;
        }
    }
}
</script>

<style scoped>

</style>
