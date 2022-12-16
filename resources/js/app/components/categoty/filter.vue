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
                <span :class="{'active':sort=='new'}" @click="change('new')" class="item"> جدیدترین </span>
                <span :class="{'active':sort=='old'}" @click="change('old')" class="item"> قدیمی ترین </span>
                <span :class="{'active':(sort=='price_down')}" @click="change('price_down')" class="item"> ارزان ترین </span>
                <span :class="{'active':(sort=='price_up')}" @click="change('price_up')" class="item"> گران ترین </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "filter",
    computed:{
        name(){
            return window.cat_name;
        },
        sort(){
            return this.filter.sort
        },
        filter(){
          return this.$parent.filter
        },
        show_to(){
            if (this.$parent.data)
                return this.$parent.data.to
        },
        show_in(){
            if (this.$parent.data)
                return this.$parent.data.from
        },
        total(){
            if (this.$parent.data)
                return this.$parent.data.total
        }
    },
    methods:{
        change(order){
            this.$parent.filter['sort'] = order
            this.$parent.filter['page'] = 1
            this.$parent.getProducts()
        }
    }
}
</script>

<style scoped>

</style>
