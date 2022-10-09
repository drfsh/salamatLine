<template>
    <div>
        <button @click="exportTable()" class="btn-edit-blue export">excel</button>
        <button @click="exportCSV()" style="margin-left: 5px" class="btn-edit-blue export">CSV</button>
    </div>
    <div class="f-loading" v-if="loading.show">
        <loading></loading>
        <span>{{loading.content}}</span>
    </div>
</template>

<script>
import Loading from "../../loading/loading";
import * as Excel from 'exceljs'

export default {
    name: "export",
    components: {Loading},
    data() {
        return {
            loading:{show:false,content:''}
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
                            vm.toExcel("all")
                        }
                    },
                    ok2: {
                        text: 'از همین محصولات',
                        btnClass: 'btn-blue',
                        action: async function () {
                            vm.toExcel();
                        }
                    },
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-danger float-left'
                    }
                }
            })
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
            this.loading.show = true
            let {data} = await window.axios.get('/admin/api/product')
            let datav2 = []
            for (const i in data) {

                datav2[i] = {
                    '#': '',
                    'نام': '',
                    'ادامه نام': '',
                    'فیمت (ریال)': '',
                    'برند': '',
                    'کشور': '',
                    'وضعیت': '',
                    'تاریخ ایجاد': ''
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
            this.loading.show = false
        },
        async exportCSVCurrent() {
            this.loading.show = true
            let data = this.$parent.list
            let datav2 = []
            for (const i in data) {

                datav2[i] = {
                    '#': '',
                    'نام': '',
                    'ادامه نام': '',
                    'فیمت (ریال)': '',
                    'برند': '',
                    'کشور': '',
                    'وضعیت': '',
                    'تاریخ ایجاد': ''
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
            this.loading.show = false
        },
        async toExcel(type = 'current') {
            this.loading.show = true
            let list;
            if (type === 'current')
                list = this.$parent.list
            else
            {
                this.loading.content = 'دریافت محصولات..'
                let {data} = await window.axios.get('/admin/api/product')
                list = data;
            }


            let vm = this
            const wd = new Excel.Workbook()
            const ws = wd.addWorksheet("my")
            ws.getColumn(1).width = 10
            ws.getColumn(2).width = 30
            ws.getColumn(3).width = 15
            ws.getColumn(4).width = 15
            ws.getColumn(5).width = 15
            ws.getColumn(7).width = 35
            ws.addRow(["تصویر", "نام", "مدل", "قیمت(ریال)", "برند", "کشور", "تاریخ ایجاد", "وضعیت"])
            let count = 2;

            for (const i in list) {
                if (list[i].brand == null) {
                    list[i].brand = 'تعریف نشده'
                } else {
                    list[i].brand = list[i].brand.title
                }
                if (list[i].country == null) {
                    list[i].country = 'تعریف نشده'
                } else {
                    list[i].country = list[i].country.title
                }
                if (list[i].active == 0) {
                    list[i].active = 'غیر فعال'
                } else {
                    list[i].active = 'فعال'
                }


                let image = await this.getImg(list[i].tiny)
                let imageId = wd.addImage({
                    base64: image,
                    extension: 'png'
                })
                ws.addImage(imageId, {
                    tl: {col: 0, row: count - 1},
                    ext: {width: 70, height: 70}
                })
                ws.getRow(count).height = 65
                ws.getRow(count).values = [list[i].id, list[i].title, list[i].subtitle, list[i].price, list[i].brand, list[i].country, list[i].created_at, list[i].active]

                vm.loading.content = "%"+parseInt(((100*(count-1))/list.length))
                count++
            }
            vm.loading.content = "درحال ساخت فایل..."
            wd.xlsx.writeBuffer().then(function (data) {
                const blob = new Blob([data],
                    {type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'});
                const url = window.URL.createObjectURL(blob);
                const anchor = document.createElement('a');
                anchor.href = url;
                anchor.download = 'download.xls';
                anchor.click();
                window.URL.revokeObjectURL(url);
                vm.loading.show = false
                vm.$parent.getData()
            }).catch(function () {
                vm.loading.show = false
                vm.$parent.getData()

            });

        },
        async getImg(src) {
            return new Promise(function (resolve, reject) {
                // Get the remote image as a Blob with the fetch API
                fetch(src)
                    .then((res) => res.blob())
                    .then((blob) => {
                        // Read the Blob as DataURL using the FileReader API
                        const reader = new FileReader();
                        reader.onloadend = () => {
                            resolve(reader.result)
                        };
                        reader.readAsDataURL(blob);
                    }).catch(function (reason) {
                    resolve("")
                });
            })

        }
    },

}
</script>

<style scoped>

</style>
