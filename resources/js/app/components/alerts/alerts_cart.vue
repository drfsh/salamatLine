<template>
    <alert-aded v-if="type==='add_cart'" :status="data.status" :img="data.img" :name="data.name" :model="data.model"></alert-aded>
    <mini_show v-else-if="type==='mini_show'" :id="data.id"></mini_show>
    <fixed_login v-else-if="type==='login'" ></fixed_login>
    <fixed_login v-else-if="type==='call_us'" ></fixed_login>
</template>

<script>
import Mini_show from "../product/holder/buttons/mini_show";
import AlertAded from "../product/holder/basket-product/alert-aded";
import Fixed_login from "../auth/fixed_login";
export default {
    name: "alerts_cart",
    components: {Fixed_login, AlertAded, Mini_show},
    data(){
      return{
          type:'',
          data:{}
      }
    },
    mounted() {
        let vm = this
        setInterval(function () {
            if (window.boxAlert.show)
            {
                vm.type = window.boxAlert.type;
                vm.data = window.boxAlert.value
            }else {
                vm.type = '';
                vm.data = {}
            }
        }, 500)
    }
}
</script>

<style scoped>

</style>
