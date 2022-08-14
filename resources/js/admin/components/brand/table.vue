<template>
    <table class="hover">
        <thead>
        <tr>
            <th width="50" class="text-center">شناسه</th>
            <th class="text-center">تصویر</th>
            <th class="text-center">نام</th>
            <th class="text-center">تعداد محصول</th>
            <th class="text-center">عملیات</th>
            <th class="text-center">محصولات</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-center" v-for="(item,i) in list">
            <td>{{ item.id }}</td>
            <td><a :href="'../brands/'+item.slug" target="_blank"><img :src="item.tiny" alt=""
                                                                 width="50"></a></td>
            <td><a :href="'../brands/'+item.slug" target="_blank">{{item.title}}</a></td>
            <td>{{item.product_count}}</td>
            <td>
                <ul class="modify">
                    <li class="edit"><a :href="'../brands/'+item.slug" target="_blank"><i class="fas fa-eye"></i></a></li>
                    <li class="edit"><a :href="'./brand/'+item.id+'/edit'" target="_blank"><i class="fas fa-edit"></i></a></li>
                    <li class="delete">
                        <button @click="delete_(item.id,i)" type="submit" value="Delete"><i class="fas fa-trash"></i></button>
                    </li>
                </ul>
            </td>
            <td>
                <div class="pp">
                    <div class="disable-all-product">غیرفعال کردن محصولات</div>
                    <div class="enable-all-product">فعال کردن محصولات</div>
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
    props:['list'],
    methods:{
        async delete_(id,i) {
            let vm = this
            $.confirm({
                title:'حذف برند',
                content:'امیدوارم بدونی داری چی‌کار می‌کنی! اطلاعات این برند به صورت برگشت‌ناپذیر پاک میشه.مطمئنی؟',
                buttons:{
                    ok:{
                        text:'حذف',
                        btnClass:'btn-blue',
                        action: async function () {
                             vm.list.splice(i, 1)
                            let {data} = await window.axios.delete('./brand/' + id)
                        }
                    },
                    cancel:{
                        text:'لغو',
                        btnClass:'btn-danger'
                    }
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
