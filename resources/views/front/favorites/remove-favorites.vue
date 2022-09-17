<template>
    <i role="button" @click="remove()" class="fas fa-trash"></i>
</template>

<script>
export default {
    name: "remove-favorites",
    props:['id'],
    methods:{
        async remove() {
            let {data} = await window.axios.post('/profile/add-favorite/' + this.id)
            location.reload()
        }
    }
}
</script>

<style scoped>

</style>
