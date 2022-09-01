<template>
    <div v-if="$parent.isDiscount && $parent.price!==null" class="old">
        {{ $parent.separate($parent.singleprice) }}
        <span>تومان</span>
    </div>
    <div v-if="$parent.price!==null" class="price">
        {{ $parent.price }}
        <span>تومان</span>
    </div>
</template>

<script>
export default {
    name: "one_price"
}
</script>

<style scoped>

</style>