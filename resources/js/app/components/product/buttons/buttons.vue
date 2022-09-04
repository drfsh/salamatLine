<template>
    <ul class="badge">
        <li v-if="featured==1" class="s">
            <div class="star">
                    <span class="icon">
                        <ic_star_speed></ic_star_speed>
                    </span>
                <span class="text">
                        برگزیده
                    </span>
            </div>
        </li>
        <li v-else-if="active==1 && discounted==0" class="s">
            <div class="star">
                    <span class="icon">
                        <ic_ticket_square></ic_ticket_square>
                    </span>
                <span class="text">
                        موجود
                    </span>
            </div>
        </li>
        <li v-else-if="discounted==0" class="s">
            <div class="star diactive">
                    <span class="icon">
                        <ic_close_square></ic_close_square>
                    </span>
                <span class="text">
                        موجود
                        نیست
                    </span>
            </div>
        </li>
        <li v-if="discounted==1" class="s">
            <div class="star percent">
                    <span class="icon">
                        <ic_ticket></ic_ticket>
                    </span>
                <span class="text">
                        {{ percent }}
                    </span>
            </div>
        </li>

        <li>
            <div class="bs">
                <div>
                    <span @click="addFavorite()" class="circle-hover" :class="{'text-red':favorited,'fa-spin':favoriteLoading}" >
                        <ic_status v-if="favoriteLoading"></ic_status>
                        <ic_heart v-else></ic_heart>
                        <div class="tooltip-meta-v-sepid">افزودن علاقه مندی</div>
                    </span>
                </div>
                <div>
                    <a :href="'/compare/'+slug" target="_blank">
                    <span class="circle-hover">
                        <ic_shuffle></ic_shuffle>
                        <div class="tooltip-meta-v-sepid">مقایسه</div>
                    </span>
                    </a>
                </div>
                <div>
                    <span @click="share=true" class="circle-hover">
                        <ic_network></ic_network>
                        <div class="tooltip-meta-v-sepid">اشتراک گذاری</div>
                    </span>
                </div>
            </div>
        </li>
        <li v-if="admin==1">
            <a :href="editroute" target="_blank">
                <div class="bs" style="padding:11px 9px;margin: 0;">
                    <div>
                    <span class="circle-hover">
                        <ic_edit2></ic_edit2>
                        <div class="tooltip-meta-v-sepid">ویرایش</div>
                    </span>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <share v-if="share"></share>
</template>

<script>
import Ic_star_speed from "../../icon/ic_star_speed";
import Ic_ticket_square from "../../icon/ic_ticket_square";
import Ic_close_square from "../../icon/ic_close_square";
import Ic_ticket from "../../icon/ic_ticket";
import Ic_heart from "../../icon/ic_heart";
import Ic_shuffle from "../../icon/ic_shuffle";
import Ic_network from "../../icon/ic_network";
import Ic_edit2 from "../../icon/ic_edit2";
import Ic_status from "../../icon/ic_status";
import Share from "../share/share";

export default {
    name: "buttons",
    components: {
        Share,
        Ic_status,
        Ic_edit2,
        Ic_network,
        Ic_shuffle,
        Ic_heart,
        Ic_ticket,
        Ic_close_square,
        Ic_ticket_square,
        Ic_star_speed
    },
    props: {
        featured: {default: false},
        active: {default: false},
        discounted: {default: false},
        percent: {default: 0},
        admin: {default: false},
        editroute: {default: ''},
        id: {default: false},
        slug: {default: ''},
        img: {default: ''},
        name: {default: ''},
        isfavorited: {default: '0'},
    },
    data() {
        return {
            favorited: this.isfavorited,
            favoriteLoading: false,
            share:false
        }
    },
    methods: {
        async addFavorite() {
            this.favoriteLoading = true
            let {data} = await window.axios.post('/profile/add-favorite/' + this.id)
            if (data.status == 'true') {
                if (data.add == 'true')
                    this.favorited = true
                else
                    this.favorited = false
            }
            this.favoriteLoading = false
        }
    },
    mounted() {
        console.log(this.featured)
        console.log(this.active)
    }
}
</script>

<style scoped>

</style>