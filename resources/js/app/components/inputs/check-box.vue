<template>
    <div @click="select=!select" class="checkbox" :class="{'active':select}">
        <span>نمایش محصولات موجود</span>
    </div>
</template>

<script>
export default {
    name: "check-box",
    data(){
        return{
            select:false,
        }
    }
}
</script>

<style scoped>

</style>