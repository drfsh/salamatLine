<template>
    <div class="nice-select wide p-0" tabindex="0">
        <input autocomplete="off" id="search_city" style="margin: 0 !important;width: 100%;" v-model="text"
               @click="show=true"
               class="input-1 no-hover add-inputs"
               type="text" :placeholder="name">

        <ul class="list" v-if="show">
            <li v-for="(item ,i) in items" @click="select(item)" class="option text-right selected focus">
                {{ item.title }}
            </li>
            <li v-if="items.length===0" @click="show=false">
                صبر کنید...
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "select_product",
    props:{
        id:{
            default:null
        }
    },
    model: {
        prop: 'model',
        event: 'selected',
    },
    data() {
        return {
            itemsM: [],
            items: [],
            show:false,
            text:'',
            name:''
        }
    },
    methods: {
        async getData() {
            let {data} = await window.axios.get('/admin/allapi/products')
            this.itemsM = data;
            this.items = data;
            if (this.id!==null){
                for (const i in this.itemsM) {
                    if (this.itemsM[i].id===this.id){
                        this.select(this.itemsM[i])
                        break
                    }
                }
            }
        },
        select(i) {
            let items = $('.nice-select .list')
            items.hide();
            this.text = i.title
            this.model = i.id
            this.$parent.product_id = i.id
            let vm = this
            setTimeout(function () {
                vm.show = false
            },200)
        },
        search(){
            if (this.text.trim()==='')
                this.items = this.itemsM

            this.items = []
            for (const i in this.itemsM) {
                if (this.itemsM[i].title.indexOf(this.text.trim())!==-1){
                    this.items.push(this.itemsM[i])
                }
            }
        }
    },
    mounted() {

        let vm = this
        $(document).ready(function () {
            let typingTimer;
            const doneTypingInterval = 100;
            const $input = $('#search_city');
            $input.on('keyup', function () {
                clearTimeout(typingTimer)
                typingTimer = setTimeout(doneTyping, doneTypingInterval)
            })

            $input.on('keydown', function () {
                clearTimeout(typingTimer)
            })

            function doneTyping() {
                vm.search()
            }

            $('body').click(function (e) {
                let $this = $(e.target)
                let items = $('.nice-select .list')
                if (!$this.hasClass('add-inputs')) {
                    vm.show = false
                    items.hide()
                } else {
                    vm.show = true
                    items.show()
                }
            })

        })
        this.getData()
    }
}
</script>

<style scoped>

</style>