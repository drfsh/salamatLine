<template>
    <div v-if="show" class="woocommerce-notices-wrapper">
        <div class="woocommerce-message" role="alert">
            <a href="/cart" tabindex="1" class="button wc-forward">مشاهده سبد خرید</a>
            “{{name}}” به سبد خرید شما افزوده شد.
        </div>
    </div>
</template>

<script>
export default {
    name: "added-card",
    props:['name'],
    data(){
        return{
            show:false
        }
    },
    created(){
        let vm = this
        setInterval(function () {
            vm.show = !!window.newCardAdd;
        },500)
    }
}
</script>

<style scoped>

</style>