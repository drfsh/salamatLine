<template>
    <table id="table-product" class="hover">
        <thead>
        <tr>
            <th width="50" class="text-center">#</th>
            <th width="50">تصویر</th>
            <th width="400">نام</th>
            <th width="300">ادامه نام</th>
            <th width="300" class="text-center">قیمت</th>
            <th width="50" class="text-center">برند</th>
            <th width="50" class="text-center">کشور</th>
            <th width="200" class="text-center">تاریخ ایجاد</th>
            <th width="50" class="text-center">وضعبت</th>
            <th width="50" class="text-center"></th>
            <th width="100" class="text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
            <item-table v-for="(item,i) in items" :key="i+'table'" :item="item" :i="i"></item-table>
        </tbody>
    </table>
</template>

<script>
import ItemTable from "./item-table";
export default {
    name: "table",
    components: {ItemTable},
    props:['items']
}
</script>

<style scoped>

</style>