document.addEventListener("DOMContentLoaded", function () {
  let header = document.querySelector(".header");
  let scrollPrev = 0;

  window.addEventListener("scroll", function () {
    var scrolled =
      window.PageYOffset || this.document.documentElement.scrollTop;

    if (scrolled > 100 && scrolled > scrollPrev) {
      header.classList.add("header--hidden");
    } else {
      if (header.classList.contains("header--hidden")) {
        header.classList.remove("header--hidden");
      }
    }
    scrollPrev = scrolled;
  });


  //burger-menu
  const menu = document.querySelector('.header__content');
  const menuButton = document.querySelector('.header__burger');
 
  menuButton.addEventListener('click', function () {
      this.classList.toggle('active');
      menu.classList.toggle('open');
      document.body.classList.toggle('burger-open');
  
  });
          
});
