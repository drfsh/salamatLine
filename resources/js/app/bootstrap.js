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

/**
 * You can find an explanation for this code here - https://dev.to/jashgopani
 */
document.querySelectorAll(".win-btn:not(i,span)").forEach((b) => {
    b.onmouseleave = (e) => {
        e.target.style.background = null;
        e.target.style.borderImage = null;
    };


        b.addEventListener("mousemove", (e) => {
            if (!$(e.target).hasClass('win-btn')) {
                let cm = e
                e = e.target.parentElement
                const rect = e.getBoundingClientRect();
                const x = cm.clientX - rect.left; //x position within the element.
                const y = cm.clientY - rect.top; //y position within the element.
                e.style.background = `radial-gradient(circle at ${x}px ${y}px , #dfdfdf,#dfdfdf3b)`;
                e.style.borderImage = `radial-gradient(20% 75% at ${x}px ${y}px ,#dfdfdf,#dfdfdf3b) 1 / 1px / 0px stretch `;
                return false;
            }else {
                const rect = e.target.getBoundingClientRect();
                const x = e.clientX - rect.left; //x position within the element.
                const y = e.clientY - rect.top; //y position within the element.
                e.target.style.background = `radial-gradient(circle at ${x}px ${y}px , #dfdfdf,#dfdfdf3b)`;
                e.target.style.borderImage = `radial-gradient(20% 75% at ${x}px ${y}px ,#dfdfdf,#dfdfdf3b) 1 / 1px / 0px stretch `;
            }
        });

});

window.newCardAdd = false