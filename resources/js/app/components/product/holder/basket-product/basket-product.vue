<template>
    <div>
        <div role="button" @click="adToCard()" class="basket">
            <ic_basket class="b" v-if="!loading"></ic_basket>
            <ic_refresh v-else class="fa-spin"></ic_refresh>
        </div>
    </div>
    <alert-aded v-if="status.text!==''" :status="status" :img="img" :name="name" :model="model"></alert-aded>
</template>

<script>
import Ic_basket from "../../../icon/ic_basket";
import AlertAded from "./alert-aded";
import Ic_refresh from "../../../icon/ic_refresh";
export default {
    name: "basket-product",
    props:['id','name','model','img'],
    components: {Ic_refresh,  AlertAded, Ic_basket},
    data(){
        return{
            status: {error:false,text:''},
            loading:false
        }
    },
    methods:{
        async adToCard() {
            this.loading = true
            let m = {mf: null, mp: null,quantity:1};
            let {data} = await window.axios.post('/cart/add/' + this.id, m)
            this.status.text = data.status;
            if (data.status==null){
                this.status.text = 'محصول با موفقیت به سبد خرید شما افزوده شد';
            }
            if (data.error=='please login'){
                this.status.text = 'برای افزودن به سبد خرید لطفا عضو شوید';
            }
            if (data['situation']=='success'){
                this.getData()
            }
            this.loading = false
        },
        async getData() {
            let {data} = await window.axios('/cart/detail')
            $('#header-num-cart').text(data.qty)
        }
    }
}
</script>

<style scoped>

</style>