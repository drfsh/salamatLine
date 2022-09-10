<template>
    <span id="header-num-cart" class="num">{{num}}</span>
</template>

<script>
export default {
    name: "cart_num",
    data(){
        return{
            num:0
        }
    },
    methods:{
        async getData() {
            let {data} = await window.axios.get('/cart/detail')
            this.num = data.qty
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style scoped>

</style>