<template>
    <div class="pro-1-2 p50">
        <div class="route">
            <div role="button"  @click="back(1)" class="item active">
                <ic_basket></ic_basket>
                <span>سبد خرید</span>
            </div>
            <span class="line">
                <span class="bg" :style="'width: '+w1+'%;'"></span>
            </span>
            <div role="button" class="item" @click="back(2)" :class="{'active':level>1}">
                <ic_clipboard></ic_clipboard>
                <span>جزییات پرداخت</span>
            </div>
            <span class="line">
                <span class="bg" :style="'width: '+w2+'%;'"></span>
            </span>
            <div role="button" class="item" @click="back(3)" :class="{'active':level>3}">
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
    },
    methods:{
        back(i){
            if (this.level===1) return
            else if (i<this.level){
                this.$parent.$parent.step=i
            }
        }
    }
}
</script>

<style scoped>

</style>
