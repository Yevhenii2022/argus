document.addEventListener("DOMContentLoaded", function() {
  const cards = document.querySelectorAll('.service-work__card');
  const inner = document.querySelector('.service-work__inner');
  
  if (cards.length > 0 && inner) {
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
        let tiltAmount = (tiltPercentage / 100) * 10 * tiltDirection; 
    
        card.style.transform = `rotate(${tiltAmount}deg)`;
      });
    });
  }

});
