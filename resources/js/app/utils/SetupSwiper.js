let Swiper = require('./swiper')

//# sourceMappingURL=swiper-bundle.min.js.map
new Swiper(".owl-5", {
    spaceBetween: 0,
    freeMode: !0,
    loop: !1,
    speed: 2e3,
    autoplay: {delay: 4e3, disableOnInteraction: !0},
    breakpoints: {0: {slidesPerView: 2}, 640: {slidesPerView: 3}, 970: {slidesPerView: 4}}
}), new Swiper(".owl-f", {
    spaceBetween: 15,
    loop: !1,
    speed: 5e3,
    autoplay: {delay: 0, disableOnInteraction: !0},
    breakpoints: {0: {slidesPerView: 2}, 740: {slidesPerView: 3}, 1280: {loop: !1, autoplay: !1, slidesPerView: 5}}
}), new Swiper(".owl-6", {
    spaceBetween: 0,
    freeMode: !0,
    loop: !1,
    speed: 2e3,
    autoplay: {delay: 5e3, disableOnInteraction: !0},
    breakpoints: {0: {slidesPerView: 2}, 640: {slidesPerView: 4}, 1024: {slidesPerView: 6}}
}), new Swiper(".owl-3", {
    spaceBetween: 20,
    freeMode: !1,
    loop: !1,
    speed: 1500,
    autoplay: {delay: 3e3, disableOnInteraction: !0},
    breakpoints: {0: {slidesPerView: 1}, 640: {slidesPerView: 2}, 1024: {slidesPerView: 3}}
})
new Swiper(".main-slider", {
    spaceBetween: 0,
    loop: !1,
    slidesPerView: 1,
    effect: "fade",
    freeMode: !1,
    disableOnInteraction: !0,
    speed: 2e3,
    autoplay: {delay: 5500, disableOnInteraction: !1},
    pagination: {el: ".swiper-pagination", clickable: !0}
})


var ti = document.querySelectorAll(".product-slider-main"), e = document.querySelectorAll(".product-slider-thumb"),
    n = [], i = [];
ti.forEach((function (t, e) {
    n.push(new Swiper(t, {loop: !0, loopedSlides: 3}))
})), e.forEach((function (t, e) {
    i.push(new Swiper(t, {slidesPerView: 3, loop: !0, loopedSlides: 3, slideToClickedSlide: !0, spaceBetween: 13}))
}));

if (ti.length > 0 && e.length > 0) {
    var s = n.length || i.length || 0;
    n.length !== i.length && console.warn("multipleSwiperSlides: Number of main slides and nav slides is different. Expect incorrect behaviour.");
    for (var r = 0; r < s; r++) n[r].controller.control = i[r], i[r].controller.control = n[r];
    console.log("multipleSwiperSlides: Things should be working fine. B)")
}
