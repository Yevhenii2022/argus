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

document.addEventListener('DOMContentLoaded', function () {
	const servicesSwiper = new Swiper('.services__swipper', {
		loop: true,
		effect: 'fade',
		watchSlidesProgress: true,
		slidesPerView: 1,
		pagination: {
			el: '.services-pagination',
			type: 'fraction',
			renderFraction: function (currentClass, totalClass) {
				return (
					'<span class="' +
					currentClass +
					'"></span>' +
					'' +
					'<span class="' +
					totalClass +
					'"></span>'
				);
			},
		},
		navigation: {
			nextEl: '.services__arrow--next',
			prevEl: '.services__arrow--prev',
		},
	});

	const projects = new Swiper('.projects-slider__swiper', {
		loop: true,
		watchSlidesProgress: true,
		slidesPerView: 2,
		spaceBetween: 16,
		centeredSlides: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'progressbar',
		},
	});

	const newsSlider = new Swiper('.news-slider__swiper', {
		loop: true,
		watchSlidesProgress: true,
		slidesPerView: 2.44,
		spaceBetween: 16,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'progressbar',
		},
	});

	if (window.innerWidth < 541) {
		const aboutSlider = new Swiper('.about-banner__slider', {
			slidesPerView: 1,
			spaceBetween: 8,
			// autoplay:true,
			watchSlidesProgress: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			pagination: {
				el: '.swiper-pagination',
				type: 'progressbar',
			},
		});
	}
});
