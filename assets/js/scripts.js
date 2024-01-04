const navigation = document.querySelector(".navbar");

const navigationHeight = navigation.offsetHeight;

document.documentElement.style.setProperty(
  "--scroll-padding",
  navigationHeight + "px"
);

function showMovieCarousel() {
  var movieCarouselContainer = document.getElementById("movieCarousel");
  
  if (movieCarouselContainer.style.display === "none" || movieCarouselContainer.style.display === "") {
    movieCarouselContainer.style.display = "block";
    
    new bootstrap.Carousel(movieCarouselContainer); 
  } else {
    movieCarouselContainer.style.display = "none";
  }
}

function showSerieCarousel() {
  var serieCarouselContainer = document.getElementById("serieCarousel");
  
  if (serieCarouselContainer.style.display === "none" || serieCarouselContainer.style.display === "") {
    serieCarouselContainer.style.display = "block";
    
    new bootstrap.Carousel(serieCarouselContainer); 
  } else {
    serieCarouselContainer.style.display = "none";
  }
}
