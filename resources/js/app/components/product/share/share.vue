<template>
    <div class="share-link-pop">
        <div class="dismiss" @click="$parent.share=false"></div>
        <div style="z-index: 2" class="card-share-link position-relative">
            <i class="fas fa-times" @click="$parent.share=false"></i>
            <div class="sgare-sepid-box">
                <div class="t">
                    <div class="product-aspk">
                        <img :src="$parent.img">
                    </div>
                    <span class="s">اشتراک گذاری : </span>
                    <span class="n">{{ $parent.name }}</span>
                </div>
                <div class="co">
                    <div class="so">
                        <span class="telegram"><ic_telegram></ic_telegram></span>
                        <span class="whatsapp"><ic_whatsapp></ic_whatsapp></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="copy">
                        <div class="link">{{ link }}</div>
                        <div @click="copy" class="btn-copy">
                            <ic_copy></ic_copy>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import tools from "../../../utils/tools";
import Ic_copy from "../../icon/ic_copy";
import Ic_telegram from "../../icon/ic_telegram";
import Ic_whatsapp from "../../icon/ic_whatsapp";

export default {
    name: "share",
    components: {Ic_whatsapp, Ic_telegram, Ic_copy},
    data() {
        return {
            isCopy: false
        }
    },
    computed: {
        link() {
            return location.host + '/products/' + this.$parent.id
        }
    },
    methods: {
        copy() {
            tools.copyText(this.link, this)
            this.isCopy = true;
        }
    }
}
</script>

<style scoped>

</style>