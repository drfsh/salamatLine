<template>
    <alert-aded v-if="type==='add_cart'" :status="data.status" :img="data.img" :name="data.name" :model="data.model"></alert-aded>
    <mini_show v-else-if="type==='mini_show'" :id="data.id"></mini_show>
</template>

<script>
import Mini_show from "../product/holder/buttons/mini_show";
import AlertAded from "../product/holder/basket-product/alert-aded";
export default {
    name: "alerts_cart",
    components: {AlertAded, Mini_show},
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
