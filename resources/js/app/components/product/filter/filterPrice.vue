<template>
    <div style="padding: 18px 16px 16px;">
        <Slider
            class="input-slider"
            v-model="value"
            :merge="merge"
            :format="format"
            :min="1"
            :max="10000"
            :tooltips="toolbar"
            @change="change"
        />
        <div class="range-price-f">
            از
            <span class="price">{{separate(value[0])}}</span>
            تا
            <span class="price">{{separate(value[1])}}</span>
            تومان
        </div>

        <div class="change-filter">
            <ic_filter></ic_filter>
            صافی
        </div>
    </div>
</template>

<script>
import Slider from '@vueform/slider'
import Ic_filter from "../../icon/ic_filter";
export default {
    name: "filterPrice",
    components:{Ic_filter, Slider},
    data: () => ({
        value: [1, 10000],
        merge: 10,
        format: function (value) {
            return `تومان${value*1000}`
        },
        toolbar:false
    }),
    methods:{
        separate(Number) {
            Number*=1000
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
    }

}
</script>
<style src="@vueform/slider/themes/default.css"></style>

<style scoped>

</style>