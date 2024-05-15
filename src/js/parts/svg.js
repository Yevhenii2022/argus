// document.addEventListener("DOMContentLoaded", function () {
//   function animateOnScroll() {
//     var block = document.getElementById("about");
//     var el = document.getElementById("about-svg");

//     if (isElementInViewport(block)) {
//       el.classList.add("animate");
//     }
//   }

//   function isElementInViewport(el) {
//     var top = el.offsetTop;
//     var height = el.offsetHeight;

//     while (el.offsetParent) {
//       el = el.offsetParent;
//       top += el.offsetTop;
//     }

//     return (
//       top < window.pageYOffset + window.innerHeight &&
//       top + height > window.pageYOffset
//     );
//   }

//   window.addEventListener("scroll", animateOnScroll);

//   animateOnScroll();
// });

document.addEventListener('DOMContentLoaded', function () {
	function animateOnScroll() {
		var block = document.getElementById('bcg');
		var el = document.getElementById('about-svg2');

		if (isElementInViewport(block)) {
			el.classList.add('animate');
		}
	}

	function isElementInViewport(el) {
		var top = el.offsetTop;
		var height = el.offsetHeight;

		while (el.offsetParent) {
			el = el.offsetParent;
			top += el.offsetTop;
		}

		return top < window.pageYOffset + window.innerHeight && top + height > window.pageYOffset;
	}

	window.addEventListener('scroll', animateOnScroll);

	animateOnScroll();
});
