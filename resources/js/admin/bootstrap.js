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

$('body').click(function (e) {
    let vm = $(e.target)
    if (vm.hasClass('ellipsis')){
        let id = vm.attr('data')
        $('#'+id).addClass('active')
    }else{
        $('.option.body').removeClass('active')
    }
})

$('.accordion2').click(function (e) {
    let vm = $(e.target)

    let m = $('#'+vm.attr('data'))
    if (m.hasClass('active')){
        m.removeClass('active')
    }else{
        m.addClass('active')
    }
})