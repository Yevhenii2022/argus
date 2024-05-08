document.addEventListener('DOMContentLoaded', function () {
  const pageContainer = document.querySelector("body.single-services main");

  if (pageContainer) {
    gsap.registerPlugin(ScrollTrigger);
    const scroller = new LocomotiveScroll({
      el: pageContainer,

    });

    scroller.on("scroll", ScrollTrigger.update);


    ScrollTrigger.scrollerProxy(pageContainer, {
      scrollTop(value) {
        return arguments.length
          ? scroller.scrollTo(value, 0, 0)
          : scroller.scroll.instance.scroll.y;
      },
      getBoundingClientRect() {
        return {
          left: 0,
          top: 0,
          width: window.innerWidth,
          height: window.innerHeight
        };
      },
      pinType: pageContainer.style.transform ? "transform" : "fixed"
    });

    let pinBoxes = document.querySelectorAll(".pin-wrap > *");
    let pinWrap = document.querySelector(".pin-wrap");
    let pinWrapWidth = pinWrap.offsetWidth;
    let horizontalScrollLength = pinWrapWidth - window.innerWidth;

    // Pinning and horizontal scrolling
    if (pinWrap) {
      gsap.to(".pin-wrap", {

        scrollTrigger: {
          scroller: pageContainer, //locomotive-scroll
          scrub: 5,
          trigger: "#sectionPin",
          pin: true,
          anticipatePin: 2,
          start: "top top",
          endTrigger: ".empty-item-last",
          end: "bottom top",
        },
        x: -pinWrapWidth / 2,

      });
      let cards = document.querySelectorAll(".service-work__card");

      cards.forEach((card, index) => {
        let initialRotationY = gsap.getProperty(card, "rotateY"); 
        let r = 0; 

        gsap.to(card, {
          rotation: () => {
            let newRotationY;
            if (index % 2 === 0) {
              newRotationY = initialRotationY + (r + 1) + (index * 0.05);
              r += 1;
            } else {
              newRotationY = initialRotationY - (r + 1);
              r += 1;
            }
            

            return newRotationY; 
          },
          x: gsap.utils.random(-35, 35), // Случайное смещение по оси X
          y: gsap.utils.random(-35, 35), // Случайное смещение по оси Y
          z: gsap.utils.random(-35, 35), // Случайное смещение по оси Z
          ease: "none",
          scrollTrigger: {
            trigger: "#sectionPin",
            scroller: pageContainer,
            start: "top top",
            end: "bottom top",
            scrub: 0
          }
        });
     
      });
      ScrollTrigger.addEventListener("refresh", () => scroller.update()); //locomotive-scroll

      ScrollTrigger.refresh();
    }
  }
});