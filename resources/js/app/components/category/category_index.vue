<template>
    <div class="cell medium-3">
        <child_cat v-if="child==null || child.length>0"></child_cat>
        <check-box></check-box>
        <filter-price></filter-price>
        <div class="cat side-bar box3" style="overflow: hidden;">
            <img src="#" style="
    width: 100%;
    height: 90px;
    border-radius: 10px;
    border: none;
    background: #74d1ed;">
        </div>
        <div class="cat side-bar box3">
            <div class="title">مشاور تلفنی رایگان</div>
            <div class="body product-box" style="display: block;padding: 0 23px;text-align: center;">
                <img width="100%" src="/img/page/contact.man.jpg" alt="contact">
                <div class="contact text-l">
                    <a :href="whatsApp">
                        <div class="whatsapp text-l">
                            <span class="d-flex"><ic_whatsapp></ic_whatsapp></span>
                            <span class="text-l">اگر نیاز به راهنمایی دارید با ما در ارتباط باشید</span>
                        </div>
                    </a>
                    <a href="https://t.me/telegram">
                        <div class="telegram text-l">
                            <span class="d-flex"><ic_telegram></ic_telegram></span>
                            <span class="text-l">اگر سوال داربد؟ در تلگرام با ما گفتگو کنید</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
    <div class="cell medium-9">
        <cat_filter></cat_filter>
        <loading v-if="data===null"></loading>
        <div class="grid-x" v-else>
            <div class="cell small-6 medium-4 large-4" v-for="v in data.data">
                <product-item :data="v"></product-item>
            </div>
        </div>
        <div v-if="lastPage>1" class="cell" style="text-align: center">
            <paginate
                v-model="filter.page"
                :page-count="lastPage"
                :click-handler="changePaginate"
                :prev-text="'صفحه قبل'"
                :next-text="'صفحه بعد'"
                :container-class="'pagi'">
            </paginate>
        </div>
    </div>
</template>

<script>
import CheckBox from "./options/check-box";
import FilterPrice from "./options/filterPrice";
import Ic_whatsapp from "../icon/ic_whatsapp";
import Ic_telegram from "../icon/ic_telegram";
import cat_filter from "../categoty/filter";
import Loading from "../loading/loading";
import Child_cat from "./options/child_cat";
import ProductItem from "../product/card/productItem";
import Paginate from "vuejs-paginate-next";

export default {
    name: "category_index",
    components: {ProductItem, Child_cat, Loading, Ic_telegram, Ic_whatsapp, FilterPrice, CheckBox, cat_filter,Paginate},
    data() {
        return {
            page: 1,
            lastPage: 1,
            data: null,
            child: null,
            filter: {onlyActive: false, price: [-1, -1], sort: 'new',page:1}
        }
    },
    computed: {
        whatsApp() {
            return `whatsapp://send?phone=+98${window.whatsApp}&text=`
        },
        telegram() {
            return window.telegram
        },
        id() {
            return window.cat_id
        },
        name() {
            return window.cat_name
        }
    },
    methods: {
        async changePaginate(page) {
            $([document.documentElement, document.body]).animate({
                scrollTop: 0
            }, 500)
            let vm =this
            setTimeout(function (){
                vm.getProducts()
            },300)

        },
        async getProducts() {
            this.data = null
            let {data} = await window.axios.post('/api/category/' + this.id,this.filter)
            this.data = data;
            this.lastPage = data.last_page
        },
        async getChild() {
            let {data} = await window.axios.post('/api/categoryChild/' + this.id)
            this.child = data;
        }
    },
    mounted() {
        this.getProducts()
        this.getChild()
    }
}
</script>

<style scoped>

</style>