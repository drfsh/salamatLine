import register from "./components/auth/register";
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
import cart from "./components/cart/cart";
import cart_num from "./components/cart/cart_num";
import newsletter from "./components/newsletter/newsletter";
import checkBox from "./components/inputs/check-box";
import filterPrice from "./components/product/filter/filterPrice";
import basketProduct from "./components/product/holder/basket-product/basket-product";
import itemProductBtns from "./components/product/holder/buttons/item-product-btns";
import cat_filter from "./components/categoty/filter";
import Orders from "./components/orders/Orders";
import invoice from "./components/orders/invoice/invoice";

require('./bootstrap')
require('jquery-confirm')
window.moment = require('jalali-moment');
window.axios = require('axios')

setApp([
    {
        name: 'app-feature-item',
        component: {},
        components: [
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
    {
        name: 'app-cart',
        component: cart,
        components: []
    },
    {
        name: 'cart_orders',
        component: Orders,
        components: []
    },
    {
        name: 'cart_invoice',
        component: {},
        components: [
            {
                name:'cart_invoice',
                component:invoice
            }
        ]
    },

])
setElement([
    {
        name: 'cat-filter',
        component: cat_filter
    },
    {
        name: 'product-btns',
        component: itemProductBtns
    },
    {
        name: 'basket-product',
        component: basketProduct
    },
    {
        name: 'price-range-box',
        component: filterPrice
    },
    {
        name: 'check-box',
        component: checkBox
    },
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
    {
        name: 'cart-num',
        component: cart_num,
    },
    {
        name: 'news-letter',
        component: newsletter,
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
            app.component(components[x].name, components[x].component)
        }
        app.mount('#' + list[i].name)
    }
}
