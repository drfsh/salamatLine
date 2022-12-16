<template>
    <div v-if="data1!==null">
        <div class="main--category">
            <item-cat v-for="(v,i) in data1" :value="v" :key="'main-cat'+i" :i="i" :role="1"></item-cat>
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
            </div>
            <full_loading v-else-if="checkMobile(2)"></full_loading>

            <div v-if="data3!==null && select2!==null && checkMobile(3)" class="main--category">
                <item-cat v-for="(v,i) in data3" :value="v" :key="'main-cat'+i" :i="i" :role="3"></item-cat>
            </div>
            <full_loading v-else-if="select2!==null && checkMobile(3)"></full_loading>

            <div v-if="data4!==null && select3!==null && checkMobile(4)" class="main--category">
                <item-cat v-for="(v,i) in data4" :value="v" :key="'main-cat'+i" :i="i" :role="4"></item-cat>
            </div>
            <full_loading v-else-if="select3!==null && checkMobile(4)"></full_loading>

            <div v-if="data5!==null && select4!==null && checkMobile(5)" class="main--category">
                <item-cat v-for="(v,i) in data5" :value="v" :key="'main-cat'+i" :i="i" :role="5"></item-cat>
            </div>
            <full_loading v-else-if="select4!==null"></full_loading>
        </div>
    </div>
    <div v-if="copy!==-1" class="copy-p">
        <span class="close" @click="copy===-1">لغو</span>
        در حال کپی.
    </div>
</template>

<script>
import Full_loading from "../../../app/components/loading/full_loading";
import ItemCat from "./item-cat";

export default {
    name: "categorys",
    components: {ItemCat, Full_loading},
    data() {
        return {
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
    },
    watch: {
        select1(v) {
            if (v !== null)
            {
                this.select2 = null
                this.select3 = null
                this.select4 = null
                this.getChild(this.data1[v].id, 2)
            }
        },
        select2(v) {
            if (v !== null)
            {
                this.select3 = null
                this.select4 = null
                this.getChild(this.data2[v].id, 3)
            }
        },
        select3(v) {
            if (v !== null)
            {
                this.select4 = null
                this.getChild(this.data3[v].id, 4)
            }
        },
        select4(v) {
            if (v !== null)
            {
                this.getChild(this.data4[v].id, 5)
            }
        }
    }
}
</script>

<style scoped>

</style>