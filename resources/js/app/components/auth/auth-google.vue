<template>
    <div>
        <a class="auth-google" href="/auth/google">
            <span class="icon-google">
                <google></google>
            </span>
            <span class="google-button__text">ورود با حساب گوگل</span>
        </a>
    </div>
</template>

<script>
import Google from "../icon/ic_google";
export default {
    name: "auth-google",
    components: {Google}
}
</script>

<style scoped>

</style>