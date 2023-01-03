<template>
    <div class="item">
        <div class="item--bg">
            <img :src="value.img">
            <div class="info">
                <div>{{ value.name }}
                </div>
            </div>
            <button>
                <i class="fas fa-times ellipsis" @click="deleteForEver()"></i>
                <i class="fas fa-check ellipsis" @click="restore()" style="left: 28px;"></i>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "item-trash",
    props: ['value','i'],

    methods: {
        deleteForEver(){
            window.axios.post('/admin/category/api/trash/delete/'+this.value.show_id)
            this.$parent.trash.splice(this.i,1)
        },
        restore(){
            window.axios.post('/admin/category/api/trash/restore/'+this.value.show_id)
            this.$parent.trash.splice(this.i,1)
        }
    },

}
</script>

<style scoped>

</style>