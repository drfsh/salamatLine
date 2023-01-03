<template>
    <i class="fas fa-list page--" :class="{active:page===0}" @click="page=0"></i>
    <i class="fas fa-trash page--" :class="{active:page===1}" @click="page=1"><span v-if="trash.length>0" style="position: absolute;top: -2px;right: -7px;background: red;color: white;border-radius: 10px;font-size: 11px;width: 15px;height: 15px;padding-top: 1px;text-align: center;">{{trash.length}}</span></i>
    <div v-if="page===0">
        <div v-if="data1!==null">
            <div class="main--category">
                <item-cat v-for="(v,i) in data1" :value="v" :key="'main-cat'+i" :i="i" :role="1"></item-cat>
                <div class="item">
                    <a target="_blank" :href="'/admin/category/create?parent_id='+0">
                        <div class="item--bg" style="border: 1px solid;height: 72px;display: flex;align-items: center;justify-content: center;">
                            <i class="fas fa-plus" style="font-size: 20px"></i>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <full_loading v-else></full_loading>
        <div class="childern" v-if="select1!==null">
            <div class="title">
            <span role="button" @click="select3=null;select4=null;select2=null">
                {{ data1[select1].name }}
            </span>
                <span role="button" @click="select3=null;select4=null" v-if="select2!==null">> {{data2[select2].name}}</span>
                <span role="button" @click="select4=null" v-if="select3!==null">> {{data3[select3].name}}</span>
                <span v-if="select4!==null">> {{data4[select4].name}}</span>
            </div>
            <div class="child--cat">
                <div v-if="data2!==null && checkMobile(2)" class="main--category">
                    <item-cat v-for="(v,i) in data2" :value="v" :key="'main-cat'+i" :i="i" :role="2"></item-cat>
                    <div class="item-child">
                        <a target="_blank" :href="'/admin/category/create?parent_id='+data1[select1].show_id">
                            <div class="item--bg" style="border: 1px solid;height: 45px;display: flex;align-items: center;justify-content: center;">
                                <i class="fas fa-plus" style="font-size: 20px"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <full_loading v-else-if="checkMobile(2)"></full_loading>

                <div v-if="data3!==null && select2!==null && checkMobile(3)" class="main--category">
                    <item-cat v-for="(v,i) in data3" :value="v" :key="'main-cat'+i" :i="i" :role="3"></item-cat>
                    <div class="item-child">
                        <a target="_blank" :href="'/admin/category/create?parent_id='+data2[select2].show_id">
                            <div class="item--bg" style="border: 1px solid;height: 45px;display: flex;align-items: center;justify-content: center;">
                                <i class="fas fa-plus" style="font-size: 20px"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <full_loading v-else-if="select2!==null && checkMobile(3)"></full_loading>

                <div v-if="data4!==null && select3!==null && checkMobile(4)" class="main--category">
                    <item-cat v-for="(v,i) in data4" :value="v" :key="'main-cat'+i" :i="i" :role="4"></item-cat>
                    <div class="item-child">
                        <a target="_blank" :href="'/admin/category/create?parent_id='+data3[select3].show_id">
                            <div class="item--bg" style="border: 1px solid;height: 45px;display: flex;align-items: center;justify-content: center;">
                                <i class="fas fa-plus" style="font-size: 20px"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <full_loading v-else-if="select3!==null && checkMobile(4)"></full_loading>

                <div v-if="data5!==null && select4!==null && checkMobile(5)" class="main--category">
                    <item-cat v-for="(v,i) in data5" :value="v" :key="'main-cat'+i" :i="i" :role="5"></item-cat>
                    <div class="item-child">
                        <a target="_blank" :href="'/admin/category/create?parent_id='+data4[select4].show_id">
                            <div  class="item--bg" style="border: 1px solid;height: 45px;display: flex;align-items: center;justify-content: center;">
                                <i class="fas fa-plus" style="font-size: 20px"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <full_loading v-else-if="select4!==null"></full_loading>
            </div>
        </div>
        <div v-if="copy!==-1" class="copy-p">
            <span class="close" @click="copy=-1">لغو</span>
            در حال کپی.
        </div>
    </div>
    <div v-else>
        <div>سطل زباله</div>
        <div>
            <div class="main--category">
                <item-trash v-for="(v,i) in trash" :key="i+'dsd4'" :i="i" :value="v" ></item-trash>
            </div>
        </div>
    </div>
</template>

<script>
import Full_loading from "../../../app/components/loading/full_loading";
import ItemCat from "./item-cat";
import ItemTrash from "./item-trash.vue";

export default {
    name: "categorys",
    components: {ItemTrash, ItemCat, Full_loading},
    data() {
        return {
            page:0,
            select1: null,
            select2: null,
            select3: null,
            select4: null,

            data1: null,
            data2: null,
            data3: null,
            data4: null,
            data5: null,

            copy:-1,

            trash:[]
        }
    },
    methods: {
        async getMainCat() {
            let {data} = await window.axios.get('/admin/category/api/get')
            this.data1 = data
        },
        async getChild(id, p) {
            this.$data['data' + p] = null
            let {data} = await window.axios.get('/admin/category/api/get?parent_id=' + id)
            this.$data['data' + p] = data
            console.log(this.data2)
        },
        async getTrash() {
            let {data} = await window.axios.get('/admin/category/api/trash')
            this.trash = data
        },
        moveArr(arr, old_index, new_index) {
            if (new_index >= arr) {
                let k = new_index - arr.length + 1;
                while (k--) {
                    arr.push(undefined)
                }
            }
            arr.splice(new_index, 0, arr.splice(old_index, 1)[0])
            return arr
        },
        checkMobile(i){
            let select = this.$data['select'+(i)]
            if (select!=undefined && select!=null){
                if (window.innerWidth<900) {
                    console.log(i, false)
                    return false
                }
                console.log(select,false,'select'+(i))
            }
            console.log(select,true,'select'+(i))
            return true
        },
    },
    mounted() {
        this.getMainCat()
        document.oncontextmenu = function () {
            return false
        }
        this.getTrash();
    },
    watch: {
        select1(v) {
            if (v !== null)
            {
                this.select2 = null
                this.select3 = null
                this.select4 = null
                this.getChild(this.data1[v].show_id, 2)
            }
        },
        select2(v) {
            if (v !== null)
            {
                this.select3 = null
                this.select4 = null
                this.getChild(this.data2[v].show_id, 3)
            }
        },
        select3(v) {
            if (v !== null)
            {
                this.select4 = null
                this.getChild(this.data3[v].show_id, 4)
            }
        },
        select4(v) {
            if (v !== null)
            {
                this.getChild(this.data4[v].show_id, 5)
            }
        }
    }
}
</script>

<style scoped>

</style>