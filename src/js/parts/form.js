document.addEventListener('DOMContentLoaded', function () {
	let inputFile = document.querySelector("input[type='file']");
	let fileNameDisplay = document.querySelector('.form__file-text');
	let icons = {
		pdf: '/wp-content/themes/pointer-theme/src/img/pdf.jpg',
		doc: '/wp-content/themes/pointer-theme/src/img/doc.jpg',
		img: '/wp-content/themes/pointer-theme/src/img/img.jpg',
	};

	if (inputFile) {
		inputFile.addEventListener('change', function () {
			let fileName = this.files[0].name;
			let fileType = this.files[0].type;

			let iconName;
			if (fileType.includes('pdf')) {
				iconName = icons.pdf;
			} else if (fileType.includes('doc')) {
				iconName = icons.doc;
			} else if (fileType.includes('png') || fileType.includes('jpeg')||fileType.includes('gif')||fileType.includes('jpg')) {
				iconName = icons.img;
			} else {
				iconName = '';
			}

			fileNameDisplay.innerHTML = iconName
				? `<img class="form__file-icon" src=${iconName} style="width:20px;height:20px" /><span> ${fileName}</span>`
				: 'Прикріпити файл';
		});
	}
});

document.addEventListener('DOMContentLoaded', function () {
	const wpcf7Elm = document.querySelector('.wpcf7');
	let popupSuccess = document.querySelector('.popup');

	wpcf7Elm.addEventListener(
		'wpcf7mailsent',

		event => {
			popupSuccess.classList.add('popup--show');
			const form = event.target;
			form.reset();
		},
		false,
	);
});
