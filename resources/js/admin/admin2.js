import brand from "./components/brand/brand";

require('./bootstrap')
require('jquery-confirm')
window.moment = require('jalali-moment');
window.axios = require('axios')

import wrapper from "vue3-webcomponent-wrapper";
import * as Vue from 'vue'
import product from "./components/product/product";
import create_discount from "./components/discount/create_discount";
import edit_discount from "./components/discount/edit_discount";
import replay from "./components/comment/replay";
import newslatest_export from "./components/newslatest/newslatest_export";
import infoSettings from "./components/info/infoSettings";
import categorys from "./components/category/categorys";
import create_landing from "./components/landing/create_landing";
import edit_landing from "./components/landing/edit_landing";



import '@imengyu/vue3-context-menu/lib/vue3-context-menu.css'
import ContextMenu from '@imengyu/vue3-context-menu'
let app = Vue.createApp(categorys)
app.use(ContextMenu)
app.mount('#category-admin')


let app2 = Vue.createApp(brand)
app2.use(ContextMenu)
app2.mount('#banner-admin')

setElement([
    {
        name: 'landing-create',
        component: create_landing
    },
    {
        name: 'landing-edit',
        component: edit_landing
    },
    {
        name: 'edit-landing',
        component: edit_landing
    },
    {
        name: 'page-info-settings',
        component: infoSettings
    },
    {
        name: 'comment-replay',
        component: replay
    },
    {
        name: 'newslatest-export',
        component: newslatest_export
    },
    {
        name: 'brand-admin',
        component: brand
    },
    {
        name: 'product-admin',
        component: product
    },
    {
        name: 'created-discount',
        component: create_discount
    },
    {
        name: 'edit-discount',
        component: edit_discount
    },
])

function setElement(list) {
    for (const i in list) {
        const ticketList = wrapper(list[i].component, Vue.createApp, Vue.h);
        customElements.define(list[i].name, ticketList)
    }
}
