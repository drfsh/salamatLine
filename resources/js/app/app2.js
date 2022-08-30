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
import tabs from "./components/product/tabs/tabs";


setApp([
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
        name: 'product-add-cart',
        component: addCard
    },
    {
        name: 'product-tabs',
        component: tabs
    },
])

function setApp(list) {
    for (const i in list) {
        const ticketList = wrapper(list[i].component, Vue.createApp, Vue.h);
        customElements.define(list[i].name, ticketList)
    }
}
