import Vue from 'vue'
import Router from 'vue-router'
import home from "./components/home/home";
import dashboard from "./components/dashboard/dashboardV2";
import chat from "./components/chat/chat"
import chatFriends from "./components/chat/friends"
import new_event from "./components/event/new_event/newEvent"
import new_place from "./components/place/newPlace/newPlace"
import new_appointment from "./components/appointment/new_appointment"
import friends from "./components/friends/friends"
import list_date from "./components/event/list_date"
import groups from "./components/groups/groups"
import events from "./components/event/events/events2"
import event_edit from "./components/event/edit/event_edit"
import place_edit from "./components/place/edit/place_edit"
import places from "./components/place/places/Place2"
import my_places from "./components/place/places"
import event from "./components/event/show_event_v2/event"
import place from "./components/place/show_place_v2/place"
import about from "./components/other/info"
import ask from "./components/other/ask"
import help from "./components/other/help"
import privacy from "./components/other/private"
import profile from "./components/profile/v2/profile"
import tickets from "./components/support/tickets"
import ticket from "./components/support/ticket"
import NewTicket from "./components/support/NewTicket"
import weatherAll from "./components/weather/weather-all"
import weather from "./components/weather/weather"
import login from "./components/auth/login"
import register from "./components/auth/register"
import config from "./components/auth/config"
import reset_password from "./components/auth/reset_password"
import reserve_event from "./components/event/reserve_event"
import reserved_events from "./components/event/reserved_event"
import reserve_place from "./components/place/reserve_place"
import chat_box from "./components/chat/mobile/chat_box"
import appo_send from "./components/appointment/appo_send"
import appo_give from "./components/appointment/appo_give"
import appo_show from "./components/appointment/appo_view"
import page_404 from "./components/404"
import contact from "./components/other/contact"
import otherProfile from "./components/otherProfile/v2/profile"
import trams from "./components/pay/trams"
import wallet from "./components/pay/wallet"
import request from "./components/pay/request"
import cardBank from "./components/pay/cardBank"
import joinGroup from "./components/join_link/joinGroup"
import test from './components/test/test'
import saved from "./components/saved/saved";
Vue.use(Router)

export default new Router({
    mode: 'history',
    routes:[
        {
            path:'/home',
            name: 'home',
            component:home
        },
        {
            path:'/terms-and-conditions',
            name: 'terms',
            component:privacy
        },
        {
            path:'/contact-us',
            name: 'contact',
            component:contact
        },
        {
            path:'/',
            name: 'user-home',
            component:dashboard
        },
        {
            path:'/:username/dashboard',
            name: 'user',
            component:dashboard
        },
        {
            path:'/:username/chats',
            name: 'chats',
            component:chat
        },
        {
            path:'/:username/chats/friends',
            name: 'chatsFriends',
            component:chatFriends
        },
        {
            path:'/:username/new-event',
            name: 'newEvent',
            component:new_event
        },
        {
            path:'/:username/event/edit/:id',
            name: 'editEvent',
            component:event_edit
        },
        {
            path:'/:username/place/edit/:id',
            name: 'editPlace',
            component:place_edit
        },
        {
            path:'/:username/new-place',
            name: 'newPlace',
            component:new_place
        },
        {
            path:'/:username/new-appointment',
            name: 'newAppointment',
            component:new_appointment
        },
        {
            path:'/:username/appointment/posted',
            name: 'appointmentPosted',
            component:appo_send
        },
        {
            path:'/:username/appointment/received',
            name: 'appointmentReceived',
            component:appo_give
        },
        {
            path:'/appointment/:id',
            name: 'appointmentShow',
            component:appo_show
        },
        {
            path:'/:username/friends',
            name: 'friends',
            component:friends
        },
        {
            path:'/events/date-list',
            name: 'dateList',
            component:list_date
        },
        {
            path:'/:username/groups',
            name: 'groups',
            component:groups
        },
        {
            path:'/events',
            name: 'events',
            component:events
        },
        {
            path:'/places',
            name: 'places',
            component:places
        },
        {
            path:'/about',
            name: 'about',
            component:about
        },
        {
            path:'/ask',
            name: 'ask',
            component:ask
        },
        {
            path:'/help',
            name: 'help',
            component:help
        },
        {
            path:'/privacy',
            name: 'privacy',
            component:privacy
        },
        {
            path:'/:username/profile/:page',
            name: 'profile',
            component:profile
        },
        {
            path:'/:username/profile',
            name: 'profile_',
            component:profile
        },
        {
            path:'/tickets',
            name: 'tickets',
            component:tickets
        },
        {
            path:'/new-ticket',
            name: 'new-ticket',
            component:NewTicket
        },
        {
            path:'/ticket/:id',
            name: 'ticket',
            component:ticket
        },
        {
            path:'/weather-all',
            name: 'weather-all',
            component:weatherAll
        },
        {
            path:'/weather',
            name: 'weather',
            component:weather
        },
        {
            path:'/login',
            name: 'login',
            component:login
        },
        {
            path:'/register',
            name: 'register',
            component:register
        },
        {
            path:'/register/config',
            name: 'config',
            component:config
        },
        {
            path:'/reset-password',
            name: 'resetPassword',
            component:reset_password
        },
        {
            path:'/:user/event/:name-:id/reserve',
            name: 'reserveEvent',
            component:reserve_event
        },
        {
            path:'/:username/reserved-events',
            name: 'reserved-events',
            component:reserved_events
        },
        {
            path:'/:username/reserve-place',
            name: 'reservePlace',
            component:reserve_place
        },
        {
            path:'/:user/event/:name-:id',
            name: 'event',
            component:event
        },
        {
            path:'/:user/place/:name-:id',
            name: 'place',
            component:place
        },
        {
            path:'/chat/:type/:id',
            name: 'chatMobile',
            component:chat_box
        },
        {
            path:'/pc/chat/:type/:id',
            name: 'chatPc',
            component:chat
        },
        {
            path:'/:username/wallet',
            name: 'wallet',
            component:wallet
        },
        {
            path:'/:username/trams',
            name: 'trams',
            component:trams
        },
        {
            path:'/:username/request',
            name: 'request',
            component:request
        },
        {
            path:'/:username/card-bank',
            name: 'cardBank',
            component:cardBank
        },
        {
            path:'/@:username',
            name: 'otherUser',
            component:otherProfile
        },
        {
            path:'/@:username/:page',
            name: 'otherUser_',
            component:otherProfile
        },
        {
            path:'/:username/saved',
            name: 'saved',
            component:saved
        },
        {
            path:'/test/test',
            name: 'test',
            component:test
        },
        {
            path:'/join/:code',
            name: 'joinGroup',
            component:joinGroup
        },
        {
            path:'*',
            name: '404',
            component:page_404
        },
    ]
})
