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
			canLoad = false; // Встановлюємо прапорець canLoad в false перед виконанням запиту AJAX, щоб уникнути паралельних запитів
			preloader.show(); // Показуємо прелоадер перед виконанням запиту AJAX
			loadMoreButton.hide();

			var category = $('#category-filter li.active').data('category'); // Отримуємо активну категорію
			var option = $('#blogs__select').val(); // Отримуємо значення опції
			var nextPage = page + 1; // Збільшуємо номер сторінки для завантаження наступної сторінки

			var data = {
				action: 'load_more_projects',
				page: nextPage, // Використовуємо збільшене значення сторінки
				category: category,
				option: option,
			};

			$.post(ajaxUrl, data, function (response) {
				preloader.hide(); // Приховуємо прелоадер після отримання відповіді від сервера

				if (response !== 'no_posts') {
					projectsContainer.append(response); // Додаємо отримані пости на сторінку
					canLoad = true; // Встановлюємо canLoad в true, дозволяючи наступні запити

					var projectsCount = projectsContainer.children().length;
					if (projectsCount % 2 !== 0) {
						loadMoreButton.hide(); // Приховуємо кнопку, якщо кількість постів не кратна 6
					} else {
						loadMoreButton.show(); // Показуємо кнопку, якщо кількість постів кратна 6
					}
				} else {
					loadMoreButton.hide(); // Приховуємо кнопку, якщо немає більше постів
				}
			});
			page = nextPage; // Оновлюємо значення сторінки після успішного завантаження
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
