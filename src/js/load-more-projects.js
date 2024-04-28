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

			$.post(ajaxUrl, data, function (response) {
				preloader.hide();

				if (response !== 'no_posts') {
					projectsContainer.append(response);
					canLoad = true;

					var projectsCount = projectsContainer.children().length;

					if (projectsCount % 2 !== 0) {
						loadMoreButton.hide();
					} else {
						loadMoreButton.show();
					}
				} else {
					loadMoreButton.hide();
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
			var option = $('#blogs__select').val();
			var nextPage = page + 1;

			var data = {
				action: 'load_more_projects',
				page: nextPage,
				category: category,
				option: option,
			};

			$.post(ajaxUrl, data, function (response) {
				preloader.hide();

				if (response !== 'no_posts') {
					projectsContainer.append(response);
					canLoad = true;
					var projectsCount = projectsContainer.children().length;
					if (projectsCount % 2 !== 0) {
						loadMoreButton.hide();
					} else {
						loadMoreButton.show();
					}
				} else {
					loadMoreButton.hide();
				}
			});
			page = nextPage;
		}
	});

	$(document).on('click', '#category-filter li', function () {
		$('#category-filter li').removeClass('active');
		$(this).addClass('active');
		var category = $(this).data('category');
		var option = $('#blogs__select').val();
		page = 1;
		projectsContainer.empty();
		loadBlogs(category, option);
	});

	$(document).on('click', '#category-filter-right li', function () {
		$('#category-filter-right li').removeClass('active2');
		$(this).addClass('active2');
		var category = $(this).data('category');
		var option = $('#blogs__select').val();
		page = 1;
		projectsContainer.empty();
		loadBlogs(category, option);
	});

	$(document).on('change', '#projects-select, #projects-select2', function () {
		var option = $('#blogs__select').val();
		var category = $(this).val();
		page = 1;
		projectsContainer.empty();
		loadBlogs(category, option);
	});

	loadBlogs('all');
});
