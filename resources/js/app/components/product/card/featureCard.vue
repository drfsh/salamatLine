<template>
    <ul v-if="(data.discount && data.discount.length>0)|| data.featured" class="badge">
        <li v-if="(data.discount && data.discount.length>0)" class="r">{{data.discount[0].percent}} تخفیف</li>
        <li class="s" v-if="data.featured">
            <div class="star">
                    <span class="icon">
                        <ic_star_speed></ic_star_speed>
                    </span>
                <span class="text">
                        برگزیده
                </span>
            </div>
        </li>
    </ul>
    <ul class="meta">
        <li v-if="data.feature.company_id">{{data.feature.company.title}}</li>
        <li v-if="data.brand_id"><span>برند:</span>{{data.brand.title}}</li>
        <li v-if="data.country_id"><span>ساخت:</span>{{data.country.title}}</li>
    </ul>
</template>

<script>
import Ic_star_speed from "../../icon/ic_star_speed";
export default {
    name: "featureCard",
    components: {Ic_star_speed},
    computed:{
        data(){
            return this.$parent.data
        }
    }
}
</script>

<style scoped>

</style>