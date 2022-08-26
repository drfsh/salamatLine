<template>
    <div class=" info">ایمیل و پسورد خود را وارد کنید</div>
    <form action="/login" method="post" class="f-ho">
        <input type="hidden" name="_token" :value="csrf_token">
        <div class="input-login">
            <div class="hw100">
                <input name="email" type="email" placeholder="youremail@example.com" required>
            </div>
            <div class="icon">
                <ic_email></ic_email>
            </div>
        </div>
        <div style="margin-bottom: 4px;" class="input-login">
            <div class="hw100">
                <input name="password" type="password" placeholder="*******"  required>
            </div>
            <div class="icon">
                <ic_key></ic_key>
            </div>
        </div>
        <div class="check-q">
            <input type="checkbox" class="m-0" name="remember" id="remember">
            <label for="remember">
                مرا به خاطرت نگه دار
            </label>
        </div>
        <div>
            <button type="submit" class="btn-login m-0">
                <span>ورود</span>
            </button>
        </div>
    </form>
    <div style="
    margin-bottom: 20px;
    font-size: 13px;
    margin-top: 10px;">
        <a href="/password/reset">بازیابی رمز عبور</a>
    </div>
</template>

<script>
import Ic_email from "../../icon/ic_email";
import Ic_key from "../../icon/ic_key";
import Loading from "../../loading/loading";
export default {
    name: "auth-email",
    components: {Loading, Ic_key, Ic_email},

    computed:{
        csrf_token(){
            return window.csrf_token
        }
    }
}
</script>

<style scoped>

</style>
