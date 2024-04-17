jQuery(function ($) {
	var page = 2;
	$('#load-more-button').on('click', function () {
		var button = $(this);
		$.ajax({
			url: MyAjaxProjects.ajaxurl,
			type: 'POST',
			data: {
				action: 'load_more_projects',
				page: page,
			},
			success: function (response) {
				$('.projects-part__list').append(response);
				page++;
				if (response.trim() === '') {
					button.animate({ height: 0 }, 'slow', function () {
						$(this).hide();
					});
				}
			},
		});
	});
});
