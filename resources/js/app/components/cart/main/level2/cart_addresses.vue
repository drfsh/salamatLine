<template>
    <div class="col2-set" id="customer_details">
        <div class="col-1">
            <div class="woocommerce-billing-fields">
                <h3 style="font-size: 16px;font-weight: 400;color: #3b4359;">آدرس ها</h3>
                <loading v-if="addresses===null && $parent.auth"></loading>
                <div v-else-if="!$parent.auth" class="e-g-a">
                    <img src="/img/profile/order-empty.svg">
                    <span>لطفا برای اعتبارسنجی و دسترسی به آدرس ها  وارد حساب کاربری خود شوید!</span>
                </div>
                <div style="margin-top: 20px;" v-else>
                    <div class="item-address-cart" v-for="(v,i) in addresses" :key="'adddres'+i"
                         :class="{'active':address!==null && v.id===address.id}">
                        <div role="button"
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
                        </div>
                        <div @click="$parent.selectAddress(v)" role="button" class="selecting">
                            <i class="fas fa-check"></i>
                        </div>
                        <i class="edit" role="button" @click="$parent.selectAddress(v,true)">
                            <ic_edit2></ic_edit2>
                        </i>
                    </div>
                    <div role="button" @click="newAddress()" class="cart-new-address">
                        <span class="icon">
                            <ic_add></ic_add>
                        </span>
                        <span class="text">
                            آدرس جدید
                        </span>
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
import Ic_add from "../../../icon/ic_add";
import Ic_edit2 from "../../../icon/ic_edit2";

export default {
    name: "cart_addresses",
    components: {Ic_edit2, Ic_add, Loading, Ic_location, Ic_user1, Ic_mobile2},
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
    },
    methods: {
        newAddress() {
            this.$parent.address_id = 0
            this.$parent.status = ''
            this.$parent.isContinue = true
        }
    }
}
</script>

<style scoped>

</style>
