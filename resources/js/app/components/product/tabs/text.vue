<template>
    <div class="product-info">
        <div class=title>توضیحات</div>
        <p v-html="text"></p>
    </div>
</template>

<script>
export default {
    name: "text",
    props:['text']
}
</script>

<style scoped>

</style>
