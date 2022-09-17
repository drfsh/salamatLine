<template>

    <div v-if="text!==''" class="woocommerce-notices-wrapper">
        <ul class="woocommerce-error" role="alert" style="background: #ffa9a982;">
            <li>
                {{text}}
            </li>
        </ul>
    </div>

    <div class="box2 woocommerce" style="position:relative;padding-bottom: 20px;">
        <div class="title" v-if="$parent.page===1">ویرایش آدرس</div>
        <div class="title" v-else-if="$parent.page===2">ایجاد آدرس</div>
        <div role="button" @click="$parent.page=0" style="top: 19px;position: absolute;left: 22px;color: #aba9a7;font-size: 13px;">
            بازگشت
        </div>

        <div class="woocommerce-billing-fields__field-wrapper" style="padding: 0 32px;">
            <p class="form-row form-row-wide">
                <label>عنوان
                    <abbr class="required" title="ضروری">*</abbr>
                </label>
                <span class="woocommerce-input-wrapper">
                            <input type="text" class="input-text " v-model="address.title">
                </span>
            </p>

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
                            <select_city v-model:id="address.city_id" type="city" key="'adsadasd'"
                                         :p_id="address.province_id"></select_city>

                        </span>
            </p>

            <p class="form-row form-row-wide" style="float: right;width: 100%;">
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

            <address_map></address_map>

        </div>
        <div class="nextstep mt-17"
             style="display: flex;align-items: center;flex-direction: row-reverse;padding: 0 30px;">
            <a v-if="$parent.page===2" @click="senddata" class="checkout-button button alt wc-forward"><span>ایجاد آدرس</span></a>
            <a v-if="$parent.page===1" @click="senddata" style="margin-right: 11px;" class="checkout-button button alt wc-forward"><span>ثبت تغییرات</span></a>
            <a v-if="$parent.page===1" @click="remove" style="background: #e71e1e;width: 165px;"
               class="checkout-button button alt wc-forward"><span>حذف آدرس</span></a>
        </div>
    </div>


</template>

<script>
import Select_city from "../inputs/select_city";
import Address_map from "./address_map";

export default {
    name: "address-edit",
    components: {Address_map, Select_city},
    props: ['address'],
    data(){
        return{
            text:''
        }
    },
    methods: {
        async remove() {
            let {data} = await window.axios.get('/cart/address/delete/' + this.address.id)
            location.reload()
        },
        async senddata() {
            if (this.address.title == null) {
                this.alertM('عنوان را وارد کنید')
                return ''
            }
            if (this.address.mobile == null) {
                this.alertM('نام را وارد کنید')
                return ''
            }
            if (this.address.lname == null) {
                this.alertM('نام خانوادگی را وارد کنید')
                return ''
            }
            if (this.address.email == null) {
                this.alertM('ایمیل را وارد کنید')
                return ''
            }
            if (this.address.province_id == null) {
                this.alertM('استان را انتخاب کنید')
                return ''
            }
            if (this.address.city_id == null) {
                this.alertM('شهر را انتخاب کنید')
                return ''
            }
            if (this.address.content == null) {
                this.alertM('آدرس را وارد کنید')
                return ''
            }
            if (this.address.zipcode == null) {
                this.alertM('کدپستی را وارد کنید')
                return ''
            }
            if (this.address.lat == null) {
                this.alertM('ادرس را در نقشه مشخص کنید')
                return ''
            }

            if (this.$parent.page === 1)
                await window.axios.put('/cart/address/edit/' + this.address.id, this.address)
            else if (this.$parent.page === 2)
                await window.axios.post('/cart/address/new', this.address)
            location.reload()
        },
        alertM(text) {
            this.text = text
            $('html ,body').stop().animate({scrollTop: 0}, 500)
        }
    },

}
</script>

<style scoped>

</style>
