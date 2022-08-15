<template>
    <div>
        <button @click="exportTable()" class="btn-edit-blue export">excel</button>
    </div>
    <div class="f-loading" v-if="loading">
        <loading></loading>
    </div>
</template>

<script>
import table2excel from 'js-table2excel'
import Loading from "../../loading/loading";
export default {
    name: "export",
    components: {Loading},
    data(){
      return{
          loading:false
      }
    },
    methods: {
        exportTable() {
            let vm = this
            $.confirm({
                backgroundDismiss: true,
                title: 'خروحی exel',
                content: 'از تمام محصولات خروجی گرفت بشه یا فقط از محصولات نمایش داده شده؟',
                buttons: {
                    ok: {
                        text: 'تمام محصولات',
                        btnClass: 'btn-blue',
                        action: async function () {
                            vm.allData()
                        }
                    },
                    ok2: {
                        text: 'از همین محصولات',
                        btnClass: 'btn-blue',
                        action: async function () {
                            $("#table-product").table2excel({
                                exclude: ".excludeThisClass",
                                name: "Worksheet Name",
                                filename: "SomeFile.xls", // do include extension
                                preserveColors: false // set to true if you want background colors and font colors preserved
                            });
                        }
                    },
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-danger float-left'
                    }
                }
            })
        },
        async allData() {
            this.loading = true
            const column = [
                {
                    title: 'Name',
                    key: 'name',
                },
                {
                    title: 'Age',
                    key: 'age.name',
                }
            ]
            const data = [
                {
                    name: 'xiao',
                    age: {name:'1'},
                },
                {
                    name: 'jie',
                    age: {name:'1'},
                }
            ]
            const excelName = 'boy'
            await table2excel(column, data, excelName)
            this.loading = false
        }
    },

}
</script>

<style scoped>

</style>