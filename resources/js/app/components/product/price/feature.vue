<template>
    <div class="multi-price" style="display: flex;flex-wrap: wrap;">
        <div role="button" style="margin: 5px 3px;" @click="thisSelect(i,v.id)" class="item" v-for="(v,i) in items"
             :class="{'active':i==select}">
            <span class="name">{{ v.title }}</span>
            <span class="per" v-for="b in $parent.discount">
                <span v-if="b.feature_id==v.id">
                {{ b.percent }}
                </span>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "feature",
    props: ['items'],
    data() {
        return {
            select: -1
        }
    },
    methods: {
        thisSelect(i, id) {
            if (i == this.select)
                this.select = -1
            else {
                this.select = i
                this.$parent.mf = id
            }
        }
    }
}
</script>

<style scoped>

</style>