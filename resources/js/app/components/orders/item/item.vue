<template>
    <a class="order-item">
        <div class="status">
            <span class="text">
            <ic_ticke_circle></ic_ticke_circle>
                تحویل شده
            </span>
            <div class="go">
                <i class="fas fa-chevron-left"></i>
            </div>
        </div>
        <div class="val">
            <span class="date">12 خرداد 1401</span>

            <span class="t">کدسفارش</span>
            <span class="d">۲۷۳۰۵۱۱۱۶</span>

            <span class="t">مبلغ</span>
            <span class="d">۱۸,۷۹۰,۷۴۰</span>

        </div>
    </a>
</template>

<script>
import Ic_ticke_circle from "../../icon/ic_ticke_circle";

export default {
    name: "item",
    components: {Ic_ticke_circle}
}
</script>

<style scoped>

</style>
