<template>
    <div id="menu-category" @mouseenter="show=true" @mouseleave="show=false">

        <div role="button" class="menu-category">
            <span><ic_menu></ic_menu></span>
            <span>دسته بندی محصولات</span>
            <span><ic_chevron></ic_chevron></span>
        </div>
        <div id="menu-item-category" v-if="show">
            <div v-if="categories!==null" class="w-100 h-100">
                <div class="main-cats">
                    <div class="main-cat" v-for="(v,i) in categories">
                        <a @mouseenter="select[0]=i" :href="'/category/'+v.slug">
                            <div :class="{'active':select[0]===i}">
                                {{ v.name }}
                            </div>
                        </a>
                    </div>
                </div>
                <div class="child--item" style="height: 80%;">
                    <div class="items h-100">
                        <ul>
                            <li @mouseenter="select[1]=i" v-for="(v,i) in categories[select[0]].child">
                                <a :class="{'active':select[1]===i}" :href="'/category/'+v.slug">{{ v.name }}</a>
                            </li>
                        </ul>
                        <ul v-if="select[1]!==null && categories[select[0]].child[select[1]].child.length>0">
                            <li @mouseenter="select[2]=i" v-for="(v,i) in categories[select[0]].child[select[1]].child">
                                <a :class="{'active':select[2]===i}" :href="'/category/'+v.slug">{{ v.name }}</a>
                            </li>
                        </ul>
                        <ul v-if="select[2]!==null && categories[select[0]].child[select[1]].child[select[2]].child.length>0">
                            <li @mouseenter="select[3]=i"
                                v-for="(v,i) in categories[select[0]].child[select[1]].child[select[2]].child">
                                <a :class="{'active':select[3]===i}" :href="'/category/'+v.slug">{{ v.name }}</a>
                            </li>
                        </ul>
                        <ul v-if="select[3]!==null && categories[select[0]].child[select[1]].child[select[2]].child[select[3]].child.length>0">
                            <li @mouseenter="select[4]=i"
                                v-for="(v,i) in categories[select[0]].child[select[1]].child[select[2]].child[select[3]].child">
                                <a :class="{'active':select[4]===i}" :href="'/category/'+v.slug">{{ v.name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="img">
                        <img :src="img"/>
                    </div>
                </div>
            </div>
            <loading class="w-100" v-else></loading>
        </div>
    </div>
</template>

<script>
import Ic_menu from "../icon/ic_menu";
import Ic_chevron from "../icon/ic_chevron";
import Loading from "../loading/loading";

export default {
    name: "categories",
    components: {Loading, Ic_chevron, Ic_menu},
    computed: {
        i0() {
            return this.select[0]
        },
        i1() {
            return this.select[1]
        },
        i2() {
            return this.select[2]
        },
        i3() {
            return this.select[3]
        },
        img() {
            let img
            if (this.select[4] !== null)
                img = this.categories[this.select[0]].child[this.select[1]].child[this.select[2]].child[this.select[3]].child[this.select[4]].img
            else if (this.select[3] !== null)
                img = this.categories[this.select[0]].child[this.select[1]].child[this.select[2]].child[this.select[3]].img
            else if (this.select[2] !== null)
                img = this.categories[this.select[0]].child[this.select[1]].child[this.select[2]].img
            else if (this.select[1] !== null)
                img = this.categories[this.select[0]].child[this.select[1]].img
            else if (this.select[1] !== null)
                img = this.categories[this.select[0]].child[this.select[1]].img
            else if (this.select[0] !== null)
                img = this.categories[this.select[0]].img

            return img
        }
    },
    data() {
        return {
            select: [0, null, null, null, null],
            categories: null,
            show: false,
        }
    },
    methods: {
        async getCat() {
            let {data} = await window.axios.get('/api/categories')
            this.categories = data
        }
    },
    mounted() {
        this.getCat()
    },
    watch: {
        i0() {
            this.select[1] = null
        },
        i1() {
            this.select[2] = null
        },
        i2() {
            this.select[3] = null
        },
        i3() {
            this.select[4] = null
        }
    }
}
</script>

<style scoped>

</style>