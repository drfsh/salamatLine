<template>
    <div v-if="show" class="woocommerce-notices-wrapper">
        <div class="woocommerce-message" role="alert" v-if="text==='added'">
            <a href="/cart" tabindex="1" class="button wc-forward">مشاهده سبد خرید</a>
                “{{ name }}” به سبد خرید شما افزوده شد.
        </div>
        <div class="woocommerce-message" role="alert" v-else-if="text==='login'">
            <a @click="showLogin=true" tabindex="1" class="button wc-forward">ورود</a>
                برای افزودن به سبد خرید ابتدا وارد حساب کاربری خود شوید
        </div>
        <div class="woocommerce-message" role="alert" v-else>
            {{text}}
        </div>
    </div>
    <fixed_login v-if="showLogin"></fixed_login>
</template>

<script>
import Fixed_login from "../../auth/fixed_login";
export default {
    name: "added-card",
    components: {Fixed_login},
    props: ['name'],
    data() {
        return {
            show: false,
            text: '',
            showLogin:false
        }
    },
    created() {
        let vm = this
        setInterval(function () {
            if (window.newCardAdd)
            {
                vm.show = true;
                vm.text = window.newCardAdd
            }
        }, 500)
    }
}
</script>

<style scoped>

</style>
