jQuery(function ($) {
	var page = 1;
	var canLoad = true;
	var ajaxUrl = MyAjaxProjects.ajaxurl;
	var projectsContainer = $('#projects-list');
	var preloader = $('.ajax-preloader');

	function loadBlogs(category, option, page) {
		if (canLoad) {
			canLoad = false;
			preloader.show();

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
				}
			});
		}
	}

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
