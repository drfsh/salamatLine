import register from "./components/auth/register";

require('./bootstrap')
require('jquery-confirm')
window.moment = require('jalali-moment');
window.axios = require('axios')

import wrapper from "vue3-webcomponent-wrapper";
import * as Vue from 'vue'

import address from "./components/address/address";
import tickets from "./components/ticket/tickets";
import login from "./components/auth/login";
import star from "./components/product/star/star";
import addCard from "./components/product/add-card";
import infoItem from "./components/product/tabs/item/info-item";
import inputStar from "./components/product/star/inputStar";
import deactive from "./components/product/deactive";
import product_timer from "./components/product/timer/product_timer";
import buttons from "./components/product/buttons/buttons";
import addedCard from "./components/product/alert/added-card";

setApp([
    {
        name: 'app-feature-item',
        component: {},
        components:[
            {
                name: 'feature-item',
                component: infoItem
            },
        ]
    },
    {
        name: 'product-add-cart',
        component: {},
        components: [
            {
                name: 'product-add-cart',
                component: addCard
            },
        ]
    },
])
setElement([
    {
        name: 'address-page',
        component: address
    },
    {
        name: 'ticket-list',
        component: tickets
    },
    {
        name: 'auth-login',
        component: login
    },
    {
        name: 'auth-register',
        component: register
    },
    {
        name: 'range-star',
        component: star
    },
    {
        name: 'input-star',
        component: inputStar
    },
    {
        name: 'product-diactive',
        component: deactive
    },
    {
        name: 'product-timer',
        component: product_timer
    },
    {
        name: 'product-buttons',
        component: buttons
    },
    {
        name: 'product-is-add-card',
        component: addedCard
    },

])

function setElement(list) {
    for (const i in list) {
        const ticketList = wrapper(list[i].component, Vue.createApp, Vue.h);
        customElements.define(list[i].name, ticketList)
    }
}
function setApp(list) {
    for (const i in list) {
        let app = Vue.createApp(list[i].component)
        let components = list[i].components
        for (const x in components) {
            app.component(components[x].name,components[x].component)
        }
        app.mount('#'+list[i].name)
    }
}
