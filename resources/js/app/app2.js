
require('./bootstrap')
require('jquery-confirm')
window.moment = require('jalali-moment');
window.axios = require('axios')

import wrapper from "vue3-webcomponent-wrapper";
import * as Vue from 'vue'

import address from "./components/address/address";
import tickets from "./components/ticket/tickets";


setApp([
    {
        name: 'address-page',
        component: address
    },
    {
        name: 'ticket-list',
        component: tickets
    },
])

function setApp(list) {
    for (const i in list) {
        const ticketList = wrapper(list[i].component, Vue.createApp, Vue.h);
        customElements.define(list[i].name, ticketList)
    }
}
