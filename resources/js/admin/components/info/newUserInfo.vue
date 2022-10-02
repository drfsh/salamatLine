<template>
    <div class="comment-replay">
        <div class="disable" @click="$parent.newShow=false"></div>
        <div class="body">
            <div class="title">جدید</div>
            <input type="file" id="newUserFile" accept="image/*">
            <input type="text" placeholder="نام" v-model="name">
            <input type="text" placeholder="درباره" v-model="info">
            <button role="button" @click="set" class="ok">ثبت</button>
        </div>
    </div>
</template>

<script>
import Ic_user1 from "../../../app/components/icon/ic_user1";

export default {
    name: "new-user-info",
    components: {Ic_user1},
    props: {
        item: {
            default: {name: '', info: '', id: 0},
        }
    },
    data() {
        return {
            show: false,
            name: '',
            info: '',
            id: '',
        }
    },
    methods: {
        async set() {
            let formData = new FormData();
            let file = document.getElementById('newUserFile').files[0];
            formData.append('img', file);
            formData.append('name', this.name);
            formData.append('info', this.info);
            formData.append('id', this.id);
            if (this.id == undefined)
                await window.axios.post('/admin/api/info/newUser', formData)
            else
                await window.axios.post('/admin/api/info/editUser', formData)
            location.reload()
        }
    },
    mounted() {
        this.name = this.item.name
        this.info = this.item.info
        this.id = this.item.id
    }
}
</script>

<style scoped>

</style>
