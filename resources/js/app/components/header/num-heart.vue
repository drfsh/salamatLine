<template>
    <span v-if="num!==0" id="heart-num-cart" class="num">{{num}}</span>
</template>

<script>
export default {
    name: "num-heart",
    data(){
        return{
            num:0
        }
    },
    methods:{
        async getData() {
            let {data} = await window.axios.get('/profile/favorites/count')
            this.num = data.count
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style scoped>

</style>