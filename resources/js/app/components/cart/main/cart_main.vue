<template>
    <div class="size" >
        <route :level="step"></route>
        <cart_level1 key="123" v-if="step===1"></cart_level1>
        <cart_level2 key="1234" v-else-if="step===2"></cart_level2>
        <cart_level3 key="123456" v-else-if="step===3"></cart_level3>
        <cart_level4 v-else-if="step===4"></cart_level4>
    </div>
</template>

<script>
import Route from "../route/route";
import Cart_level1 from "./cart_level1";
import Cart_level2 from "./cart_level2";
import Cart_level3 from "./cart_level3";
import Cart_level4 from "./cart_level4";
export default {
    name: "cart_main",
    components: {Cart_level4, Cart_level3, Cart_level2, Cart_level1, Route},
    data(){
      return{
          products:[],
          address_id:0,
          delivery:'',
          typeSend:'',
      }
    },
    computed:{
        step(){
            return this.$parent.step
        },
        detail(){
            return this.$parent.detail
        }
    },
    methods:{
        separate(Number) {
            Number /= 10
            Number += '';
            Number = Number.replace(',', '');
            let x = Number.split('.');
            let y = x[0];
            let z = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(y))
                y = y.replace(rgx, '$1' + ',' + '$2');
            return y + z;
        },
        async getData() {
            let {data} = await window.axios.get('/cart/items')
            if (data.length == 0) {
                this.step = 0
            } else
            {
                this.step = 1
                this.products = data
            }
        }
    },
    mounted() {
        this.getData()
        let vm = this
        setInterval(function (){
            if (window.cart_back==true)
            {
                vm.step = 1
                window.cart_back=false
                vm.$parent.getData()
                vm.getData()
            }

            if (window.cart_empty==true)
            {
                window.cart_empty = false
                vm.$parent.getData()
                vm.step = 0
            }
        });

    }
}
</script>

<style scoped>

</style>
