<template>
    <div class="bbox" style="overflow:hidden;">
        <table v-if="list!==null && list.length>0" class="table1">
            <thead>
            <tr>
                <th></th>
                <th>شناسه</th>
                <th>عنوان</th>
                <th>آخرین بروز رسانی</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(v,i) in list">
                <th class="flex-center justify-content-center">
                    <i class="icon-email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="vuesax_linear_sms" data-name="vuesax/linear/sms" transform="translate(-556 -250)">
                                <g id="sms">
                                    <path id="Vector" d="M15,17H5c-3,0-5-1.5-5-5V5C0,1.5,2,0,5,0H15c3,0,5,1.5,5,5v7C20,15.5,18,17,15,17Z" transform="translate(558 253.5)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                    <path id="Vector-2" data-name="Vector" d="M10,0,6.87,2.5a3.166,3.166,0,0,1-3.75,0L0,0" transform="translate(563 259)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                    <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(556 250)" fill="none" opacity="0"/>
                                </g>
                            </g>
                        </svg>
                    </i>
                </th>
                <th>{{v.code}}</th>
                <th>{{v.title}}</th>
                <th>{{v.updated_at}}</th>
                <th>{{status(v.status)}}</th>
            </tr>
            </tbody>
        </table>
        <div v-if="list!==null && list.length==0" class="noting-orders">
            <img src="/img/profile/order-empty.svg">
            <span>تیکتی وجود ندارد</span>
        </div>
        <Loading class="min-h-500" v-if="list==null"></Loading>
    </div>
</template>

<script>
import Loading from "../loading/loading";
export default {
    name: "tickets",
    components: {Loading},
    data(){
        return{
            list:null
        }
    },
    methods:{
        async getData() {
            let {data} = await window.axios.get('/tickets/get');
            this.list = data
        },
        status(s){
            if (s==1)
                return 'در انتظار پاسخ'
            else if (s==2){
                return 'درحال برسی'
            }else if (s==3)
                return 'پاسخ داده شده'
            else
                return 'بسته شده'
        }
    },
    created() {
        this.getData();
    }
}
</script>

<style scoped>

</style>
