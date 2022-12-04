<template>
    <table class="hover">
        <thead>
        <tr>
            <th width="50" class="text-center">شناسه</th>
            <th class="text-center">تصویر</th>
            <th class="text-center">نام</th>
            <th class="text-center">تعداد محصول</th>
            <th class="text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        <tr @contextmenu="menu($event,item,i)" class="text-center " :class="{'bg-ani':item.hide==1}" v-for="(item,i) in list">
            <td>{{ item.id }}</td>
            <td><a :href="'../brands/'+item.slug" target="_blank"><img :src="item.tiny" alt=""
                                                                       width="50"></a></td>
            <td><a :href="'../brands/'+item.slug" target="_blank">{{ item.title }}</a></td>
            <td>{{ item.product_count }}</td>
            <td role="button">
                <div class="pp">
                    <div  @click="menu($event,item,i)" class="btn-edit-blue"
                         title="غیرفعال کردن تمام محصولات">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import 'jquery-confirm/css/jquery-confirm.css'

export default {
    name: "table",
    props: ['list'],
    methods: {
        menu(e,item,i) {
            let vm = this
            let iconHide = ''
            if (item.hide)
                iconHide = 'fas fa-check'


            this.$contextmenu({
                x: e.x,
                y: e.y,
                items: [
                    {
                        label: 'مشاهده',
                        icon: 'fas fa-eye',
                        onClick: () => {
                            window.open('/brands/' + item.slug, '_blank').focus()
                        }
                    },
                    {
                        label: 'ویرایش',
                        icon: 'fas fa-edit',
                        onClick: () => {
                            window.open('/admin/brand/' + item.id + '/edit', '_blank').focus()
                        }
                    },
                    {
                        label: 'حذف',
                        icon: 'fas fa-trash',
                        onClick: () => {
                            $.confirm({
                                title: 'حذف',
                                backgroundDismiss: true,
                                closeButton: true,
                                content: 'از حذف این دسته بندی به صورت برگشت‌ناپذیر اطمینان دارید؟',
                                buttons: {
                                    ok: {
                                        text: 'حذف',
                                        btnClass: 'btn-red',
                                        action: async () => {
                                            vm.delete_(item.id,i)
                                        }
                                    },
                                    no: {
                                        text: 'لغو'
                                    },

                                }
                            })
                        }
                    },
                    {
                        label: 'پنهان بودن',
                        icon: iconHide,
                        onClick: async () => {
                            await window.axios.get('/admin/brand/hide/' + item.id)
                            item.hide = !item.hide
                        }
                    },
                    {
                        label: 'محصولات...',
                        icon: 'fas fa-ellipsis-v',
                        children: [
                            {
                                label: 'تغییر قیمت ',
                                icon: 'fas fa-daler',
                                onClick: () => {
                                    let text = "<div style='font-size:13px'>" +
                                        "تغییر قیمت را به درصد وارد کنید.برای کاهش درصد را منفی وارد کنید" +
                                        "</div>" +
                                        "<div class=\"cell medium-12\">\n" +
                                        "        <label>\n" +
                                        "            درصد\n" +
                                        "            <input placeholder='-مثال : 20' style='direction: ltr;' type=\"text\" id=\"change-price\">\n" +
                                        "        </label>\n" +
                                        "    </div>"
                                    $.confirm({
                                        title:'',
                                        content:text,
                                        buttons:{
                                            ok:{
                                                text:'اعمال',
                                                action:async () => {
                                                    let p = document.getElementById('change-price').value
                                                    let {data} = await window.axios.post('/admin/brand/changePrice',{id:item.id,p:p})
                                                    if (data['true']==true)
                                                        $.alert('با موفقیت اعمال شد!')
                                                    else
                                                        $.alert('خطا!')
                                                }
                                            },
                                            cancel:{
                                                text:'لغو'
                                            }
                                        }
                                    })
                                }
                            },
                            {
                                label: 'غیر فعال کردن',
                                icon: 'fas fa-circle',
                                onClick: () => {
                                    vm.disableProduct(item.id,item.title)
                                }
                            },
                            {
                                label: 'فعال کردن',
                                icon: 'fas fa-circle',
                                onClick: () => {
                                    vm.enableProduct(item.id,item.title)
                                }
                            },
                            {
                                label: 'پنهان کردن قیمت',
                                icon: 'fas fa-circle',
                                onClick: async () => {
                                    await window.axios.get('/admin/brand/hidePrice/'+item.id)
                                }
                            },
                            {
                                label: 'نمایش قیمت',
                                icon: 'fas fa-circle',
                                onClick: async () => {
                                    await window.axios.get('/admin/brand/showPrice/' + item.id)
                                }
                            },
                        ]
                    },
                ]
            })
        },
        async delete_(id, i) {
            let vm = this
            $.confirm({
                title: 'حذف برند',
                content: 'امیدوارم بدونی داری چی‌کار می‌کنی! اطلاعات این برند به صورت برگشت‌ناپذیر پاک میشه.مطمئنی؟',
                buttons: {
                    ok: {
                        text: 'حذف',
                        btnClass: 'btn-blue',
                        action: async function () {
                            vm.list.splice(i, 1)
                            let {data} = await window.axios.delete('./brand/' + id)
                        }
                    },
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-danger'
                    }
                }
            })
        },
        enableProduct(id, name) {
            $.confirm({
                title: 'فعال سازی',
                content: 'تمامی محصولات این برند فعال شوند؟',
                buttons: {
                    ok: {
                        text: 'فعال سازی',
                        btnClass: 'btn-blue',
                        action: async function () {
                            let {data} = await window.axios.put('./brand/change/product', {type: 1, id: id})
                            $.alert('تمام محصولات برند' + name + 'فعال شدند!')
                        }
                    },
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-danger'
                    }
                }
            })

        },
        disableProduct(id, name) {
            $.confirm({
                title: 'غیر فعال سازی',
                content: 'تمامی محصولات این برند غیر فعال شوند؟',
                buttons: {
                    ok: {
                        text: 'غیر فعال سازی',
                        btnClass: 'btn-blue',
                        action: async function () {
                            let {data} = await window.axios.put('./brand/change/product', {type: 0, id: id})
                            $.alert(' تمام محصولات برند ' + name + ' غیر فعال شدند! ')
                        }
                    },
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-danger'
                    }
                }
            })
        },
    }
}
</script>

<style scoped>

</style>
