<?php
// Include necessary files and start sessions if needed
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Movie Details';

include_once __DIR__ . '/../../../templates/navbar.php';

// Include necessary files and setup
require_once __DIR__ . '/../../../controllers/shows/shows.php'; // Adjust the path as necessary

$seeLater = getShowsTitlePoster(20, 0, 1);
$moviespage1 = getShowsTitlePoster(20, 0, 1);
$seriespage1 = getShowsTitlePoster(20, 0, 2);

$user = user();
?>

<div class="d-flex flex-column align-items-center main-margin">
    <!--movies header start-->
        <div class="heading mt-5 w-75">
            <h4 class="heading-title">My Movies</h4>
            <button class="btn btn-link" onclick="showMovieCarousel()">
                <i class="bi bi-plus-circle outlines"></i> 
            </button>
        </div>
        <!--movies header end-->

        <!--movies carousel start-->
        <div id="movieCarousel" class="carousel slide w-75" data-bs-ride="carousel" style="display: none;">
            <div class="carousel-inner">
                <!-- 1st Page -->
                <div class="carousel-item active">
                    <div class="container mb-5 pt-2 shows-placeholder w-100">
                        <?php
                        // Loop through shows and group them into rows of 4
                        for ($i = 0; $i < count($moviespage1); $i += 4): ?>
                            <div class="row">
                                <?php
                                // Loop for each row of 4 shows
                                for ($j = $i; $j < $i + 4 && $j < count($moviespage1); $j++): ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="image-container d-flex">
                                            <img src="..\..\..\<?php echo $moviespage1[$j]['poster_path']; ?>" alt="<?php echo htmlspecialchars($moviespage1[$j]['title']); ?>" class="img-fluid">
                                            <div class="show-details">
                                                <h6><?php echo htmlspecialchars($moviespage1[$j]['title']); ?></h6>
                                                <div class="button-container">
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                    </a>
                                                    <a href="#" id="toggleButton" class="outlines">
                                                        <i id="toggleIcon" class="bi bi-plus-circle-fill"></i>
                                                    </a>
                                                    <form action="/crud/controllers/shows/shows.php" method="get">
                                                        <input type="hidden" name="id" value="<?php echo $moviespage1[$j]['id']; ?>">                                        
                                                        <button type="submit" name="submitShowDetails" class="outlines button-transparent">
                                                            <i class="bi bi-info-circle-fill"></i>
                                                        </button>
                                                    </form> 
                                                </div>  
                                          </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--movies carousel end-->        

        <!--series header start-->
        <div class="heading mt-5 w-75">
            <h4 class="heading-title">My Series</h4>
            <button class="btn btn-link" onclick="showSerieCarousel()">
                <i class="bi bi-plus-circle outlines"></i> 
            </button>
        </div>
        <!--series header end-->
        <!--series carousel start-->
        <div id="serieCarousel" class="carousel slide w-75" data-bs-ride="carousel" style="display: none;">
            <div class="carousel-inner">
            <!-- 1st Page -->
                <div class="carousel-item active">
                    <div class="container mb-5 pt-2 shows-placeholder w-100">
                        <?php
                        // Loop through shows and group them into rows of 4
                        for ($i = 0; $i < count($seriespage1); $i += 4): ?>
                            <div class="row">
                                <?php
                                // Loop for each row of 4 shows
                                for ($j = $i; $j < $i + 4 && $j < count($seriespage1); $j++): ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="image-container d-flex">
                                            <img src="..\..\..\<?php echo $seriespage1[$j]['poster_path']; ?>" alt="<?php echo htmlspecialchars($seriespage1[$j]['title']); ?>" class="img-fluid">
                                            <div class="show-details">
                                                <h6><?php echo htmlspecialchars($seriespage1[$j]['title']); ?></h6>
                                                <div class="button-container">
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                    </a>
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-plus-circle-fill"></i>
                                                    </a>
                                                    <form action="/crud/controllers/shows/shows.php" method="get">
                                                        <input type="hidden" name="id" value="<?php echo $seriespage1[$j]['id']; ?>">                                        
                                                        <button type="submit" name="submitShowDetails" class="outlines button-transparent">
                                                            <i class="bi bi-info-circle-fill"></i>
                                                        </button>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--series carousel end-->      
    </div>

    <div class="mt-5"></div>
    
<script>
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
</script>
<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>
