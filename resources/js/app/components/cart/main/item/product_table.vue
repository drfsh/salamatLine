<template>
    <tr class="woocommerce-cart-form__cart-item cart_item">

        <td class="product-remove">
            <a @click="itemDelete"
               class="remove"
               data-product_sku="">×</a></td>

        <td class="product-thumbnail">
            <a :href="'./products/'+v.attributes.slug">
                <img width="300" height="300" :src="v.attributes.img"
                     class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
            </a>
        </td>

        <td class="product-name">
            <a :href="'./products/'+v.attributes.slug" target="_blank">{{ v.name }}
            <span v-if="v.attributes.feature!==null">({{v.attributes.feature}})</span>
            </a>
        </td>

        <td class="product-price">
            <span class="woocommerce-Price-amount amount">
                <bdi>{{ $parent.$parent.separate(v.price) }}<span class="woocommerce-Price-currencySymbol">تومان</span></bdi>
                <bdi class="old" v-if="v.attributes.discount_price!==0">{{ $parent.$parent.separate(v.attributes.original_price) }}<span class="woocommerce-Price-currencySymbol">تومان</span></bdi>
            </span>
        </td>

        <td class="product-quantity">
            <div class="quantity">
                <input type="number" id="quantity_6315e2c19aea2" class="input-text qty text"
                       step="1" min="0" max="11" v-model="count"
                       title="تعداد" size="4" placeholder="">
            </div>
        </td>

        <td class="product-price">
            <span class="woocommerce-Price-amount amount">
                <bdi>{{ $parent.$parent.separate(v.price * v.quantity) }}
                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                </bdi>
                <bdi class="old" v-if="v.attributes.discount_price!==0">{{ $parent.$parent.separate(v.attributes.original_price  * v.quantity) }}<span class="woocommerce-Price-currencySymbol">تومان</span></bdi>
            </span>
        </td>
    </tr>
</template>

<script>
export default {
    name: "product_table",
    props: ['v'],
    data(){
        return{
            count:this.v.quantity
        }
    },
    methods:{
      async itemDelete() {
          delete this.$parent.products[this.v.id]
          let {data} = await window.axios.get('/cart/remove-cart-item/' + this.v.id);
          this.$parent.$parent.$parent.getData();
          this.$parent.situation = ''
          window.cart_back2 = true
      }
    },
    watch:{
        count(v){
            this.$parent.refresh = true
            this.$parent.refreshStatus = ''
            this.$parent.changeCount[this.v.id] = v
        }
    }
}
</script>

<style scoped>

</style>
