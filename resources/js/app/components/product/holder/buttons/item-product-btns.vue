<template>
    <div class="buttons">
        <span @click="showMiniCart()" class="circle-hover">
            <ic_search></ic_search>
        </span>
        <a :href="'/compare/'+slug" target="_blank">
            <span class="circle-hover">
                <ic_shuffle></ic_shuffle>
            </span>
        </a>
        <span class="circle-hover" @click="addFavorite" :class="{'text-red':favorited,'fa-spin l':favoriteLoading}">
        <ic_status v-if="favoriteLoading"></ic_status>
        <ic_heart v-else></ic_heart>
    </span>
    </div>
</template>

<script>
import Ic_basket from "../../../icon/ic_basket";
import Ic_refresh from "../../../icon/ic_refresh";
import Ic_search from "../../../icon/ic_search";
import Ic_shuffle from "../../../icon/ic_shuffle";
import Ic_heart from "../../../icon/ic_heart";
import Ic_status from "../../../icon/ic_status";

export default {
    name: "item-product-btns",
    props: ['id', 'slug'],
    components: { Ic_status, Ic_heart, Ic_shuffle, Ic_search, Ic_refresh, Ic_basket},
    data() {
        return {
            status: {error: false, text: ''},
            loading: false,
            favoriteLoading: false,
            favorited: false,
            show:false,
        }
    },
    methods: {
        showMiniCart(){
          window.boxAlert.show = true
          window.boxAlert.type = 'mini_show'
          window.boxAlert.value = {
              id:this.id
          }
        },
        async addFavorite() {

            let d = $('#heart-num-cart')
            let num = d.text()

            this.favoriteLoading = true
            let {data} = await window.axios.post('/profile/add-favorite/' + this.id)
            if (data.status == 'true') {
                if (data.add == 'true')
                {
                    this.favorited = true
                    num++
                    d.text(num)
                }
                else
                {
                    this.favorited = false
                    num--
                    d.text(num)
                }
            }
            this.favoriteLoading = false
        }
    }
}

</script>

<style scoped>

</style>
