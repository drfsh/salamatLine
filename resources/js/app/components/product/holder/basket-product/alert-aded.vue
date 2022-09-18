<template>
    <div v-if="show" class="share-link-pop">
        <div class="dismiss" @click="close"></div>
        <div style="z-index: 2;min-width: 452px;" class=" card-share-link position-relative bg-w">
            <i v-if="status.error" style="width: 27px;height: 27px;background: red;" class="fas fa-times" @click="close"></i>
            <i  class="fas fa-times" v-else @click="close"></i>
            <div style="text-align: center;margin-top: 14px;">
                {{status.text}}
            </div>
            <div v-if="!status.error" class="sgare-sepid-box" style="border: 2px dashed rgb(228, 228, 228);margin-top: 23px;">
                <div style="margin: 0;display: flex;align-items: center;position: relative;">
                    <div class="product-aspk" style="
    width: 109px;
    height: auto;
    border: none;
    border-radius: 0;
    box-shadow: none;margin: 0;">
                        <img :src="img">
                    </div>
                    <div style="display: flex;flex-direction: column;align-items: flex-start;">
                        <span class="n">{{ name }} </span>
                        <span style="    text-align: right;font-size: 11px;width: 100%;margin-right: 9px;margin-top: 8px;">مدل : {{ model }}</span>

                    </div>
                </div>
            </div>
            <div v-if="!status.error" style="display: flex;padding: 14px 11px 0;justify-content: space-between;">
                <div role="button" style="color: #0a4773;border-bottom: 1px dashed;padding-bottom: 8px;" @click="close">ادامه خرید</div>
                <a style="background: #40c340;color: white;border-radius: 10px;padding: 3px 8px;" href="/cart">مشاهده سبد خرید </a>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "alert-aded",
    props:['status','name','model','img'],
    data() {
        return {
            isCopy: false,
            show:true
        }
    },
    computed: {
        link() {
            return location.host + '/products/' + this.$parent.id
        }
    },
    methods: {
        close(){
            this.show = false
            window.boxAlert.show = false
            window.boxAlert.type = ''
        },
    },

}
</script>

<style scoped>

</style>
