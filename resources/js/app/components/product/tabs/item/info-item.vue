<template>
<div class="item">
    <div class="name">
<!--        <ic_shield></ic_shield>-->
        {{title}}
    </div>
    <div class="text">{{text}}</div>
</div>
</template>

<script>
import Ic_shield from "../../../icon/ic_shield";
export default {
    name: "info-item",
    components: {Ic_shield},
    props:['title','text']
}
</script>

<style scoped>

</style>