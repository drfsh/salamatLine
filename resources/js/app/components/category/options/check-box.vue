<template>
    <div class="cat side-bar box3">
        <div class="title">نمایش محصولات</div>
        <div class="body">
            <div @click="chaneg(!select)" class="checkbox" :class="{'active':select}">
                <span>نمایش محصولات موجود</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "check-box",
    props: ['f', 'order_by', 'active','p1','p2'],
    data() {
        return {
            select: false,
        }
    },
    methods:{
        chaneg(i) {
            this.select = i
            this.$parent.filter['onlyActive'] = i
            this.$parent.getProducts()
        }
    },
    mounted() {
        if (this.active == 'true')
            this.select = true
        else
            this.select = false
    },
}
</script>

<style scoped>

</style>
