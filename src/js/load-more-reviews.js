jQuery(function ($) {
	var page = 1;
	var canLoad = true;
	var ajaxUrl = MyAjaxReviews.ajaxurl;
	var reviewsContainer = $('.reviews__inner');
	var preloader = $('.ajax-preloader');

	function loadReviews(page) {
		if (canLoad) {
			canLoad = false;
			preloader.show();

			var data = {
				action: 'load_more_reviews',
				page: page,
			};

			$.post(ajaxUrl, data, function (response) {
				preloader.hide();

				if (response !== 'no_posts') {
					if (reviewsContainer) {
						reviewsContainer.append(response);
						resetAnim();
						canLoad = true;
					}
				}
			});
		}
	}

	$(document).on('click', '.reviews .pagination span', function (e) {
		e.preventDefault();
		var page = $(this).data('page');
		reviewsContainer.empty();
		loadReviews(page);

		var reviewsWrapper = document.querySelector('.reviews__wrapper');
		if (reviewsWrapper) {
			var scrollOptions = {
				top: reviewsWrapper.offsetTop,
				behavior: 'smooth',
			};
			window.scrollTo(scrollOptions);
		}
	});

	loadReviews(page);
});

function resetAnim(){
	const animItems = document.querySelectorAll('._anim-items');

	if (animItems.length > 0) {
		window.addEventListener('scroll', animOnScroll, { passive: true });

		function animOnScroll() {
			for (let index = 0; index < animItems.length; index++) {
				const animItem = animItems[index];
				const animItemHeight = animItem.offsetHeight;
				const animItemOffset = offset(animItem).top;
				const animStart = 10;
				let animItemPoint = window.innerHeight + animItemHeight / animStart;
				if (animItemHeight < window.innerHeight) {
					animItemPoint = window.innerHeight - window.innerHeight / animStart;
				}

				if (scrollY > animItemOffset - animItemPoint && scrollY < animItemOffset + animItemHeight) {
					animItem.classList.add('_active');
				} else {
					animItem.classList.remove('_active');
				}
			}
		}

		function offset(el) {
			const rect = el.getBoundingClientRect(),
				scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
				scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			return {
				top: rect.top + scrollTop,
				left: rect.left + scrollLeft,
			};
		}

		setTimeout(() => {
			animOnScroll();
		}, 300);
	}
}