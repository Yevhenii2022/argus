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


	
	const footer = document.querySelector("footer");
    const footerAdditional = document.querySelector(".footer--additional");
    if (footer && footerAdditional) {
        footerAdditional.style.height = footer.offsetHeight + "px";
    }
});


function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    var windowHeight = (window.innerHeight || document.documentElement.clientHeight);
    var windowWidth = (window.innerWidth || document.documentElement.clientWidth);
    var vertInView = (rect.top <= windowHeight) && ((rect.top + rect.height) >= 0);
    var horInView = (rect.left <= windowWidth) && ((rect.left + rect.width) >= 0);
    return (vertInView && horInView);
}

function smoothScale(element, targetScale, currentScale, step) {
    if (currentScale > targetScale) {
        currentScale -= step;
        if (currentScale < targetScale) {
            currentScale = targetScale;
        }
    } else if (currentScale < targetScale) {
        currentScale += step;
        if (currentScale > targetScale) {
            currentScale = targetScale;
        }
    }

    element.style.transform = 'scale(' + currentScale.toFixed(5) + ')';
    
    if (currentScale !== targetScale) {
        requestAnimationFrame(function() {
            smoothScale(element, targetScale, currentScale, step);
        });
    }
}

function handleScroll() {
    var footer = document.querySelector('.footer--additional');
    var main = document.querySelector('main');
    
    if (isElementInViewport(footer)) {
        var footerHeightInView = Math.max(0, window.innerHeight - footer.getBoundingClientRect().top);
        var targetScale = 1 - footerHeightInView * 0.00002;
        var currentScale = parseFloat(main.style.transform.replace('scale(', '').replace(')', '')) || 1;
        smoothScale(main, targetScale, currentScale, 0.0005);
    } else {
        smoothScale(main, 1, 1, 0.0005);
    }
}

window.addEventListener('scroll', handleScroll);
