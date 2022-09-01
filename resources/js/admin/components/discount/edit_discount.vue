<template>
    <div class="box shadow rounded hover space">
        <div class="heading">تخفیف جدید</div>
        <div class="content"><!---->
            <form>
                <div class="grid-x grid-padding-x">
                    <div class="cell medium-3">
                        <label>نام تخفیف
                            <input v-model="title" type="text">
                        </label>
                    </div>
                    <div class="cell medium-3">
                        <label>محصول مورد نظر
                            <select_product :id="data.product_id" v-model="product_id"></select_product>
                        </label>
                    </div> <!----> <!---->
                    <div v-if="multifeatureData.length!==0" class="cell medium-3">
                        <label>
                            ویژگی
                            <select v-model="feature_id">
                                <option v-for="(v,i) in multifeatureData" :value="v.id">{{v.title}}</option>
                            </select>
                        </label>
                    </div>

                    <div v-if="multipriceData.length!==0" class="cell medium-3"><label>
                        قیمت
                        <select v-model="price_id">
                            <option v-for="(v,i) in multipriceData" :value="v.id">{{ v.title }} - <small>{{ v.price }}
                                تومان</small></option>
                        </select>
                    </label>
                    </div>

                    <div class="cell medium-3">
                        <label>مقدار تخفیف (ریال)
                            <input type="number" v-model="price">
                        </label>
                    </div>
                    <div class="cell medium-3">
                        <label>تعداد
                            <input type="number" v-model="max_uses">
                        </label>
                    </div>


                    <div class="cell medium-3">
                        <label>شروع
                        </label>
                        <vue-date v-model="start_date"></vue-date>
                    </div>

                    <div class="cell medium-3">
                        <label>پایان
                        </label>
                        <vue-date v-model="end_date"></vue-date>
                    </div>

                    <div class="cell medium-6">
                        <label>توضیحات
                            <textarea rows="2" v-model="content"></textarea>
                        </label>
                    </div>
                    <div class="small-3 cell"><label>فعال
                        <input type="checkbox" v-model="active"></label></div>
                </div>
                <div class="double-gap"></div>
                <a class="button success" @click="addDiscount">
                    <span v-if="!loading">ذخیره</span>
                    <loading class="small" v-else></loading>
                </a>
                <div class="cell callout success" v-if="success!==''">{{ success }}</div>
            </form>
        </div>
    </div>
</template>

<script>
import Select_product from "./select_product";
import Loading from "../../../app/components/loading/loading";
import vueDate from "vue3-persian-datetime-picker";

export default {
    name: "edit_discount",
    components: {Loading, Select_product, vueDate},
    props: ['discount'],
    data() {
        return {
            active: false,
            content: null,
            feature_id: null,
            max_uses: null,
            price: null,
            price_id: null,
            product_id: null,
            title: null,
            loading: false,
            success: '',
            start_date: null,
            end_date: null,
            data: {},

            multipriceData: [],
            multifeatureData: [],
        }
    },
    methods: {
        async getPrice() {
            let {data} = await window.axios.get('/admin/allapi/product-detail/' + this.product_id)
            this.multipriceData = data.prices;
            this.multifeatureData = data.features;
        },
        async addDiscount() {
            if (this.title == null || this.title.trim() == '') {
                alert('نام را وارد کنید')
                return
            }
            this.loading = true
            let m = {
                active: this.active,
                content: this.content,
                feature_id: this.feature_id,
                max_uses: this.max_uses,
                price: this.price,
                price_id: this.price_id,
                product_id: this.product_id,
                title: this.title,
                end_date: this.end_date,
                start_date: this.start_date,
            }
            let {data} = await window.axios.put('/admin/discount/' + this.data.id, m)

            this.success = data.success
            this.loading = false

            setTimeout(function () {
                location.href = '/admin/discount'
            }, 2000)
        }
    },
    mounted() {
        let data = this.data = JSON.parse(this.discount);
        if (data.active == 1)
            this.active = true
        else this.active = false
        this.content = data.content
        this.feature_id = data.feature_id
        this.max_uses = data.max_uses
        this.price = data.price
        this.price_id = data.price_id
        this.title = data.title
        this.end_date = data.end_date
        this.start_date = data.start_date
    }
    ,
    watch: {
        product_id() {
            this.getPrice()
        },
        price_id(v) {
        }
    }
}
</script>

<style scoped>

</style>