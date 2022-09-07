<template>
    <div class="col2-set" id="customer_details">
        <div class="col-1">
            <div class="woocommerce-billing-fields">
                <h3 style="font-size: 16px;font-weight: 400;color: #3b4359;">جزئیات صورتحساب</h3>
                <div v-if="address_id===null || addresses.length>0" class="address-manager"
                     @click="$parent.address_id=null;$parent.address=null;">
                    انتخاب مجدد ادرس
                </div>
                <a v-else target="_blank" href="/profile/address">
                    <div class="address-manager">مدیریت آدرس</div>
                </a>

                <div class="woocommerce-billing-fields__field-wrapper">
                    <p class="form-row form-row-first validate-required"
                       id="billing_first_name_field" data-priority="10">
                        <label>نام&nbsp;
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text" v-model="address.name">
                        </span>
                    </p>
                    <p class="form-row form-row-last validate-required">
                        <label>نام خانوادگی&nbsp;
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " v-model="address.lname">
                        </span>
                    </p>
                    <p class="form-row form-row-wide">
                        <label>نام شرکت&nbsp;
                            <span class="optional">(اختیاری)</span>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " v-model="address.company">
                        </span>
                    </p>


                    <p class="form-row form-row-first validate-required">
                        <label class="">تلفن&nbsp;
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="number" class="input-text" v-model="address.mobile">
                        </span>
                    </p>
                    <p class="form-row form-row-last validate-required"
                       data-priority="20">
                        <label>ادرس ایمیل&nbsp;
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="email" class="input-text" v-model="address.email">
                        </span>
                    </p>

                    <p class="form-row form-row-first validate-required">
                        <label class="">استان
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <select_city v-model:id="address.province_id" key="'adsadasd565'"></select_city>
                        </span>
                    </p>
                    <p class="form-row form-row-last validate-required"
                       data-priority="20">
                        <label>شهر
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <select_city v-model:id="address.city_id" type="city" key="'adsadasd'" :p_id="address.province_id"></select_city>
                        </span>
                    </p>

                    <p class="form-row form-row-wide">
                        <label class="">ادرس
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " v-model="address.content">
                        </span>
                    </p>
                    <p class="form-row form-row-wide">
                        <label class="">کدپستی(بدون فاصله و با اعداد انگلیسی)
                            <abbr class="required" title="ضروری">*</abbr>
                        </label>
                        <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text" v-model="address.zipcode">
                        </span>
                    </p>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import Select_city from "../../../../inputs/select_city";
export default {
    name: "edit_address",
    components: {Select_city},
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