// document.addEventListener("DOMContentLoaded", function() {
//   const cards = document.querySelectorAll('.service-work__card');
//   const inner = document.querySelector('.service-work__inner');
  
//   if (cards.length > 0 && inner) {
//     inner.addEventListener('wheel', (e) => {
//       const container = e.currentTarget;
//       const scrollAmount = 200;
//       container.scrollLeft += (e.deltaY > 0 ? 1 : -1) * scrollAmount; 
      
//       cards.forEach((card, index) => {
//         const cardRect = card.getBoundingClientRect();
//         const containerRect = container.getBoundingClientRect();
//         const containerCenter = containerRect.left + containerRect.width / 2;
//         const cardCenter = cardRect.left + cardRect.width / 2;
//         const distanceFromCenter = Math.abs(containerCenter - cardCenter);
//         const maxDistance = containerRect.width / 2;
//         let tiltPercentage = (distanceFromCenter / maxDistance) * 100;
//         tiltPercentage = Math.min(tiltPercentage, 100); 
//         const tiltDirection = index % 2 === 0 ? 1 : -1; 
//         let tiltAmount = (tiltPercentage / 100) * 10 * tiltDirection; 
    
//         card.style.transform = `rotate(${tiltAmount}deg)`;
//       });
//     });
//   }

// });

document.addEventListener("DOMContentLoaded", function() {
  const cards = document.querySelectorAll('.service-work__card');
  const inner = document.querySelector('.service-work__inner');
  let isDragging = false;
  let startPosition = 0;
  let currentTranslate = 0;
  
  if (cards.length > 0 && inner) {
    inner.addEventListener('mousedown', (e) => {
      isDragging = true;
      startPosition = e.clientX;
      currentTranslate = inner.scrollLeft;
    });

    inner.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      const dragDistance = e.clientX - startPosition;
      inner.scrollLeft = currentTranslate - dragDistance;
    });

    inner.addEventListener('mouseup', () => {
      isDragging = false;
    });

    inner.addEventListener('touchstart', (e) => {
      isDragging = true;
      startPosition = e.touches[0].clientX;
      currentTranslate = inner.scrollLeft;
    });

    inner.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      const dragDistance = e.touches[0].clientX - startPosition;
      inner.scrollLeft = currentTranslate - dragDistance;
    });

    inner.addEventListener('touchend', () => {
      isDragging = false;
    });

    inner.addEventListener('wheel', (e) => {
      const container = e.currentTarget;
      const scrollAmount = 200;
      container.scrollLeft += (e.deltaY > 0 ? 1 : -1) * scrollAmount; 
      
      cards.forEach((card, index) => {
        const cardRect = card.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();
        const containerCenter = containerRect.left + containerRect.width / 2;
        const cardCenter = cardRect.left + cardRect.width / 2;
        const distanceFromCenter = Math.abs(containerCenter - cardCenter);
        const maxDistance = containerRect.width / 2;
        let tiltPercentage = (distanceFromCenter / maxDistance) * 100;
        tiltPercentage = Math.min(tiltPercentage, 100); 
        const tiltDirection = index % 2 === 0 ? 1 : -1; 
        let tiltAmount = (tiltPercentage / 100) * 15 * tiltDirection; 
    
        card.style.transform = `rotate(${tiltAmount}deg)`;
      });
    });
  }

});
