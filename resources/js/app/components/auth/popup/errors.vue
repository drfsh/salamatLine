<template>
    <div style="position: fixed;top: 23px;right: 18px;">
        <span v-for="v in items" class="invalid-feedback">{{ v[0] }}</span>
    </div>
</template>

<script>
export default {
    name: "errors",
    props:['items']
}
</script>

<style scoped>

</style>