// window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    // window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    // require('bootstrap');
} catch (e) {
}

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

$('.bg-l').on('mousemove', function (e) {

    const rect = e.target.getBoundingClientRect();


    let width = rect.left + window.scrollX
    let x = e.clientX - width;
    let y = (e.clientY - rect.top);

    root.style.setProperty('--mouse-x', x + 'px');
    root.style.setProperty('--mouse-y', y + 'px');
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
        } else {
            const rect = e.target.getBoundingClientRect();
            const x = e.clientX - rect.left; //x position within the element.
            const y = e.clientY - rect.top; //y position within the element.
            e.target.style.background = `radial-gradient(circle at ${x}px ${y}px , #dfdfdf,#dfdfdf3b)`;
            e.target.style.borderImage = `radial-gradient(20% 75% at ${x}px ${y}px ,#dfdfdf,#dfdfdf3b) 1 / 1px / 0px stretch `;
        }
    });

});

window.newCardAdd = false


$(".home-title-product-item").click(function () {
    $('.home-title-product-item').removeClass('active')
    $(this).addClass('active')
    let id = $(this).attr('data-id')
    let classs = $(this).attr('data-c')
    $('.' + classs).hide()
    $('#' + id).show()
});

$('.to-up,.swup').click(function () {
    $('html ,body').stop().animate({scrollTop: 0}, 500)
})

$('.whatsapp-panel-p').click(function () {
    let b = $(this);
    if (b.hasClass('active'))
        b.removeClass('active')
    else
        b.addClass('active')
})

window.boxAlert = {
    show: false,
    type: '',
    value: {},
}
window.cart_empty = false;
window.cart_back = false;
window.cart_back2 = false;

$('.faq .list .item').click(function () {
    $('.faq .list .item').removeClass('active');
    let b = $(this);
    if (b.attr('active')==='true')
    {
        b.removeClass('active')
        b.attr('active','false')
    }
    else
    {
        b.addClass('active')
        b.attr('active','true')
    }
})

$(document).ready(function () {

    let w = ((window.innerWidth - $('.box3').width()) / 2) - 97

    $('.contact-popup').attr('style', 'right:' + w + 'px;')

    $(window).resize(function () {

        let w = ((window.innerWidth - $('.box3').width()) / 2) - 97

        $('.contact-popup').attr('style', 'right:' + w + 'px;')

    })
    $('.to_p1').click(function () {

        $([document.documentElement, document.body]).animate({
            scrollTop: 0
        }, 200)
    })
    $('.to_p2').click(function () {

        $([document.documentElement, document.body]).animate({
            scrollTop: $('#p2').offset().top - 200
        }, 200)
    })
})

if (window.innerWidth>600){
    $('footer .whatsapp').slideUp()
}
let t = 0;
$(window).scroll((function () {
    var e = $(this), n = $(this).scrollTop();
        e.scrollTop() >= 100 && e.scrollTop() < 200 &&
        t > n ? $(".top-bar").removeClass("shadow") : e.scrollTop() >= 70 &&
        n > t ? ($(".top-bar .top").slideUp(),$(".top-bar .ads-layout").slideUp(),
                $('.top-bar .bot .icon-btns').slideDown()) :
            t > n ? ($(".top-bar .top").slideDown(),
                    $(".top-bar .ads-layout").slideDown(),
                    $('.top-bar .bot .icon-btns').slideUp()) :
                ($(".top-bar .top").slideDown(),
                    $(".top-bar .ads-layout").slideDown(),
                    $('.top-bar .bot .icon-btns').slideUp() ,
                    $(".top-bar").removeClass("shadow")),
        t = n

    if (e.scrollTop()>1000){
        $('.contact-popup').slideUp()
    }else {
        $('.contact-popup').slideDown()
    }

    if (window.innerWidth>600){
        if (e.scrollTop()>1000){
            $('footer .whatsapp').slideDown()
        }else {
            $('footer .whatsapp').slideUp()
        }
    }
}))
var menu = false
$('.menu-profile-i').click(function () {
    if (menu)
    {
        $('.menu-profile').slideUp()
        menu = false
    }else {
        $('.menu-profile').slideDown()
        menu = true
    }
})

$('.item-mini-menu').click(function () {
    if ($(this).hasClass('active')){
        $(this).removeClass('active')
    }else {
        $(this).addClass('active')
    }
})

$('#close-ads-layout').click(function () {
    $('.ads-layout').addClass('hide');
})


import lozad from 'lozad'
const observer = lozad();
observer.observe();
