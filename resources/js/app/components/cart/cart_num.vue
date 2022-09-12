<template>
    <span id="header-num-cart" class="num">{{ num }}</span>
</template>

<script>
export default {
    name: "cart_num",
    data() {
        return {
            num: 0
        }
    },
    methods: {
        async getData() {
            let {data} = await window.axios.get('/cart/detail')
            if (data.error == 'please login')
                this.num = 0
            else

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