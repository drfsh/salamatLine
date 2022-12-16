<template>
<div class="item">
    <div class="name">
        {{title}}
    </div>
    <div class="text">{{text}}</div>
</div>
</template>

<script>
export default {
    name: "info-item",
    props:['title','text']
}
</script>

<style scoped>

</style>