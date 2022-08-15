import brand from "./components/brand/brand";

require('./bootstrap')
require('jquery-confirm')
window.moment = require('jalali-moment');
window.axios = require('axios')

import wrapper from "vue3-webcomponent-wrapper";
import * as Vue from 'vue'
import product from "./components/product/product";




setApp([
    {
        name: 'brand-admin',
        component: brand
    },
    {
        name: 'product-admin',
        component: product
    },
])

function setApp(list) {
    for (const i in list) {
        const ticketList = wrapper(list[i].component, Vue.createApp, Vue.h);
        customElements.define(list[i].name, ticketList)
    }
}
