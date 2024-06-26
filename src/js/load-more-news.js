jQuery(function ($) {
	var page = 1;
	var canLoad = true;
	var ajaxUrl = MyAjaxBlogs.ajaxurl;
	var blogsContainer = $('#blog__inner');
	var preloader = $('.ajax-preloader');

	function loadBlogs(category, option, page) {
		if (canLoad) {
			canLoad = false;
			preloader.show();

			var data = {
				action: 'load_more_blogs',
				page: page,
				category: category,
				option: option,
			};

			$.post(ajaxUrl, data, function (response) {
				preloader.hide();

				if (response !== 'no_posts') {
					blogsContainer.append(response);
					resetAnim();
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
		blogsContainer.empty();
		loadBlogs(category, option);
	});

	$(document).on('change', '#blogs__select', function () {
		if (window.innerWidth > 541) {
			var category = $('#category-filter li.active').data('category');
		} else {
			var category = $('#news__select-filters').val();

			if (category == '') {
				category = 'all';
			}
		}

		var option = $(this).val();
		page = 1;
		blogsContainer.empty();
		if (option === 'popular') {
			loadBlogs(category, 'post_popularity');
		} else {
			loadBlogs(category, option);
		}
	});
	$(document).on('change', '#news__select-filters', function () {
		var option = $('#blogs__select').val();
		var category = $(this).val();
		page = 1;
		blogsContainer.empty();
		loadBlogs(category, option);
	});
	$(document).on('click', '.news .pagination span', function (e) {
		e.preventDefault();
		var page = $(this).data('page');
		var category = $('#category-filter li.active').data('category');
		var option = $('#blogs__select').val();
		blogsContainer.empty();
		loadBlogs(category, option, page);

		var newsTop = document.querySelector('.news__top');
		if (newsTop) {
			var scrollOptions = {
				top: newsTop.offsetTop,
				behavior: 'smooth',
			};
			window.scrollTo(scrollOptions);
		}
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