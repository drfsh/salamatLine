<template>
    <div title="99.9%" class="star-rating">
        <div class="back-stars">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <div class="front-stars" :style="'width:'+value+'%;'">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "star",
    props:{
        value:{
            default:'99.9'
        }
    }
}
</script>

<style scoped>

</style>