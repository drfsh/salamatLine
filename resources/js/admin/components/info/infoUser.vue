<template>
    <button class="save" style="float: left" @click="newShow=true">افزودن</button>
    <table class="hover">
        <thead>
        <tr>
            <th width="50" class="text-center">تصویر</th>
            <th class="text-center">نام</th>
            <th class="text-center">درباره</th>
            <th class="text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-center " v-for="(item,i) in list">
            <td><img :src="'/img/page/'+item.img" alt=""></td>
            <td>{{item.name}}</td>
            <td>{{item.info}}</td>
            <td>
                <ul class="modify">
                    <li class="edit"><a class="btn-edit-blue" style="margin-right: 2px" @click="editUser(item)" target="_blank"><i
                        class="fas fa-edit"></i></a></li>
                    <li class="delete">
                        <button class="btn-edit-danger" @click="deleteUser(item.id)" type="submit" value="Delete"><i
                            class="fas fa-trash"></i></button>
                    </li>
                </ul>
            </td>
        </tr>
        </tbody>
    </table>

    <new-user-info v-if="newShow" :item="item"></new-user-info>
</template>

<script>
import NewUserInfo from "./newUserInfo";
export default {
    name: "infoUser",
    components: {NewUserInfo},
    props:['list'],
    data(){
        return{
            newShow:false,
            item:{}
        }
    },
    methods:{
        editUser(item){
            this.item =item
            this.newShow = true
        },
        async deleteUser(id) {
            await window.axios.delete('/admin/api/info/deleteUser/' + id)
            location.reload()
        }
    }
}
</script>

<style scoped>

</style>
