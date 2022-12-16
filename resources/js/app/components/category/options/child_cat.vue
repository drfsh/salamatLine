<template>
    <div class="cat side-bar box3">
        <div class="section">
            <div class="title">دسته‌بندی‌های
                {{$parent.name}}</div>
            <div class="body">
                <ul class="first-level accordion-menu" v-if="$parent.child!=null">

                    <li v-for="v in $parent.child">
                        <a :href="'/category/'+v.slug">
                            <ic_circle></ic_circle>
                            <span>{{v.name}}</span>
                        </a>
                    </li>
                </ul>
                <loading v-else></loading>
            </div>
        </div>
    </div>

</template>

<script>
import Loading from "../../loading/loading";
import Ic_p_circle from "../../icon/ic_p_circle";
import Ic_circle from "../../icon/ic_circle";
export default {
    name: "child_cat",
    components: {Ic_circle, Ic_p_circle, Loading}
}
</script>

<style scoped>

</style>