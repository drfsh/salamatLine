<template>
    <div class="box shadow filter">
        <div class="grid-x align-middle">
            <div class="cell medium-3"><input type="text" v-model="keywords" placeholder="جستجو..."></div>
            <div class="cell medium-3 large-2">
                <select v-model="price">
                <option value="">قیمت</option>
                <option value="single">تک قیمتی</option>
                <option value="multi">چند قیمتی</option>
                <option value="empty">بدون قیمت</option>
            </select>
            </div>
            <div class="cell medium-3 large-1">
                <select v-model="brand">
                <option value="">برند</option>
                <option value="null">بدون برند</option>
                <option v-for="(v,i) in brands" :value="v.id">{{v.title}}</option>
            </select>
            </div>
            <div class="cell medium-3 large-1">
                <select v-model="company">
                <option value="">شرکت</option>
                <option value="null">بدون شرکت</option>
                <option v-for="(v,i) in companys" :value="v.id">{{v.title}}</option>
            </select>
            </div>
            <div class="cell medium-3 large-1">
                <select v-model="country">
                <option value="">کشور</option>
                <option value="null">بدون کشور</option>
                <option v-for="(v,i) in countrys" :value="v.id">{{v.title}}</option>
            </select>
            </div>
            <div class="cell medium-2 large-1">
                <select v-model="size">
                <option value="">سایز</option>
                <option value="small">کوچک</option>
                <option value="medium">متوسط</option>
                <option value="big">بزرگ</option>
                <option value="empty">تعریف نشده</option>
            </select>
            </div>
            <div class="cell medium-2 large-1">
                <select v-model="seo">
                <option value="">SEO</option>
                <option value="withkeyboard">دارای کلمه کلیدی</option>
                <option value="withdesc">دارای MetaDesc</option>
                <option value="nokeyword">بدون کلمه کلیدی</option>
                <option value="nodesc">بدون MetaDesc</option>
            </select>
            </div>
            <div class="cell medium-3 large-1">
                <select v-model="filter">
                <option value="">فیلتر</option>
                <option value="nopic">بدون عکس</option>
                <option value="nosubtitle">بدون زیرتیر</option>
                <option value="nocontent">بدون توضیحات</option>
                <option value="withcontent">با توضیحات</option>
                <option value="featured">برگزیده</option>
                <option value="multifeature">چند حالتی</option>
                <option value="discount">دارای تخفیف</option>
                <option value="multipic">دارای چند عکس</option>
                <option value="active">فعال</option>
                <option value="inactive">غیر فعال</option>
            </select>
            </div>
            <div class="cell medium-2 large-1">
                <select class="nl" v-model="count">
                <option value="15" selected>تعداد در هر صفحه</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            </div>
        </div>
        <div class="pa1">
            <div class="grid-x grid-padding-x align-middle"  style="justify-content: space-between;" >
                <paginate
                    :page-count="last_page"
                    :click-handler="changePaginate"
                    :prev-text="'<'"
                    :next-text="'>'"
                    :container-class="'pagi'"
                />
                <div class="cell medium-4 text-left">{{total}} محصول (نمایش {{from}} تا {{to}})</div>
            </div>
        </div>
    </div>
    <export></export>
    <product_table :items="list"></product_table>
    <loading v-if="data==null"></loading>
</template>

<script>
import product_table from './table'
import Paginate from "vuejs-paginate-next";
import Loading from "../../../app/components/loading/loading";
import Export from "./export/export";

export default {
    name: "product",
    components: {Export, Loading, product_table,Paginate},
    props:['id'],
    data() {
        return {
            data: null,
            list: [],
            last_page: null,
            total: 0,
            url: '/admin/api/product',
            from:0,
            to:0,

            count: 15,
            page: 1,

            keywords: '',
            price: '',
            brand: '',
            country: '',
            company: '',
            filter: '',
            size: '',
            seo: '',

            brands:[],
            countrys:[],
            companys:[],
        }
    },
    methods: {
        async getData() {
            this.beforeGet()

            let form = {
                keywords: this.keywords,
                price: this.price,
                brand: this.brand,
                country: this.country,
                company: this.company,
                filter: this.filter,
                size: this.size,
                seo: this.seo,
                per_page: this.count,
                page: this.page,
            }
            let m = ''
            for (const formKey in form) {
                if (form[formKey] !== '')
                    m += formKey + '=' + form[formKey] + '&'
            }

            let data = await window.axios.get(this.url + "?" + m)
            data = data.data
            this.setData(data)
        },
        beforeGet() {
            this.data = null
            this.list = null
        },
        setData(data) {
            this.data = data;
            this.list = data.data;
            this.total = data.total;
            this.last_page = data.last_page
            this.from = data.from
            this.to = data.to
        },
        changePaginate(page){
            this.page = page
            this.getData()
        },
        async getBrand() {
            let {data} = await window.axios.get('/admin/api/brand');
            this.brands = data;
        },
        async getCountry() {
            let {data} = await window.axios.get('/admin/api/country');
            this.countrys = data;
        },
        async getCompany() {
            let {data} = await window.axios.get('/admin/api/company');
            this.companys = data;
        }
    },
    created() {
        this.getData()
        this.getBrand()
        this.getCompany()
        this.getCountry()
    },
    watch:{
        keywords(){this.getData()},
        price(){this.getData()},
        brand(){this.getData()},
        country(){this.getData()},
        company(){this.getData()},
        filter(){this.getData()},
        size(){this.getData()},
        seo(){this.getData()},
        page(){this.getData()},
        count(){this.getData()},
    }
}
</script>

<style scoped>

</style>