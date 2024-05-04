document.addEventListener('DOMContentLoaded', function () {
	var image = document.getElementsByClassName('thumbnail');
	new simpleParallax(image, {
		delay: 0.6,
		transition: 'cubic-bezier(0,0,0,1)',
	});
});
