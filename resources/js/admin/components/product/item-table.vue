<template>
    <tr>
        <td class="text-center">{{ item.id }}</td>
        <td><img :src="item.tiny" width="50"></td>
        <td><input v-model="item.title" type="text" class="tb"></td>
        <td><input v-model="item.subtitle" type="text" class="tb"></td>
        <td class="text-center">
            <span>
                <vue-numeric currency="ریال" separator="," v-model="item.price" class="tb"></vue-numeric>
            </span>
        </td>
        <td class="text-center"><small v-html="brand"></small></td>
        <td class="text-center"><small v-html="country"></small></td>
        <td class="sl"><small>{{ item.created_at }}</small></td>
        <td class="text-center" role="button" @click="changeStatus()" v-html="status"></td>
        <td class="text-center">
            <a role="button" @click="setChange()" class="button">
                <small>
                    <i class="fas fa-check"></i>
                </small>
            </a>
        </td>
        <td class="text-center m-5">
            <ul class="modify ">
                <li class="edit"><a class="btn-edit-blue m-0" :href="'./report/'+item.slug" target="_blank" title="آمار فروش"><i
                    class="far fa-file-alt"></i></a></li>
                <li style="margin-right: 2px;" class="edit"><a class="btn-edit-blue m-0" :href="'../products/'+item.slug" target="_blank"><i class="fas fa-eye"></i></a>
                </li>
                <li class="edit"><a class="btn-edit-blue m-0" :href="'./product/'+item.id+'/edit'" target="_blank"><i class="fas fa-edit"></i></a>
                </li>
                <li v-if="$parent.$parent.id==4 || $parent.$parent.id==1192" style="margin-right: 2px;margin-top: 2px;" class="delete">
                    <button @click="delete_()" class="btn-edit-danger m-0" type="submit" value="Delete"><i
                        class="fas fa-trash"></i></button>
                </li>
            </ul>
        </td>
    </tr>
</template>

<script>

import VueNumeric from '@handcrafted-market/vue3-numeric'

export default {
    name: "item-table",
    components:{VueNumeric},
    computed: {
        brand() {
            if (this.item.brand == null)
                return '<span class="label alert">تعریف نشده</span>'
            else
                return '<span><a href="../brands/' + this.item.brand.slug + '" target="_blank">' + this.item.brand.title + '</a></span>'
        },
        country() {
            if (this.item.country == null)
                return '<span class="label alert">تعریف نشده</span>'
            else
                return '<span><a href="../brands/' + this.item.country.slug + '" target="_blank">' + this.item.country.title + '</a></span>'
        },
        status() {

            if (this.item.price_hide==1){
                if (this.item.active == 0) {
                    return '<span class="label alert">غیرفعال</span> <span class="label alert">قیمت پنهان</span>'
                } else
                    return '<span class="label success">فعال</span> <span class="label alert">قیمت پنهان</span>'

            }else{
                if (this.item.active == 0) {
                    return '<span class="label alert">غیرفعال</span>'
                } else
                    return '<span class="label success">فعال</span>'
            }
        }
    },
    props: ['item', 'i'],
    methods: {
        changeStatus(){
            let textStatus,status,classStatus
            let price,textPrice,classPrice
            let vm = this
            if (this.item.active==0){
                textStatus = 'فعال سازی'
                status = 1
                classStatus = 'btn-green'
            }else {
                textStatus = 'غیر فعال سازی'
                status = 0
                classStatus = 'btn-red'
            }
            if (this.item.price_hide==0){
                textPrice = 'مخفی کردن قیمت'
                price = 1
                classPrice = 'btn-red'
            }else {
                textPrice = 'فعال کردن قیمت'
                price = 0
                classPrice = 'btn-green'
            }
            $.confirm({
                title:'تغییر وضعیت',
                content:"وضعیت را انتخاب کنید",
                closeIcon: true,
                backgroundDismiss: true,
                buttons:{
                    status:{
                        text:textStatus,
                        btnClass:classStatus,
                        action:async function () {
                            await window.axios.post('/admin/product/active/' + vm.item.id,{active:status,price:vm.item.price_hide})
                            vm.item.active = status
                        }
                    },
                    price:{
                        text:textPrice,
                        btnClass:classPrice,
                        action:async function () {
                            await window.axios.post('/admin/product/active/' + vm.item.id,{active:vm.item.active,price:price})
                            vm.item.price_hide = price
                        }
                    },
                }
            })
        },
        async setChange() {

            let {data} = await window.axios.post('/admin/product/inline-update/' + this.item.id,{price:this.item.price,subtitle:this.item.subtitle,title:this.item.title})
            $.alert('با موفقیت ویرایش شد')
        },
        async delete_() {
            let vm = this
            $.confirm({
                title:'حذف محصول',
                content:'امیدوارم بدونی داری چی‌کار می‌کنی! اطلاعات این محصول به صورت برگشت‌ناپذیر پاک میشه.مطمئنی؟',
                buttons:{
                    ok:{
                        text:'حذف',
                        btnClass:'btn-blue',
                        action: async function () {
                            vm.$parent.items.splice(vm.i, 1)
                            let {data} = await window.axios.delete('./product/' + vm.item.id)
                            $.alert('با موفقیت حذف شد')
                        }
                    },
                    cancel:{
                        text:'لغو',
                        btnClass:'btn-danger'
                    }
                }
            })
        },
    }
}
</script>

<style scoped>

</style>
