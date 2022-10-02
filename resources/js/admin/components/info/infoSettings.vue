<template>
    <div class="box info" v-if="data!==null">
        <div class="title">تصاویر</div>
        <input style="display: none" type="file" accept="image/*" id="file1">
        <input style="display: none" type="file" accept="image/*" id="file2">
        <div style="padding: 10px;display: flex">
            <div class="img">
                <div>تصویر 1</div>
                <img role="button" id="img1" @click="openImg(1)" :src="'/img/page/'+data.img1">
            </div>
            <div class="img">
                <div>تصویر 2</div>
                <img role="button" id="img2" @click="openImg(2)" :src="'/img/page/'+data.img2">
            </div>
        </div>
        <button @click="saveImg" role="button" class="save">ذخیره</button>
    </div>
    <br>
    <div class="box info" v-if="data!==null">
        <div class="title">ایکن ها</div>
        <div class="flex-column box-info">
            <div class="item">
                    <span class="icon">
                        <input style="display: none" type="file" accept="image/*" id="b1">
                        <img role="button" id="imgb1" @click="openImgB(1)" :src="'/img/page/'+data.b1.img">
                    </span>
                <span>
                    <input type="text" v-model="data.b1.info">
                </span>
            </div>
            <div class="item">
                  <span class="icon">
                    <input style="display: none" type="file" accept="image/*" id="b2">
                    <img role="button" id="imgb2" @click="openImgB(2)" :src="'/img/page/'+data.b2.img">
                </span>
                <span>
                    <input type="text" v-model="data.b2.info">
                </span>
            </div>
            <div class="item">
              <span class="icon">
                        <input style="display: none" type="file" accept="image/*" id="b3">
                        <img role="button" id="imgb3" @click="openImgB(3)" :src="'/img/page/'+data.b3.img">
                    </span>
                <span>
                    <input type="text" v-model="data.b3.info">
                </span>
            </div>
            <div class="item">
                   <span class="icon">
                        <input style="display: none" type="file" accept="image/*" id="b4">
                        <img role="button" id="imgb4" @click="openImgB(4)" :src="'/img/page/'+data.b4.img">
                    </span>
                <span>
                        <input type="text" v-model="data.b4.info">
                    </span>
            </div>
            <div class="item">
                    <span class="icon">
                        <input style="display: none" type="file" accept="image/*" id="b5">
                        <img role="button" id="imgb5" @click="openImgB(5)" :src="'/img/page/'+data.b5.img">
                    </span>

                <span>
                        <input type="text" v-model="data.b5.info">
                    </span>
            </div>
        </div>
        <button @click="saveB()" class="save">ذخیره</button>
    </div>
    <br>
    <div class="box info" style="margin-bottom: 130px;" v-if="data!==null">
        <div class="title">تیم فروشگاه سلامت لاین</div>
        <info-user :list="data.users"></info-user>
    </div>

    <div class="f-loading" style="z-index: 10000;" v-if="loading">
        <loading></loading>
    </div>
</template>

<script>
import Loading from "../loading/loading";
import InfoUser from "./infoUser";

export default {
    name: "infoStrings",
    components: {InfoUser, Loading},
    data() {
        return {
            data: null,
            loading: false
        }
    },
    methods: {
        openImg(i) {
            let vm = this
            let inputProfile = $('#file' + i);
            inputProfile.click();
            inputProfile.change(function () {
                var file = $(this).val();
                if (file !== '') {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        let img = document.getElementById('img' + i)
                        img.src = e.target.result;
                    }
                    reader.readAsDataURL(document.getElementById('file' + i).files[0])
                }
            })
        },
        openImgB(i) {
            let vm = this
            let inputProfile = $('#b' + i);
            inputProfile.click();
            inputProfile.change(function () {
                var file = $(this).val();
                if (file !== '') {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        let img = document.getElementById('imgb' + i)
                        img.src = e.target.result;
                    }
                    reader.readAsDataURL(document.getElementById('b' + i).files[0])
                }
            })
        },
        async getData() {
            this.loading = true

            let {data} = await window.axios.get('/admin/api/info')
            this.data = data
            this.loading = false
        },
        async saveImg() {
            this.loading = true

            let formData = new FormData();
            let file = document.getElementById('file1').files[0];
            let file2 = document.getElementById('file2').files[0];
            formData.append('img1', file);
            formData.append('img2', file2);
            await window.axios.post('/admin/api/info/updateimg', formData)

            this.loading = false
        },
        async saveB() {
            this.loading = true

            let formData = new FormData();
            let b1 = document.getElementById('b1').files[0];
            let b2 = document.getElementById('b2').files[0];
            let b3 = document.getElementById('b3').files[0];
            let b4 = document.getElementById('b4').files[0];
            let b5 = document.getElementById('b5').files[0];
            formData.append('b1', b1);
            formData.append('b2', b2);
            formData.append('b3', b3);
            formData.append('b4', b4);
            formData.append('b5', b5);

            formData.append('infob1', this.data.b1.info);
            formData.append('infob2', this.data.b2.info);
            formData.append('infob3', this.data.b3.info);
            formData.append('infob4', this.data.b4.info);
            formData.append('infob5', this.data.b5.info);


            await window.axios.post('/admin/api/info/uodateicon', formData)

            this.loading = false
        }
    },
    mounted() {
        this.getData()
    }
}
</script>

<style scoped>

</style>
