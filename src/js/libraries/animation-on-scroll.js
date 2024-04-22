document.addEventListener('DOMContentLoaded', function () {
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

	const animCar = document.querySelectorAll('._anim-items-driver');

	if (animCar.length > 0) {
		window.addEventListener('scroll', animOnScrollCar, { passive: true });

		function animOnScrollCar() {
			for (let index = 0; index < animCar.length; index++) {
				const animItem = animCar[index];
				const animItemHeight = animItem.offsetHeight;
				const animItemOffset = offsetCar(animItem).top;
				const animStart = 10;

				let animItemPoint = window.innerHeight - animItemHeight * animStart;
				if (animItemHeight > window.innerHeight) {
					animItemPoint = window.innerHeight + window.innerHeight * animStart;
				} else if (animItemHeight < window.innerHeight) {
					animItemPoint = window.innerHeight + window.innerHeight * animStart;
				}

				if (scrollY > animItemOffset - animItemPoint && scrollY < animItemOffset + animItemHeight) {
					animItem.classList.add('_active');
				} else {
					animItem.classList.remove('_active');
				}
			}
		}

		function offsetCar(el) {
			const rect = el.getBoundingClientRect(),
				scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
				scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			return {
				top: rect.top + scrollTop,
				left: rect.left + scrollLeft,
			};
		}

		setTimeout(() => {
			animOnScrollCar();
		}, 300);
	}
});
