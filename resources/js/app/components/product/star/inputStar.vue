<template>
    <div class="star-rating">
        <div class="back-stars">
            <i class="far fa-star" @click="value=1"></i>
            <i class="far fa-star" @click="value=2"></i>
            <i class="far fa-star" @click="value=3"></i>
            <i class="far fa-star" @click="value=4"></i>
            <i class="far fa-star" @click="value=5"></i>
            <div class="front-stars" :style="'width:'+present+'%;'">
                <i class="fa fa-star" @click="value=1"></i>
                <i class="fa fa-star" @click="value=2"></i>
                <i class="fa fa-star" @click="value=3"></i>
                <i class="fa fa-star" @click="value=4"></i>
                <i class="fa fa-star" @click="value=5"></i>
            </div>
        </div>
    </div>
    <input type="hidden" :name="name" v-model="value">
</template>

<script>
export default {
    name: "inputStar",
    props:['name'],
    data(){
        return{
            value:0,
            present:0,
        }
    },
    watch:{
        value(v){
            this.present = v*20
        }
    }
}
</script>

<style scoped>

</style>