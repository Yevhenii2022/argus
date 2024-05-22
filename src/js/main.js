import './parts/parts';
import './libraries/libraries';
import './parts/slider';

document.addEventListener('DOMContentLoaded', event => {
	var x;
	var div = document.getElementById('last');

	if (!div) {
		return;
	}

	var scrollDown = setInterval(function () {
		window.scrollBy({
			top: x,
			left: 0,
			behavior: 'smooth',
		});

		if (window.pageYOffset == 0) {
			x = div.clientHeight;
		} else if (window.pageYOffset == div.offsetTop) {
			x = -div.clientHeight;
		}
	}, 3000);
});
