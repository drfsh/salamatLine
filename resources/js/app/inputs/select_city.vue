<template>
    <div class="nice-select wide p-0" :id="type"  tabindex="0">
        <input autocomplete="off" id="search_city" style="height: 45px !important;margin: 0 !important;width: 100%;" v-model="text"
               class="input-1 no-hover " :class="'add-inputs-'+type"
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
    name: "select_city",
    props: {
        id: {
            default: null
        },
        type: {
            default: 'province'
        },
        p_id: {
            default: 0
        },
    },
    data() {
        return {
            itemsM: [],
            items: [],
            show: false,
            text: '',
            name: ''
        }
    },
    methods: {
        async getData() {
            let request;
            if (this.type == 'province')
                request = await window.axios.get('/cart/address/province')
            else
                request = await window.axios.get('/cart/address/city/' + this.p_id)

            let {data} = request;

            this.itemsM = data;
            this.items = data;
            if (this.id !== null) {
                for (const i in this.itemsM) {
                    if (this.itemsM[i].id === this.id) {
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
            this.$parent.product_id = i.id
            this.$emit('update:id', i.id)

            let vm = this
            setTimeout(function () {
                vm.show = false
            }, 200)
        },
        search() {
            if (this.text.trim() === '')
                this.items = this.itemsM

            this.items = []
            for (const i in this.itemsM) {
                if (this.itemsM[i].title.indexOf(this.text.trim()) !== -1) {
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
                if (!$this.hasClass('add-inputs-'+vm.type)) {
                    items.hide()
                    vm.show = false
                } else {
                    let p = $this.parent('.nice-select').find('.list')
                    vm.show = true
                    p.show()
                }
            })

        })
        this.getData()
    },
    watch:{
        p_id(v){
            this.getData()
        }
    }
}
</script>

<style scoped>

</style>