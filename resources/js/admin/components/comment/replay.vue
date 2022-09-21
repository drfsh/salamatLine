<template>
    <div role="button" @click="show=true">
        <ic_comment></ic_comment>
    </div>

    <div v-if="show" class="comment-replay">
        <div class="disable" @click="show=false"></div>
        <div class="body">
            <div class="title">پاسخ</div>
            <textarea v-model="body" placeholder="متن پاسخ"></textarea>
            <button role="button" @click="set" class="ok">ثبت</button>
        </div>
    </div>
</template>

<script>
import Ic_comment from "../../../app/components/icon/ic_comment";

export default {
    name: "replay",
    components: {Ic_comment},
    props:['id','replay'],
    data(){
        return{
            show:false,
            body:''
        }
    },
    methods:{
        async set() {
            await window.axios.post('/admin/reviews/replay/' + this.id,{body:this.body})
            this.show=false
        }
    },
    mounted() {
        this.body = this.replay;
    }
}
</script>

<style scoped>

</style>