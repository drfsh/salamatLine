<template>
    <input type="text" class="add-inputs ifp" id="price" v-model="v" @focus="removeToman($event)"
           @focusout="setToman($event)" @input="changePrice($event)" :placeholder="title"/>
</template>

<script>
import {riyalToman} from "../../utils/tools";

export default {
    name: "price_input",
    props: {
        title: {
            default: ''
        },
        value: {
            default: ''
        },
        currency: {
            default: 'تومان'
        }
    },
    model: {
        prop: 'model',
        event: 'update'
    },
    data() {
        return {
            v: '',
            history: '',
            numberFa: [
                '۰',
                '۱',
                '۲',
                '۳',
                '۴',
                '۵',
                '۶',
                '۷',
                '۸',
                '۹',
            ]
        }
    },
    methods: {
        changePrice(e) {

            let oldValue = e.target.value
            let value = []

            for (const i in oldValue) {
                if (this.numberFa.indexOf(oldValue[i]) !== -1) {
                    value += this.numberFa.indexOf(oldValue[i])
                } else
                    value += oldValue[i]
            }


            value = value.replaceAll(/\D/g, '')
            value = value.replaceAll(',', '')
            value = value.replaceAll(' ' + this.currency + ' ', '')
            this.$emit('update', parseInt(value))
            this.history = riyalToman(value,true)
            e.target.value = this.history
        },
        setToman(e) {
            let value = e.target.value
            if (value.trim() === '') return
            e.target.value = value + ' ' + this.currency + ' '
        },
        removeToman(e) {
            let value = e.target.value
            value = value.replaceAll(' ' + this.currency + ' ', '')
            e.target.value = value
        }
    },
    mounted() {
            this.v = riyalToman(this.value,true) + ' ' + this.currency + ' '
    },
    watch:{
        value(){
            this.v = riyalToman(this.value,true) + ' ' + this.currency + ' '
        }
    }
}
</script>

<style scoped>

</style>