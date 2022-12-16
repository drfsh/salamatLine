<template>
    <div v-if="show" class="share-link-pop mini-show product-box">
        <div class="dismiss" @click="close"></div>
        <div v-if="data!=null" style="z-index: 2" class="card-share-link position-relative">
            <i class="fas fa-times" @click="close()"></i>
            <div class="sgare-sepid-box">
                <div class="product-page" style="display: flex;">
                    <div class="product-aspk">
                        <img :src="data.tiny">
                    </div>
                    <div style="width: 100%;">
                        <div class="name text-l">
                            <h1 class="t" style="font-size: 15px;">{{ data['title'] }}
                                <span style="font-size: 13px;color: #636363;"
                                      v-if="data['subtitle']!==null">({{ data['subtitle'] }})</span>
                            </h1>
                        </div>
                        <div style="display: flex;align-items: center;">
                            <div class="name-en" style="margin: 0 17px 0 0;">
                                <span role="button" class="zm"><ic_shield></ic_shield>تضمین اصالت کالا</span>
                                <span class="nm" v-if="data.title_en">{{ data.title_en }}</span>
                            </div>
                            <div class="last-update text-l">
                                <span> آخرین بروزرسانی : </span>
                                <span> {{ data['updated_at'] }} </span>
                            </div>
                        </div>
                        <div class="more-features" style="margin-top: 15px;text-align: right">
                            <ul>
                                <li class="title">برخی از ویژگی ها</li>
                                <li v-for="v in more_feature">{{v}}</li>
                            </ul>
                            <div class="info-orng" style="width: auto;display: inline-flex;">
                                <span>
                                    <ic_clock></ic_clock>
                                </span>
                                <span>حداکثر تا {{data.feature.day}} روز تحویل داده میشود</span>
                                <span>حداکثر تا 7 روز تحویل داده میشود</span>
                            </div>
                        </div>

                        <div  style="padding: 10px 15px;display: flex;flex-direction: row;align-items: center;justify-content: space-between">
                            <!--price and discount one price-->
                            <one_price style="text-align: right;display: block;" v-if="price!==null"></one_price>
                            <!--end-->
                            <!--multi price-->
                            <multi_price style="text-align: right;display: block;" v-if="data.multiprice.length!==0" :items="data.multiprice"></multi_price>
                            <!--end multi price-->

                            <!--multi fucher-->
                            <feature style="text-align: right;display: block;" v-if="data.multifeature.length!==0" :items="data.multifeature"></feature>

                            <a :href="'/products/'+data.slug" class="btn">
                                خرید و جزییات بیشتر
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <loading v-else></loading>
    </div>
</template>

<script>
import Loading from "../../../loading/loading";
import Ic_shield from "../../../icon/ic_shield";
import Ic_clock from "../../../icon/ic_clock";
import Feature from "../../price/feature";
import Multi_price from "../../price/multi_price";
import One_price from "../../price/one_price";

export default {
    name: "mini_show",
    components: {One_price, Multi_price, Feature, Ic_clock, Ic_shield, Loading},
    props: ['id'],
    computed:{
        more_feature(){
            if (this.data.feature.more!=null){
                return  this.data.feature.more.split('#')
            }else{
                return []
            }
        },
        isDiscount(){
            return this.data.discount.length>0
        },
        price() {
            if (this.data.price == null)
                return null

            if (!this.isDiscount)
                return this.separate(this.data.price)
            else
                return this.separate(this.data.price - this.data.discount[0]['price'])
        },

    },
    data() {
        return {
            data: null,
            show:true
        }
    },
    methods: {
        close(){
            this.show = false
          window.boxAlert.show = false
          window.boxAlert.type = ''
        },
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
            let {data} = await window.axios.get('/api/product/' + this.id)
            this.data = data
        }
    },
    mounted() {
        this.getData()
        // $('body').addClass('disableT')
    },
    unmounted() {
        // $('body').removeClass('disableT')
    }
}
</script>

<style scoped>

</style>
