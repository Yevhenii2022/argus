document.addEventListener("DOMContentLoaded", function () {
  let inputFile = document.querySelector("input[type='file']");
  let fileNameDisplay = document.querySelector(".form__file-text");
  let submitBtnVacancy = document.querySelector('.form__submit--vacancy');
  let submitBtn = document.querySelector('.form__submit');
  let popup = document.querySelector('.popup');
  let icons = {
      pdf: "/wp-content/themes/pointer-theme/src/img/pdf.jpg",
      doc: "/wp-content/themes/pointer-theme/src/img/doc.jpg",
      img: "/wp-content/themes/pointer-theme/src/img/img.jpg",
  };


  if (inputFile) {
      inputFile.addEventListener("change", function () {
          let fileName = this.files[0].name;
          let fileType = this.files[0].type;

          let iconName;
          if(fileType.includes('pdf')){
              iconName = icons.pdf;
          }else if(fileType.includes('doc')){
              iconName = icons.doc;
          }else if(fileType.includes('png') || fileType.includes('jpeg')){
              iconName = icons.img;
          } else{
              iconName = '';
          }

          fileNameDisplay.innerHTML = iconName ?
          `<img class="form__file-icon" src=${iconName} style="width:20px;height:20px" /><span> ${fileName}</span>` : "Прикріпити файл";
      })
  }

  //form
  if (submitBtn) {
    submitBtn.addEventListener("click", function () {
          popup.classList.add("popup--show");
              setTimeout(function () {
                popup.classList.remove("popup--show");
            }, 2000);
        });
    }

  //popup form-vacancy + clear file
  if (submitBtnVacancy) {
    submitBtnVacancy.addEventListener("click", function () {
          if (inputFile.files.length > 0) {
              inputFile.value = '';
              fileNameDisplay.innerText = "Прикріпити файл";
              popup.classList.add("popup--show");

              setTimeout(function () {
                popup.classList.remove("popup--show");
            }, 2000);

          }
      });
    }
});