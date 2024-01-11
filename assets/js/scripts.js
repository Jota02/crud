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


// Adicione um evento de clique ao botão
document.getElementById('toggleButton').addEventListener('click', function () {
    // Obtenha o elemento do ícone
    var icon = document.getElementById('toggleIcon');

    // Verifique a classe atual do ícone e altere para a classe desejada
    if (icon.classList.contains('bi-plus-circle-fill')) {
        icon.classList.remove('bi-plus-circle-fill');
        icon.classList.add('bi-check-circle-fill');
    } else {
        icon.classList.remove('bi-check-circle-fill');
        icon.classList.add('bi-plus-circle-fill');
    }
});