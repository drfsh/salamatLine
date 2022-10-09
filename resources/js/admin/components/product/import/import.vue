<template>
    <div>
        <button class="btn-edit-blue export" style="float: right;background: #ff5722;color: white;" @click="read">import</button>
        <input type="file" id="fileImport" style="display: none">
    </div>
    <div class="f-loading" v-if="loading.show">
        <loading></loading>
        <span>{{ loading.content }}</span>
    </div>
</template>

<script>
import * as Excel from 'exceljs'
import Loading from "../../../../app/components/loading/loading";

export default {
    name: "import",
    components: {Loading},
    data() {
        return {
            loading: {show: false, content: ''}
        }
    },
    methods: {
        async read() {
            let buffer = await this.openFile()

            if (buffer !== null)
                console.log(buffer)
            else {

                this.loading.show = false
                alert('error')
            }

            const wb = new Excel.Workbook()
            await wb.xlsx.load(buffer)
            let ws = wb.getWorksheet("my")

            let count = 2
            let request = [];
            this.loading.content = 'دریافت داده ها'
            while (true) {
                let row = ws.getRow(count)
                let cell = row.getCell(1)
                const id = cell.value
                if (cell.value == null || cell.value === '')
                    break
                let cell2 = row.getCell(2)
                const name = cell2.value
                let cell3 = row.getCell(3)
                const model = cell3.value
                let cell4 = row.getCell(4)
                const price = cell4.value
                request.push({id: id, title: name, model: model, price: price})
                this.loading.content = 'محصولات : ' + (count - 1)
                count++
            }
            this.loading.content = 'ارسال به سرور...'
            let {data} = await window.axios.post('/admin/product/import', {data: request})
            this.loading.show = false
            alert(data.count + ' محصول با موفقیت ویرایش شد!')
        },
        openFile() {
            let vm = this
            let inputProfile = $('#fileImport');
            inputProfile.click();
            return new Promise(function (resolve, reject) {
                inputProfile.change(function () {
                    vm.loading.show = true
                    vm.loading.content = 'پردازش فایل'
                    var file = $(this).val();
                    if (file !== '') {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            resolve(e.target.result)
                        }
                        reader.onprogress = function (e) {
                            if (e.lengthComputable) {
                                let p = parseInt((e.loaded / e.total) * 100, 10)
                                if (p == 100)
                                    vm.loading.content = 'تکمیل داده ها(صبور باشید)'
                                else
                                    vm.loading.content = '%' + p

                            }
                        }
                        reader.readAsArrayBuffer(document.getElementById('fileImport').files[0])
                    } else {
                        vm.loading.show = false
                    }
                })
            })
        },
    },
    async mounted() {
    }
}
</script>

<style scoped>

</style>