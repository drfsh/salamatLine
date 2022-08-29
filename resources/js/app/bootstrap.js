window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */


let meta = $('meta[name=csrf-token]').attr('content')
window.csrf_token = meta;


const root = document.documentElement;

$('.bg-l').on('mousemove',function (e){

    const rect = e.target.getBoundingClientRect();


    let width = rect.left + window.scrollX
    let x = e.clientX - width;
    let y = (e.clientY - rect.top);

    root.style.setProperty('--mouse-x', x+'px');
    root.style.setProperty('--mouse-y', y+'px');
});

