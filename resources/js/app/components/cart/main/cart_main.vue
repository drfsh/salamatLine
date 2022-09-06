<template>
    <div class="size" >
        <route :level="level"></route>
        <cart_level1 v-if="level===1"></cart_level1>
    </div>
</template>

<script>
import Route from "../route/route";
import Cart_level1 from "./cart_level1";
export default {
    name: "cart_main",
    components: {Cart_level1, Route},
    data(){
      return{
          allPrice:0,
          products:[]
      }
    },
    computed:{
        level(){
            return this.$parent.level
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
                this.level = 0
            } else
            {
                this.level = 1
                this.products = data
            }
        }
    },
    mounted() {
        this.getData()
        this.allPrice = this.detail.total
    }
}
</script>

<style scoped>

</style>
