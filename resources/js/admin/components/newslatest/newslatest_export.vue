<template>
 <span @click="allData" class="create" style="color: red;border-color: red;">
     <i class="fas fa-file-export"></i>      خروجی
 </span>
    <div class="f-loading" style="z-index: 10000;" v-if="loading">
        <loading></loading>
    </div>
</template>

<script>
import Loading from "../../../app/components/loading/loading";
import table2excel from "js-table2excel";
export default {
    name: "newslatest_export",
    components: {Loading},
    data(){
        return{
            loading:false
        }
    },
    methods:{
        async allData() {
            this.loading = true
            let {data} = await window.axios.get('/admin/api/emails')


            const column = [
                {
                    title: '#',
                    key: 'id',
                },
                {
                    title: 'ایمیل',
                    key: 'email',
                },
                {
                    title: 'تاریخ',
                    key: 'created_at',
                }
            ]

            const excelName = 'product'
            await table2excel(column, data, excelName)
            this.loading = false
        },

    }
}
</script>

<style scoped>

</style>