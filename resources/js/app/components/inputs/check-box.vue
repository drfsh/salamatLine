<template>
    <div @click="chaneg(!select)" class="checkbox" :class="{'active':select}">
        <span>نمایش محصولات موجود</span>
    </div>
    <form style="display:none" method="get" action="" id="shorm2">
        <input name="active" v-model="select" type="hidden"/>

        <input name="order_by" v-model="order_by" type="hidden"/>
        <input name="f" v-model="f" type="hidden"/>


        <input name="p1" v-model="p1" type="hidden"/>
        <input name="p2" v-model="p2" type="hidden"/>
    </form>
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
            let form = $('#shorm2')
            setTimeout(function () {
                form.submit();
            }, 500)
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
