<template>
    <form action="/register" method="post" class="f-ho">
        <input type="hidden" name="_token" :value="csrf_token">
        <div style="margin-bottom: 10px;" class="input-login rtl">
            <div class="hw100">
                <input name="name" type="text" placeholder="نام " required>
            </div>
            <div class="icon">
                <ic_user1></ic_user1>
            </div>
        </div>
        <div style="margin-bottom: 10px;" class="input-login rtl">
            <div class="hw100">
                <input name="email" type="email" placeholder="ایمیل" required>
            </div>
            <div class="icon">
                <ic_email></ic_email>
            </div>
        </div>
        <div style="margin-bottom: 10px;" class="input-login rtl">
            <div class="hw100">
                <input name="password" type="password" placeholder="پسورد"  required>
            </div>
            <div class="icon">
                <ic_key></ic_key>
            </div>
        </div>
        <div style="margin-bottom: 10px;" class="input-login rtl">
            <div class="hw100">
                <input name="password_confirmation" type="password" placeholder="تکرار پسورد"  required>
            </div>
            <div class="icon">
                <ic_key></ic_key>
            </div>
        </div>
        <div>
            <button type="submit" class="btn-login">
                <span>ثبت نام</span>
            </button>
        </div>
    </form>
</template>

<script>
import Ic_email from "../../icon/ic_email";
import Ic_key from "../../icon/ic_key";
import Loading from "../../loading/loading";
import Ic_user1 from "../../icon/ic_user1";
export default {
    name: "register-email",
    components: {Ic_user1, Loading, Ic_key, Ic_email},

    computed:{
        csrf_token(){
            return window.csrf_token
        }
    }
}
</script>

<style scoped>

</style>
