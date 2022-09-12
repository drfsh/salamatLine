<template>
    <div class="box2 box3" style="margin: 0 10px;">
        <div class="title" style="font-size: 16px">{{name}}</div>
        <div class="products-items">
            <div style="font-size: 13px;">
                <span>نمایش</span>
                {{show_in}}
                <span>-</span>
                {{show_to}}
                از
                {{total}}
                نتیجه
            </div>
            <div class="feacher">
                <span>مرتب سازی بر اساس : </span>
                <span :class="{'active':order_by==''}" @click="change('')" class="item"> محبوبیت </span>
                <span :class="{'active':order_by=='star'}" @click="change('')" class="item"> امتیاز </span>
                <span :class="{'active':order_by=='id'}" @click="change('id')" class="item"> جدیدترین </span>
                <span :class="{'active':(order_by=='price' && f1=='asc')}" @click="change('price','asc')" class="item"> ارزان ترین </span>
                <span :class="{'active':(order_by=='price' && f1=='desc')}" @click="change('price','desc')" class="item"> گران ترین </span>
            </div>
        </div>
        <form style="display: none" method="get" action="" id="shorm">
            <input name="order_by" v-model="item" type="hidden"/>
            <input name="f" v-model="f" type="hidden"/>
            <input name="active" v-model="active" type="hidden"/>


            <input name="p1" v-model="p1" type="hidden"/>
            <input name="p2" v-model="p2" type="hidden"/>
        </form>
    </div>
</template>

<script>
export default {
    name: "filter",
    props:['show_in','show_to','total','name','order_by','f1','active','p1','p2'],
    data(){
      return{
          item:this.order_by,
          f:''
      }
    },
    methods:{
        change(order,f){
            this.f= f
            this.item = order;
            let form = $('#shorm')
            setTimeout(function () {
                form.submit();
            },500)
        }
    }
}
</script>

<style scoped>

</style>
