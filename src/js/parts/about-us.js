document.addEventListener('DOMContentLoaded', function() {
  const elements = document.querySelectorAll('.about-values__item');
  const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
          if (entry.intersectionRatio > 0) {
              entry.target.classList.add('is-visible');
              observer.unobserve(entry.target);
          }
      });
  });
  elements.forEach(element => {
      observer.observe(element);
  })
// 
  const elem = document.querySelectorAll('.vacancy__responsibilities-item' );
  const observ = new IntersectionObserver(entries => {
      entries.forEach(entry => {
          if (entry.intersectionRatio > 0) {
              entry.target.classList.add('is-visible');
              observ.unobserve(entry.target);
          }
      });
  });
  elem.forEach(el => {
      observer.observe(el);
  });
});