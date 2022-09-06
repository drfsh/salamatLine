<template>
    <div class="woocommerce-notices-wrapper">
        <ul class="woocommerce-error" :class="'bg-'+situation" role="alert">
            <li>
                {{text}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "cart-message",
    props:['text','situation']
}
</script>

<style scoped>

</style>