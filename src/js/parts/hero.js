document.addEventListener('DOMContentLoaded', function () {
	let heroWrapper = document.querySelector('.hero__background');

	if (heroWrapper) {
		setTimeout(function () {
			heroWrapper.classList.add('hero__background--show');
		}, 500);
	}

	var sceneAngar = document.querySelector('.hero__background-bottom');
	if (sceneAngar) {
		var parallaxAngar = new Parallax(sceneAngar);
	}
});
