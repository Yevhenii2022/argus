import "./parts/parts";
import "./libraries/libraries";
import "./parts/slider";

var x;
var div = document.getElementById("last");

var scrollDown = setInterval(function () {

    window.scrollBy({
        top: x,
        left: 0,
        behavior: 'smooth'
    });

    if (window.pageYOffset == 0) {
        x = div.clientHeight;

    } else if (window.pageYOffset == div.offsetTop) {
        x = -div.clientHeight;
    }
}, 3000)


console.log(div.offsetTop)