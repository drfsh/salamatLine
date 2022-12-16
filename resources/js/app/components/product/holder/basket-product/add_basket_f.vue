<template>
    <span class="add-shop">اضافه شدن به سبد خرید</span>
</template>

<script>

export default {
    name: "add_basket_f",
    props: ['id', 'name', 'model', 'img', 'active'],
    data() {
        return {
            status: {error: false, text: ''},
            loading: false
        }
    },
    methods: {
        contactMe() {
            window.boxAlert.type = 'call_us'
            this.status.text = 'برای اطلاع از قیمت تماس بگیرید'
            window.boxAlert.value.status = this.status

        },
        async adToCard() {
            if (this.active == '0') {
                this.contactMe()
                return ''
            }
            this.loading = true
            let m = {mf: null, mp: null, quantity: 1};
            let {data} = await window.axios.post('/cart/add/' + this.id, m)
            window.boxAlert.show = true
            window.boxAlert.type = 'add_cart'
            this.status.text = data.status;
            if (data.status == null) {
                this.status.text = 'محصول با موفقیت به سبد خرید شما افزوده شد';
                this.status.error = false
            }
            if (data.error == 'please login') {
                this.status.text = 'برای افزودن به سبد خرید ابتدا وارد حساب کاربری خود شوید';
                this.status.error = true
            }
            if (data['situation'] == 'success') {
                this.getData()
            }
            window.boxAlert.value.status = this.status
            window.boxAlert.value.img = this.img
            window.boxAlert.value.name = this.name
            window.boxAlert.value.model = this.model
            this.loading = false
        },
        async getData() {
            let {data} = await window.axios('/cart/detail')
            $('#header-num-cart').text(data.qty)
        }
    }
}
</script>

<style scoped>

</style>
