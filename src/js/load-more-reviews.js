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
