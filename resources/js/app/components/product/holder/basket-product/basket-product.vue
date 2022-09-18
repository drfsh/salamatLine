<template>
    <div>
        <div role="button" @click="adToCard()" class="basket">
            <ic_basket class="b" v-if="!loading"></ic_basket>
            <ic_refresh v-else class="fa-spin"></ic_refresh>
        </div>
    </div>
</template>

<script>
import Ic_basket from "../../../icon/ic_basket";
import Ic_refresh from "../../../icon/ic_refresh";
export default {
    name: "basket-product",
    props:['id','name','model','img','active'],
    components: {Ic_refresh, Ic_basket},
    data(){
        return{
            status: {error:false,text:''},
            loading:false
        }
    },
    methods:{
        async adToCard() {
            if (this.active=='0') return''
            this.loading = true
            let m = {mf: null, mp: null,quantity:1};
            let {data} = await window.axios.post('/cart/add/' + this.id, m)
            window.boxAlert.show = true
            window.boxAlert.type = 'add_cart'
            this.status.text = data.status;
            if (data.status==null){
                this.status.text = 'محصول با موفقیت به سبد خرید شما افزوده شد';
                this.status.error = false
            }
            if (data.error=='please login'){
                this.status.text = 'برای افزودن به سبد خرید لطفا عضو شوید';
                this.status.error = true
            }
            if (data['situation']=='success'){
                this.getData()
            }
            window.boxAlert.value.status = this.status
            window.boxAlert.value.img = this.img
            window.boxAlert.value.name = this.name
            window.boxAlert.value.model = this.model
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
