jQuery(function ($) {
	var page = 1;
	var canLoad = true;
	var ajaxUrl = MyAjaxProjects.ajaxurl;
	var projectsContainer = $('#projects-list');

	function loadBlogs(category, option, page) {
		if (canLoad) {
			canLoad = false;

			var data = {
				action: 'load_more_projects',
				page: page,
				category: category,
				option: option,
			};

			$.post(ajaxUrl, data, function (response) {
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

	loadBlogs('all');
});
