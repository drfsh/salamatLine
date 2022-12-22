<template>
    <div :class="{item:role===1,'item-child':role!==1}">
        <div class="item--bg" @click="select" @contextmenu="menu($event)"
             :class="{active:$parent.$data['select'+role]===i}">
            <img :src="value.img">
            <div class="info">
                <div>{{ value.name }}
                    <span class="count p-count">{{ value.products_count }}</span>
                    <span class="count">{{ value.child_count }}</span>
                </div>
                <div class="status">
                    <span v-if="value.hide" class="bg-danger">پنهان شده</span>
                </div>
            </div>
            <button v-if="role===1" @click="menu($event)">
                <i class="fas fa-ellipsis-v ellipsis"></i>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "item-cat",
    props: ['value', 'i', 'role'],

    methods: {
        menu(e) {

            let parent_role = this.role-1
            let pi = null
            let parentData = null
            if (parent_role!==-1){
                pi = this.$parent.$data['select'+parent_role]
                if (pi!=undefined)
                parentData = this.$parent.$data['data'+parent_role][pi]
                else{
                    parentData = {id:0}
                }
            }

            let vm = this
            let iconHide = ''
            if (this.value.hide)
                iconHide = 'fas fa-check'


            let copy
            if (this.$parent.copy !== -1)
                copy = {
                    label: 'جایگزاری',
                    icon: 'fas fa-paste',
                    onClick: async () => {
                        await window.axios.post('/admin/category/api/copy', {
                            child_id: vm.$parent.copy,
                            parent_id: vm.value.id
                        })
                        vm.$parent.getChild(vm.value.id, vm.role+1)
                        vm.value.child_count++
                        vm.select()
                        vm.$parent.copy = -1
                    }
                }
            else
                copy = {
                    label: 'کپی',
                    icon: 'fas fa-copy',
                    onClick: () => {
                        vm.$parent.copy = vm.value.id
                    }
                }

            let option = [{
                label: 'ویرایش',
                icon: 'fas fa-edit',
                onClick: () => {
                    window.open('/admin/category/' + this.value.id + '/edit', '_blank').focus()
                }
            },
                {
                    label: 'حذف',

                    icon: 'fas fa-trash',
                    onClick: () => {
                        $.confirm({
                            title: 'حذف',
                            backgroundDismiss: true,
                            closeButton: true,
                            content: 'از حذف این دسته بندی به صورت برگشت‌ناپذیر اطمینان دارید؟',
                            buttons: {
                                ok: {
                                    text: 'حذف',
                                    btnClass: 'btn-red',
                                    action: async () => {
                                        await window.axios.delete('/admin/category/api/destroy/' + vm.value.id+'/'+parentData.id)
                                        $.alert('پاک شد!')
                                        window.location.href = '/admin/category'
                                    }
                                },
                                no: {
                                    text: 'لغو'
                                },

                            }
                        })
                    }
                },
                copy,
                {
                    label: 'انتقال به ...',
                    icon: 'fas fa-list',
                    children: [
                        {
                            label: 'بالا',
                            icon: 'fas fa-long-arrow-alt-up',
                            onClick: async () => {
                                if (vm.i == 0) return
                                let selected = false
                                if (vm.$parent.$data['select' + vm.role] === vm.i)
                                    selected = true
                                vm.$parent.$data['data' + vm.role] = vm.$parent.moveArr(vm.$parent.$data['data' + vm.role], vm.i, vm.i - 1)
                                if (selected)
                                    vm.$parent.$data['select' + vm.role] = vm.i - 1
                                await window.axios.get('/admin/category/up/' + this.value.id)
                            }
                        },
                        {
                            label: 'پایین',
                            icon: 'fas fa-long-arrow-alt-down',
                            onClick: async () => {
                                if (vm.i == vm.$parent.$data['data' + this.role].length - 1) return
                                let selected = false
                                if (vm.$parent.$data['select' + vm.role] === vm.i)
                                    selected = true
                                vm.$parent.$data['data' + vm.role] = vm.$parent.moveArr(vm.$parent.$data['data' + vm.role], vm.i, vm.i + 1)
                                if (selected)
                                    vm.$parent.$data['select' + vm.role] = vm.i + 1
                                await window.axios.get('/admin/category/down/' + this.value.id)
                            }
                        },
                    ]
                },
                {
                    label: 'مشاهده',
                    icon: 'fas fa-eye',
                    onClick: () => {
                        window.open('/category/' + this.value.slug, '_blank').focus()
                    }
                },
                {
                    label: 'سایر',
                    icon: 'fas fa-ellipsis-v',
                    children: [
                        {
                            label: 'پنهان بودن',
                            icon: iconHide,
                            onClick: async () => {
                                await window.axios.get('/admin/category/hide/' + this.value.id)
                                vm.value.hide = !vm.value.hide
                            }
                        },
                        {
                            label: 'نمایش قیمت محصولات',
                            icon: 'fas fa-eye',
                            onClick: async () => {
                                await window.axios.get('/admin/category/showPrice/' + this.value.id)
                                $.alert('با موفقیت انجام شد')
                            }
                        },
                        {
                            label: ' مخفی کردن قیمت محصولات',
                            icon: 'fas fa-eye-slash',
                            onClick: async () => {
                                await window.axios.get('/admin/category/hidePrice/' + this.value.id)
                                $.alert('با موفقیت انجام شد')
                            }
                        },

                    ]
                },]

            this.$contextmenu({
                x: e.x,
                y: e.y,
                items: option
            })
        },
        select() {
            this.$parent.$data['select' + this.role] = this.i
        }
    },

}
</script>

<style scoped>

</style>