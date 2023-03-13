const carousel = document.querySelector('.carousel');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
let currentIndex = 0;
let intervalId = null;
const intervalTime = 5000;

//console.log(slides);

// Move to next slide
function nextSlide() {
  currentIndex++;
  if (currentIndex >= slides.length) {
    currentIndex = 0;
  }
  carousel.style.transform = `translateX(-${currentIndex * 100}%)`;

  console.log(carousel.style.transform);
}

// Move to previous slide
function prevSlide() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = slides.length - 1;
  }
  carousel.style.transform = `translateX(-${currentIndex * 100}%)`;

  console.log(carousel.style.transform);
}

// Set up automatic slideshow
function startSlideshow() {
  intervalId = setInterval(() => {
    nextSlide();
  }, intervalTime);
}

// Stop automatic slideshow
function stopSlideshow() {
  clearInterval(intervalId);
}

// Add event listeners to buttons
nextBtn.addEventListener('click', () => {
  console.log('CLICK NEXT')
  nextSlide();
  stopSlideshow();
});

prevBtn.addEventListener('click', () => {
  console.log('CLICK PREV')
  prevSlide();
  stopSlideshow();
});

// Start automatic slideshow
startSlideshow();  
