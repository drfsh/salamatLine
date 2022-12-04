<template>
    <div class="text-center">
        <div class="gap"></div>
        <div class="grid-x grid-padding-x align-center-middle nm">
            <div class="cell medium-3"><input type="text" v-model="keywords" placeholder="جستجو..." class="nm"></div>
            <div class="cell medium-3">
                <select v-model="filter" class="nm">
                    <option value="">فیلتر</option>
                    <option value="withImage">با عکس</option>
                    <option value="withContent">با محتوا</option>
                    <option value="withKeyboard">با کلمات کلیدی</option>
                    <option value="withProduct">با محصول</option>
                    <option value="noImage">بدون عکس</option>
                    <option value="noContent">بدون محتوا</option>
                    <option value="noKeyboard">بدون کلمات کلیدی</option>
                    <option value="noProduct">بدون محصول</option>
                </select></div>
            <div class="cell medium-2">
                {{ total }}
            </div>
            <div class="cell">
                <div class="gap"></div>
                <paginate
                    :page-count="last_page"
                    :click-handler="changePaginate"
                    :prev-text="'<'"
                    :next-text="'>'"
                    :container-class="'pagi'"
                />
            </div>
        </div>
        <table_list :list="list"></table_list>
        <loading v-if="data==null"></loading>
    </div>
</template>

<script>
import Paginate from "vuejs-paginate-next";
import Loading from "../loading/loading";
import table_list from "./table";

export default {
    name: "brand",
    components: {
        Loading,
        Paginate,
        table_list
    },
    data() {
        return {
            page: 1,
            count: 15,
            data: null,
            list: [],
            last_page: null,
            keywords: '',
            filter: '',
            total: 0
        }
    },
    methods: {
        async getData() {
            this.beforeGet()
            let data;
            if (this.keywords.trim() == '' && this.filter.trim() == '') {
                data = await window.axios.get('/admin/brand/api?per_page=' + this.count + '&page=' + this.page)
            } else if (this.keywords.trim() != '' && this.filter.trim() == '') {
                data = await window.axios.get('/admin/brand/api?per_page=' + this.count + '&page=' + this.page + '&keywords=' + this.keywords)
            } else if (this.keywords.trim() == '' && this.filter.trim() != '') {
                data = await window.axios.get('/admin/brand/api?per_page=' + this.count + '&page=' + this.page + '&filter=' + this.filter)
            } else if (this.keywords.trim() != '' && this.filter.trim() != '') {
                data = await window.axios.get('/admin/brand/api?per_page=' + this.count + '&page=' + this.page + '&filter=' + this.filter + '&keywords=' + this.keywords)
            }
            let m = data.data
            this.setData(m)
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
        },
        changePaginate(page) {
            this.page = page
        }
    },
    created() {
        this.getData()
        document.oncontextmenu = function () {
            return false
        }
    },
    watch: {
        page() {
            this.getData()
        },
        filter(){
            this.page = 1
            this.getData()
        },
        keywords(){
            this.page = 1
            this.getData()
        }
    }
}
</script>

<style scoped>

</style>
