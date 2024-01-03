const navigation = document.querySelector(".navbar");

const navigationHeight = navigation.offsetHeight;

document.documentElement.style.setProperty(
  "--scroll-padding",
  navigationHeight + "px"
);

function showTrendingCarousel() {
  // Get the movie carousel container element
  var movieCarouselContainer = document.getElementById("movieCarousel");
  
  // Toggle the display style to show/hide the movie carousel
  if (movieCarouselContainer.style.display === "none" || movieCarouselContainer.style.display === "") {
    movieCarouselContainer.style.display = "block";
    // Initialize or refresh the carousel if needed (e.g., using Bootstrap's JavaScript API)
    new bootstrap.Carousel(movieCarouselContainer); // Initialize the carousel
  } else {
    movieCarouselContainer.style.display = "none";
  }
}
