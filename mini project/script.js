document.addEventListener('DOMContentLoaded', () => {
    const CaroS = document.querySelector('.Carousel-slider');
    const CaroSlider = new MicroSlider(CaroS, { indicators: true, indicatorText: '' });
    const hammer = new Hammer(CaroS);
    const CaroSTimer = 5000;


    // Mouseenter Event
    CaroS.onmouseenter = function(e) {
        clearInterval(CaroAutoplay); 
        console.log(e.type + ' mouse detected');
    };

    // Mouseleave Event
    CaroS.onmouseleave = function(e) {
        clearInterval(CaroAutoplay); 
        CaroAutoplay = setInterval(() => CaroSlider.next(), CaroSTimer);
        console.log(e.type + ' mouse detected');
    };

    // Mouseclick Event
    CaroS.onclick = function(e) {
        clearInterval(CaroAutoplay); 
        console.log(e.type + ' mouse detected');
    };

    // Gesture Tap Event
    hammer.on('tap', function(e) {
        clearInterval(CaroAutoplay);
        console.log(e.type + ' gesture detected');
    });

    // Gesture Swipe Event
    hammer.on('swipe', function(e) {
        clearInterval(CaroAutoplay); 
        CaroAutoplay = setInterval(() => CaroSlider.next(), CaroSTimer);
        console.log(e.type + ' gesture detected');
    });


    // Open link on slider item click
    let slideLinks = document.querySelectorAll('.slider-item');
    if (slideLinks && slideLinks.length > 0) {
        slideLinks.forEach(el => el.addEventListener('click', e => {
            e.preventDefault();
            let href = el.dataset.href;
            let target = el.dataset.target;
            if (href !== '#') window.open(href, target);
        }));
    }
    const sliderItems = document.querySelectorAll(".Carousel-slider .slider-item");
  const months = document.querySelectorAll(".months > .month");

  // Display the first month by default
  months[0].style.display = "block";

  // Hide all other months
  for (let i = 1; i < months.length; i++) {
    months[i].style.display = "none";
  }

  sliderItems.forEach((sliderItem, index) => {
    sliderItem.addEventListener("click", function() {
      // Hide all months
      months.forEach(month => {
        month.style.display = "none";
      });

      // Display the corresponding month
      months[index].style.display = "block";
    });
  });
});
