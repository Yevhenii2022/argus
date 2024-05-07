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
          scrub: 2,
          trigger: "#sectionPin",
          pin: true,
          anticipatePin: 1,
          start: "top top",
          end: "bottom 50%",

        },
        x: -horizontalScrollLength,

      });
      let cards = document.querySelectorAll(".service-work__card");

      cards.forEach((card, index) => {
        let initialRotationY = gsap.getProperty(card, "rotateY"); // Get the initial rotation on the Y axis

        gsap.to(card, {
          rotation: () => {
            let newRotationY;
            if (index % 2 === 0) {
              newRotationY = initialRotationY + (scroller.scroll.instance.scroll.y / 50) + (index * 0.2); // For even indices
            } else {
              newRotationY = initialRotationY - (scroller.scroll.instance.scroll.y / 50); // For odd indices
            }
            if (Math.abs(newRotationY - initialRotationY) > 10) {
              newRotationY = initialRotationY - (newRotationY - initialRotationY); // Reverse the rotation
            }
            return newRotationY; // Return the new rotation value
          },
          x: gsap.utils.random(-35, 35), // Add a random offset along the X axis
          y: gsap.utils.random(-35, 35), // Add a random offset along the Y axis
          z: gsap.utils.random(-35, 35), // Add a random offset along the Z axis
          ease: "none",
          scrollTrigger: {
            trigger: "#sectionPin",
            scroller: pageContainer,
            start: "top top",
            end: "bottom 75%",
            scrub: 0
          }
        });

      });
      ScrollTrigger.addEventListener("refresh", () => scroller.update()); //locomotive-scroll

      ScrollTrigger.refresh();
    }
  }
});