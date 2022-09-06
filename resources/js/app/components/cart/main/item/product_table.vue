<template>
    <tr class="woocommerce-cart-form__cart-item cart_item">

        <td class="product-remove">
            <a href="https://tarheiran.ir/sepidtest/cart/?remove_item=148d411aeffed8a6f6ad4ecd77d1f904&amp;_wpnonce=b77690bd76"
               class="remove" aria-label="حذف این آیتم" data-product_id="4291"
               data-product_sku="">×</a></td>

        <td class="product-thumbnail">
            <a :href="'./products'+v.attributes.slug">
                <img width="300" height="300" :src="v.attributes.img"
                     class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
            </a>
        </td>

        <td class="product-name" data-title="محصول">
            <a :href="'./products'+v.attributes.slug" target="_blank">{{ v.name }}</a>
        </td>

        <td class="product-price" data-title="قیمت">
            <span class="woocommerce-Price-amount amount">
                <bdi>{{ $parent.$parent.separate(v.price) }}<span class="woocommerce-Price-currencySymbol">تومان</span></bdi>
                <bdi class="old" v-if="v.attributes.discount_price!==0">{{ $parent.$parent.separate(v.attributes.original_price) }}<span class="woocommerce-Price-currencySymbol">تومان</span></bdi>
            </span>
        </td>

        <td class="product-quantity" data-title="تعداد">
            <div class="quantity">
                <input type="number" id="quantity_6315e2c19aea2" class="input-text qty text"
                       step="1" min="0" max="11" :value="v.quantity"
                       title="تعداد" size="4" placeholder="">
            </div>
        </td>

        <td class="product-price" data-title="مجموع">
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
    props: ['v']
}
</script>

<style scoped>

</style>
