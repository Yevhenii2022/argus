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
		slidesPerView: 1.1,
		spaceBetween: 8,
		centeredSlides: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'progressbar',
		},
		breakpoints: {
			541: {
				spaceBetween: 16,
				slidesPerView: 2,
			},
		},
	});

	const values = new Swiper('.about-values__right', {

		watchSlidesProgress: true,
		slidesPerView: 1.2,
		spaceBetween: 8,
		centeredSlides: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'progressbar',
		},
		breakpoints: {
			541: {
				spaceBetween: 1,
				slidesPerView: 0,
			},
		},
	
	});

	
const projectsSingle = new Swiper('.project__slider', {
		loop: true,
		watchSlidesProgress: true,
		slidesPerView: 2,
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

	const newsSlider = new Swiper('.news-slider__swiper', {
		loop: true,
		watchSlidesProgress: true,
		slidesPerView: 1.13,
		spaceBetween: 8,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'progressbar',
		},
		breakpoints: {
			541: {
				spaceBetween: 16,
				slidesPerView: 2.44,
			},
		},
	});

	const advanagesSwiper = new Swiper('.service-advantages__slider', {
		loop: false,
		watchSlidesProgress: true,
		slidesPerView: 1,

		pagination: {
			el: '.service-advantages__pagination',
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
			nextEl: '.service-advantages__arrow--next',
			prevEl: '.service-advantages__arrow--prev',
		},
	});

	const workSwiper = new Swiper('.service-work__swiper', {
		slidesPerView: 1.22,
		centeredSlides: true,
		mousewheel: true,
		freeMode: true,
		on: {
			slideChange: function () {
				const slides = document.querySelectorAll('.service-work__card');
				slides.forEach((slide, index) => {
					if (index === this.activeIndex) {
						slide.style.transform = 'rotate(5deg) translateY(-10%)';
					} else {
						slide.style.transform = 'rotate(-5deg) translateY(0)';
					}
				});
			},
		},
		breakpoints: {
			541: {
				slidesPerView: 4.285,
			},
		},
	});

	// if (window.innerWidth < 542) {
	const aboutSlider = new Swiper('.about-banner__slider', {
		slidesPerView: 1.1,
		spaceBetween: 8,
		// autoplay:true,
		// watchSlidesProgress: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'progressbar',
		},
		breakpoints: {
			541: {
				slidesPerView: 3,
				spaceBetween: 0,
			},
		},
	});
	// }

	//fancy Box
	Fancybox.bind('[data-fancybox]', {
		Html: {
			youtube: {
				controls: 0,
				rel: 0,
				fs: 0,
			},
		},
	});

	Fancybox.bind('[data-fancybox="gallery"]', {
		idle: false,
		showClass: false,
		hideClass: false,
		dragToClose: false,
		contentClick: false,
		Toolbar: {
			display: {
				left: [],
				middle: ['infobar'],
				right: ['close'],
			},
		},
		Thumbs: {
			type: 'classic',
		},
	});
	//fancy Box
});

