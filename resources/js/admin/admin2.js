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




setApp([
    {
        name: 'comment-replay',
        component: replay
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

function setApp(list) {
    for (const i in list) {
        const ticketList = wrapper(list[i].component, Vue.createApp, Vue.h);
        customElements.define(list[i].name, ticketList)
    }
}
