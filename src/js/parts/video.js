document.addEventListener('DOMContentLoaded', function () {
	const video = document.getElementById('custom-video');
	const playPauseButton = document.querySelector('.video__play');

	const currentLanguage = document.documentElement.lang;

	let videoText = '';

	if (currentLanguage === 'uk') {
		videoText = 'відео';
	} else {
		videoText = 'video';
	}

	const togglePlayPause = () => {
		if (video.paused) {
			video.play();
			playPauseButton.innerHTML = '';
		} else {
			video.pause();
			playPauseButton.innerHTML = `<svg class="video__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none"><path fill="#fff" d="M0 0v19l15-9.5L0 0Z" /></svg> ${videoText}`;
		}
	};

	if (video) {
		video.addEventListener('click', togglePlayPause);
	}

	if (playPauseButton) {
		playPauseButton.addEventListener('click', togglePlayPause);
	}

	//form-video
	const formVideo = document.getElementById('form-video');
	const formIcon = document.getElementById('form-icon');
	let videoEnded = false;

	const handleScroll = () => {
		const rect = formVideo.getBoundingClientRect();
		const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

		if (!videoEnded && rect.top >= 0 && rect.bottom <= viewportHeight) {
			// Відео в видимій області і ще не відтворено до кінця
			if (formVideo.paused) {
				formVideo.play();
			}
		} else if (!videoEnded) {
			// Відео поза видимою областю і ще не відтворено до кінця
			if (!formVideo.paused) {
				formVideo.pause();
			}
		}
	};

	const handleVideoEnd = () => {
		formIcon.style.opacity = 1;
		formVideo.style.cursor = 'pointer';
		videoEnded = true;
	};

	const handleVideoClick = () => {
		formVideo.play();
		formIcon.style.opacity = 0;
		formVideo.style.cursor = 'default';
	};

	if (formVideo) {
		formVideo.addEventListener('ended', handleVideoEnd);
		formVideo.addEventListener('click', handleVideoClick);
		window.addEventListener('scroll', handleScroll);
	}
});
