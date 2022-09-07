<template>
    <div class="col2-set" id="customer_details">
        <div class="col-1">
            <div class="woocommerce-billing-fields">
                <h3 style="font-size: 16px;font-weight: 400;color: #3b4359;">ادرس ها</h3>
                <a target="_blank" href="/profile/address">
                    <div class="address-manager">مدیریت آدرس</div>
                </a>
                <loading v-if="addresses===null"></loading>
                <div v-else>
                    <div role="button" v-for="(v,i) in addresses" :key="'adddres'+i"
                         @click="$parent.selectAddress(v)"
                         class="woocommerce-info address">
                        {{ v.title }}
                        <span style="margin-right:9px;font-size: 11px;" v-if="v.province_id!==null">
                            {{ v.province.title }}
                        </span>
                        <span style="font-size: 11px;"
                              v-if="v.city_id!==null"> , {{ v.city.title }} </span>
                        <span style="font-size: 11px;"
                              v-if="v.district_id!==null"> , {{ v.district.title }} </span>
                        <div class="content">
                            <span class="item">
                                <span class="icon"><ic_location></ic_location></span>
                                <span>{{ v.content }}</span>
                            </span>
                            <span class="item">
                                <span class="icon"><ic_user1></ic_user1></span>
                                <span>{{ v.name }}</span>
                            </span>
                            <span class="item">
                                <span class="icon"><ic_mobile2></ic_mobile2></span>
                                <span>{{ v.mobile }}</span>
                            </span>
                        </div>
                        <div class="selecting" :class="{'active':address!==null && v.id===address.id}"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Ic_mobile2 from "../../../icon/ic_mobile2";
import Ic_user1 from "../../../icon/ic_user1";
import Ic_location from "../../../icon/ic_location";
import Loading from "../../../loading/loading";

export default {
    name: "cart_addresses",
    components: {Loading, Ic_location, Ic_user1, Ic_mobile2},
    computed: {
        address_id() {
            return this.$parent.address_id
        },
        addresses() {
            return this.$parent.addresses
        },
        address() {
            return this.$parent.address
        }
    }
}
</script>

<style scoped>

</style>