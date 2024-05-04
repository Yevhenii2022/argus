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

	if (window.innerWidth < 542) {
		const values = new Swiper('.about-values__right', {
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
		});
	}

	if (window.innerWidth < 542) {
		const responsibilities = new Swiper('.vacancy__responsibilities-right', {
			watchSlidesProgress: true,
			slidesPerView: 1.21,
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
		});
	}

	const projectsSingle = new Swiper('.project__slider', {
		loop: true,
		watchSlidesProgress: true,
		slidesPerView: 1.1,
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
				slidesPerView: 2,
			},
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

	if (window.innerWidth < 542) {
		const aboutSlider = new Swiper('.about-banner__slider', {
			slidesPerView: 1.148,
			centeredSlides: true,
			spaceBetween: 8,
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

	const reviewsSlider = new Swiper('.reviews__slider', {
		loop: true,
		watchSlidesProgress: true,
		slidesPerView: 1,
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
