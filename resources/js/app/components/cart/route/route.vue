<template>
    <div class="pro-1-2 p50">
        <div class="route">
            <div role="button" @click="$parent.$parent.step=1" class="item active">
                <ic_basket></ic_basket>
                <span>سبد خرید</span>
            </div>
            <span class="line">
                <span class="bg" :style="'width: '+w1+'%;'"></span>
            </span>
            <div class="item" :class="{'active':level>1}">
                <ic_clipboard></ic_clipboard>
                <span>جزییات پرداخت</span>
            </div>
            <span class="line">
                <span class="bg" :style="'width: '+w2+'%;'"></span>
            </span>
            <div class="item" :class="{'active':level>2}">
                <ic_verify></ic_verify>
                <span>تکمیل سفارش</span>
            </div>
        </div>
    </div>
</template>

<script>
import Ic_basket from "../../icon/ic_basket";
import Ic_verify from "../../icon/ic_verify";
import Ic_clipboard from "../../icon/ic_clipboard";
export default {
    name: "route",
    props:['level'],
    components: {Ic_clipboard, Ic_verify, Ic_basket},
    computed:{
        w1(){
            if (this.level==1)
                return 50
            else if( this.level>1)
                return 100
        },
        w2(){
            if (this.level==2)
                return 0
            else if( this.level>2)
                return 100
        }
    }
}
</script>

<style scoped>

</style>
