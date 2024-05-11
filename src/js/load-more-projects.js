jQuery(function ($) {
	var page = 1;
	var canLoad = true;
	var ajaxUrl = MyAjaxProjects.ajaxurl;
	var loadMoreButton = $('#load-more-button');
	var projectsContainer = $('#projects-list');
	var preloader = $('.ajax-preloader');

	loadMoreButton.hide();

	function loadBlogs(category, option, page) {
		if (canLoad) {
			canLoad = false;
			preloader.show();
			loadMoreButton.hide();

			var data = {
				action: 'load_more_projects',
				page: page,
				category: category,
				option: option,
			};
			var dataButton = {
				action: 'load_more_projects',
				page: page + 1,
				category: category,
				option: option,
			};
			$.post(ajaxUrl, data, function (response) {
				preloader.hide();

				if (response !== 'no_posts') {
					projectsContainer.append(response);
					resetAnim();
					canLoad = true;
				}
			});

			$.post(ajaxUrl, dataButton, function (response) {
				var $response = $(response);

				var projectsCount = $response.filter('a.projects-card').length;

				if (projectsCount == 0) {
					loadMoreButton.hide();
				} else {
					loadMoreButton.show();
				}
			});
		}
	}

	// Delegate the click event to the body for dynamically added elements
	$('body').on('click', '#load-more-button', function () {
		if (canLoad) {
			canLoad = false;
			preloader.show();
			loadMoreButton.hide();

			var category = $('#category-filter li.active').data('category');
			var option = $('#category-filter-right li.active2').data('category');
			var nextPage = page + 1;

			var data = {
				action: 'load_more_projects',
				page: nextPage,
				category: category,
				option: option,
			};
			var dataButton = {
				action: 'load_more_projects',
				page: nextPage + 1,
				category: category,
				option: option,
			};

			$.post(ajaxUrl, data, function (response) {
				preloader.hide();

				if (response !== 'no_posts') {
					projectsContainer.append(response);
					resetAnim();
					canLoad = true;
				}
			});
			$.post(ajaxUrl, dataButton, function (response) {
				var $response = $(response);
				var projectsCount = $response.filter('a.projects-card').length;
				if (projectsCount == 0) {
					loadMoreButton.hide();
				} else {
					loadMoreButton.show();
				}
			});
			page = nextPage;
		}
	});

	$(document).on('click', '#category-filter li', function () {
		$('#category-filter li').removeClass('active');
		$(this).addClass('active');
		var category = $('#category-filter li.active').data('category');
		var option = $('#category-filter-right li.active2').data('category');

		page = 1;
		projectsContainer.empty();
		loadBlogs(category, option, page);
	});

	$(document).on('click', '#category-filter-right li', function () {
		$('#category-filter-right li').removeClass('active2');
		$(this).addClass('active2');
		var category = $('#category-filter li.active').data('category');
		var option = $('#category-filter-right li.active2').data('category');

		projectsContainer.empty();
		loadBlogs(category, option, page);
	});

	$(document).on('change', '#projects-select, #projects-select2', function () {
		var category = $('#projects-select').val();

		if (category == '') {
			category = 'all';
		}

		var option = $('#projects-select2').val();
		page = 1;
		projectsContainer.empty();
		loadBlogs(category, option, page);
	});

	loadBlogs('all');
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