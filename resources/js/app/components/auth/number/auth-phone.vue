<template>
    <div class="alert" v-if="alert!==null">{{ alert }}</div>
    <div class="">
        <div class="input-phone">
            <div>
                <input v-model="mobile" type="number" id="number">
            </div>
            <div class="select-code">
                <img v-if="country.length!==0" :src="country[countryV].image">
                <span v-if="country.length!==0">({{ '+98' }})</span>
                <i v-if="country.length!==0" class="fas fa-chevron-down"></i>
                <div v-if="false" class="list-country">
                    <ul>
                        <li v-for="(v,i) in country">
                            <div>
                                <img :src="v.image"  :alt="v.title">
                                <span >({{ v.content }})</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div v-if="showName" class="input-login rtl">
            <div class="hw100">
                <input v-model="name" type="text" placeholder="نام" required>
            </div>
            <div class="icon">
                <ic_user1></ic_user1>
            </div>
        </div>
        <div>
            <button @click="setRequest" class="btn-login">
                <loading v-if="loading" class="small"></loading>
                <span v-else>ورود</span>
            </button>
        </div>
    </div>

</template>

<script>
import Ic_user1 from "../../icon/ic_user1";
import Loading from "../../loading/loading";
export default {
    name: "auth-phone",
    components: {Loading, Ic_user1,},
    data() {
        return {
            mobile: '09',
            countryV:0,
            name: '',
            showName: false,
            loading: false,
            alert: null,
            EnterCode:false,
            country:[],
        }
    },
    methods: {
        async setRequest() {
            if (this.loading===true) return''

            let input = document.getElementById('number')
            this.loading = true
            input.disabled = 'disabled'
            let m = {lname: '', mobile: "0"+this.mobile, name: this.name,type:this.$parent.userType}
            let {data} = await window.axios.post('/request-login/1', m)

            if (data['EnterPhone'] === true) {
                this.alert = data['alert']
                if (data['show_name'] == true) {
                    this.showName = true
                }
            }else if (data['EnterPhone']===false){
                this.$parent.mobile = this.mobile
               this.$parent.page = 3
            }
            this.loading = false
            input.disabled = ''
        },
        async getCountry() {
            let {data} = await window.axios.get('/api/country')
            this.country = data;
        }
    },
    mounted() {
        this.getCountry()
        this.mobile =this.$parent.mobile
    }
}
</script>

<style scoped>

</style>
