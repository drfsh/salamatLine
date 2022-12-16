<template>
    <div class="cat side-bar box3">
        <div class="title">قیمت <span>(تومان)</span></div>
        <div class="body">
            <div style="padding: 18px 16px 16px;">
                <Slider
                    class="input-slider"
                    v-model="value"
                    :merge="merge"
                    :format="format"
                    :min="0"
                    :max="50000000"
                    :tooltips="toolbar"
                    @change="change"
                />
                <div class="range-price-f">
                    <price_input currency="" :value="value[1]" @update="update1"></price_input>
                    <ic_exchange></ic_exchange>
                    <price_input currency="" :value="value[0]" @update="update0"></price_input>
                </div>

                <div @click="setchaneg" class="change-filter">
                    <ic_filter></ic_filter>
                    صافی
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Slider from '@vueform/slider'
import Ic_filter from "../../icon/ic_filter";
import Ic_exchange from "../../icon/ic_exchange";
import Price_input from "../../inputs/price_input";
export default {
    name: "filterPrice",
    props: ['f', 'order_by', 'active','p1','p2'],
    components:{Price_input, Ic_exchange, Ic_filter, Slider},
    data: () => ({
        value: [0,50000000],
        merge: 10,
        toolbar:false
    }),
    methods:{
        update1(e){
          this.value[1] = e
        },
        update0(e){
          this.value[0] = e
        },
        format(value) {
            return `تومان${this.separate(value)}`
        },
        setchaneg() {
            this.value = [this.value[0],this.value[1]]
            this.$parent.filter['price'] = this.value
            this.$parent.getProducts()
        },
        separate(Number) {

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
        change(){
            let vm = this
            vm.$parent.filter['price'] = vm.value
            setTimeout(function () {
                vm.toolbar = false
            },500)
        }

    },
    mounted() {
        let vm = this

        $(document).ready(function () {
            $(".input-slider").on({
                mouseenter: function () {
                    vm.toolbar = true
                },
                mouseleave: function () {
                    setTimeout(function () {
                        vm.toolbar = false
                    },700)
                }
            });

        })
    },
    watch:{
        value(w){
            console.log(w)
        }
    }

}
</script>
<style src="../../../../../../node_modules/@vueform/slider/themes/default.css"></style>

<style scoped>

</style>
