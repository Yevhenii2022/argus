// document.addEventListener("DOMContentLoaded", function () {
// 	const swiper = new Swiper(".swiper__swiper", {
// 		loop: true,
// 		effect: "fade",

// 		// If we need pagination
// 		pagination: {
// 			el: ".swiper__pagination",
// 			clickable: true,
// 		},

// 		// Navigation arrows
// 		navigation: {
// 			nextEl: ".swiper__nav--next",
// 			prevEl: ".swiper__nav--prev",
// 		},
// 	});

// });


document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".services__swipper", {
        loop: true,
        effect: "fade",
        watchSlidesProgress: true,
        slidesPerView: 1,

        // Navigation arrows
        navigation: {
            nextEl: ".services__arrow--next",
            prevEl: ".services__arrow--prev",
        },
    });

});