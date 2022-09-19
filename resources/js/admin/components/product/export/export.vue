<template>
    <div>
        <button @click="exportTable()" class="btn-edit-blue export">excel</button>
        <button @click="exportCSV()" style="margin-left: 5px" class="btn-edit-blue export">CSV</button>
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
    data() {
        return {
            loading: false
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
                            vm.currentData();
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
            let {data} = await window.axios.get('/admin/api/product')


            const column = [
                {
                    title: '#',
                    key: 'id',
                },
                {
                    title: 'نام',
                    key: 'title',
                },
                {
                    title: 'ادامه نام',
                    key: 'subtitle',
                },
                {
                    title: 'قیمت (ریال)',
                    key: 'price',
                },
                {
                    title: 'برند',
                    key: 'brand',
                },
                {
                    title: 'کشور',
                    key: 'country',
                },
                {
                    title: 'تاریخ ایجاد',
                    key: 'created_at',
                },
                {
                    title: 'وضعیت',
                    key: 'active',
                }
            ]
            for (const i in data) {
                if (data[i].brand == null) {
                    data[i].brand = 'تعریف نشده'
                } else {
                    data[i].brand = data[i].brand.title
                }
                if (data[i].country == null) {
                    data[i].country = 'تعریف نشده'
                } else {
                    data[i].country = data[i].country.title
                }
                if (data[i].active == 0) {
                    data[i].active = 'غیر فعال'
                } else {
                    data[i].active = 'فعال'
                }
            }
            const excelName = 'product'
            await table2excel(column, data, excelName)
            this.loading = false
        },
        async currentData() {
            this.loading = true
            let data = this.$parent.list
            const column = [
                {
                    title: '#',
                    key: 'id',
                },
                {
                    title: 'نام',
                    key: 'title',
                },
                {
                    title: 'ادامه نام',
                    key: 'subtitle',
                },
                {
                    title: 'قیمت (ریال)',
                    key: 'price',
                },
                {
                    title: 'برند',
                    key: 'brand',
                },
                {
                    title: 'کشور',
                    key: 'country',
                },
                {
                    title: 'تاریخ ایجاد',
                    key: 'created_at',
                },
                {
                    title: 'وضعیت',
                    key: 'active',
                }
            ]
            for (const i in data) {
                if (data[i].brand == null) {
                    data[i].brand = 'تعریف نشده'
                } else {
                    data[i].brand = data[i].brand.title
                }
                if (data[i].country == null) {
                    data[i].country = 'تعریف نشده'
                } else {
                    data[i].country = data[i].country.title
                }
                if (data[i].active == 0) {
                    data[i].active = 'غیر فعال'
                } else {
                    data[i].active = 'فعال'
                }
            }
            const excelName = 'product'
            await table2excel(column, data, excelName)
            this.loading = false
        },
        async exportCSV() {

            let vm = this
            $.confirm({
                backgroundDismiss: true,
                title: 'خروحی CSV',
                content: 'از تمام محصولات خروجی گرفت بشه یا فقط از محصولات نمایش داده شده؟',
                buttons: {
                    ok: {
                        text: 'تمام محصولات',
                        btnClass: 'btn-blue',
                        action: async function () {
                            vm.exportCSVAll()
                        }
                    },
                    ok2: {
                        text: 'از همین محصولات',
                        btnClass: 'btn-blue',
                        action: async function () {
                            vm.exportCSVCurrent();
                        }
                    },
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-danger float-left'
                    }
                }
            })
        },
        async exportCSVAll() {
            this.loading = true
            let {data} = await window.axios.get('/admin/api/product')
            let datav2 = []
            for (const i in data) {

                datav2[i] = {
                    '#': '',
                    'نام': '',
                    'ادامه نام': '',
                    'فیمت (ریال)':'',
                    'برند':'',
                    'کشور':'',
                    'وضعیت':'',
                    'تاریخ ایجاد':''
                }
                datav2[i]['#'] = data[i].id
                datav2[i]['نام'] = data[i].title
                datav2[i]['ادامه نام'] = data[i].subtitle
                datav2[i]['فیمت (ریال)'] = data[i].price
                if (data[i].brand == null) {
                    datav2[i]['برند'] = 'تعریف نشده'
                } else {
                    datav2[i]['برند'] = data[i].brand.title
                }
                if (data[i].country == null) {
                    datav2[i]['کشور'] = 'تعریف نشده'
                } else {
                    datav2[i]['کشور'] = data[i].country.title
                }
                if (data[i].active == 0) {
                    datav2[i]['وضعیت'] = 'غیر فعال'
                } else {
                    datav2[i]['وضعیت'] = 'فعال'
                }
                datav2[i]['تاریخ ایجاد'] = data[i].created_at
            }
            var items = datav2;
            const replacer = (key, value) => value === null ? '' : value; // specify how you want to handle null values here
            const header = Object.keys(items[0]);
            let csv = items.map(row => header.map(fieldName => JSON.stringify(row[fieldName], replacer)).join(','));
            csv.unshift(header.join(','));
            csv = csv.join('\r\n');

            //Download the file as CSV
            var downloadLink = document.createElement("a");
            var blob = new Blob(["\ufeff", csv]);
            var url = URL.createObjectURL(blob);
            downloadLink.href = url;
            downloadLink.download = "product.csv";  //Name the file here
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
            this.loading = false
        },
        async exportCSVCurrent() {
            this.loading = true
            let data = this.$parent.list
            let datav2 = []
            for (const i in data) {

                datav2[i] = {
                    '#': '',
                    'نام': '',
                    'ادامه نام': '',
                    'فیمت (ریال)':'',
                    'برند':'',
                    'کشور':'',
                    'وضعیت':'',
                    'تاریخ ایجاد':''
                }
                datav2[i]['#'] = data[i].id
                datav2[i]['نام'] = data[i].title
                datav2[i]['ادامه نام'] = data[i].subtitle
                datav2[i]['فیمت (ریال)'] = data[i].price
                if (data[i].brand == null) {
                    datav2[i]['برند'] = 'تعریف نشده'
                } else {
                    datav2[i]['برند'] = data[i].brand.title
                }
                if (data[i].country == null) {
                    datav2[i]['کشور'] = 'تعریف نشده'
                } else {
                    datav2[i]['کشور'] = data[i].country.title
                }
                if (data[i].active == 0) {
                    datav2[i]['وضعیت'] = 'غیر فعال'
                } else {
                    datav2[i]['وضعیت'] = 'فعال'
                }
                datav2[i]['تاریخ ایجاد'] = data[i].created_at
            }
            var items = datav2;
            const replacer = (key, value) => value === null ? '' : value; // specify how you want to handle null values here
            const header = Object.keys(items[0]);
            let csv = items.map(row => header.map(fieldName => JSON.stringify(row[fieldName], replacer)).join(','));
            csv.unshift(header.join(','));
            csv = csv.join('\r\n');

            //Download the file as CSV
            var downloadLink = document.createElement("a");
            var blob = new Blob(["\ufeff", csv]);
            var url = URL.createObjectURL(blob);
            downloadLink.href = url;
            downloadLink.download = "product.csv";  //Name the file here
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
            this.loading = false
        },
    },

}
</script>

<style scoped>

</style>
