document.addEventListener('DOMContentLoaded', function () {
	const cursor = document.querySelector('#cursor');

	if (cursor) {
		const cursorCircle = cursor.querySelector('.cursor__circle');

		const mouse = { x: -100, y: -100 }; // mouse pointer's coordinates
		const pos = { x: 0, y: 0 }; // cursor's coordinates
		const speed = 0.1; // between 0 and 1

		const updateCoordinates = e => {
			mouse.x = e.clientX;
			mouse.y = e.clientY;
		};

		window.addEventListener('mousemove', updateCoordinates);

		function getAngle(diffX, diffY) {
			return (Math.atan2(diffY, diffX) * 180) / Math.PI;
		}

		function getSqueeze(diffX, diffY) {
			const distance = Math.sqrt(Math.pow(diffX, 2) + Math.pow(diffY, 2));
			const maxSqueeze = 0.15;
			const accelerator = 1500;
			return Math.min(distance / accelerator, maxSqueeze);
		}

		const updateCursor = () => {
			const diffX = Math.round(mouse.x - pos.x);
			const diffY = Math.round(mouse.y - pos.y);

			pos.x += diffX * speed;
			pos.y += diffY * speed;

			const angle = getAngle(diffX, diffY);
			const squeeze = getSqueeze(diffX, diffY);

			const scale = 'scale(' + (1 + squeeze) + ', ' + (1 - squeeze) + ')';
			const rotate = 'rotate(' + angle + 'deg)';
			const translate = 'translate3d(' + pos.x + 'px ,' + pos.y + 'px, 0)';

			cursor.style.transform = translate;
			cursorCircle.style.transform = rotate + scale;
		};

		function loop() {
			updateCursor();
			requestAnimationFrame(loop);
		}

		requestAnimationFrame(loop);

		const cursorModifiers = document.querySelectorAll('[cursor-class]');

		cursorModifiers.forEach(curosrModifier => {
			curosrModifier.addEventListener('mouseenter', function () {
				const className = this.getAttribute('cursor-class');
				cursor.classList.add(className);
			});

			curosrModifier.addEventListener('mouseleave', function () {
				const className = this.getAttribute('cursor-class');
				cursor.classList.remove(className);
			});
		});

		const currentLanguage = document.documentElement.lang;

		if (currentLanguage === 'en-GB') {
			cursor.classList.add('lang');
		}

		const link = document.getElementById('contact-link');

		if (link) {
			function toggleHref() {
				if (window.innerWidth < 542) {
					link.removeAttribute('href');
				} else {
					link.setAttribute('href', '#contact-us');
				}
			}

			toggleHref();
			window.addEventListener('resize', toggleHref);
		}
	}

	//contact button scroll
	var contactButton = document.querySelector('.contact__button');

	contactButton.addEventListener('click', function () {
		var contactSection = document.getElementById('contact-us');
		contactSection.scrollIntoView({ behavior: 'smooth' });
	});
});
