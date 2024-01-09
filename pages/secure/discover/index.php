<?php
require_once __DIR__ . '/../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../../helpers/session.php';
include_once __DIR__ . '/../../../templates/header.php';
require_once __DIR__  . '/../../../infra/repositories/showRepository.php';

$moviespage1 = getShowsTitlePoster(20, 0, 1);
$moviespage2 = getShowsTitlePoster(20, 20, 1);
$seriespage1 = getShowsTitlePoster(20, 0, 2);
$seriespage2 = getShowsTitlePoster(20, 20, 2);
$covers = getShowsTitleCovers();

$user = user();
$title = '- App';

include_once __DIR__ . '/../../../templates/navbar.php';
?>

<!--content start-->
<div class="main mb-5">
    <div class="d-flex flex-column align-items-center">
        <!--carousel start-->
        <div id="coverCarousel" class="carousel slide container-fluid">
            <div class="carousel-inner carrousel-inner-width container-fluid">
                
                <?php   
                $counter = 0; // Counter to set the first item as active
                foreach ($covers as $cover) {
                    $active_class = ($counter == 0) ? 'active' : '';
                    
                    echo '<div class="carousel-item ' . $active_class . '">';
                    echo '<img src="../../../' . str_replace("\\", "/", $cover['cover_path']) . '" class="d-block img-fluid" alt="' . $cover['title'] . '">';
                    echo '<div class="carousel-caption d-none d-md-flex info-position">';
                    echo '<h4 class="outlines">' . $cover['title'] . '</h4>';
                    echo '<a href="#" class="outlines">';
                    echo '<i class="bi bi-play-circle-fill bi-cover-size"></i>';
                    echo '<span>    Trailer</span>';
                    echo '</a>';
                    echo '<a href="#" class="outlines">';
                    echo '<i class="bi bi-plus-circle-fill bi-cover-size"></i>';
                    echo '<span>    Add to Library</span>';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                    
                    $counter++; // Increment counter
                }
                ?>
                
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#coverCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            
            <button class="carousel-control-next" type="button" data-bs-target="#coverCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--carousel end-->

        <!-- search bar start  -->
        <div class="search-bar w-75 mt-5 py-5">
                <input type="search" placeholder="Search for show..." class="form-control" id="search-input" maxlength="255" name="">
                <i class="bi bi-search"></i>
            </div>  
        <!-- search bar end -->
        
        <!--movies header start-->
        <div class="heading mt-5 w-75">
            <h4 class="heading-title">Trending Movies</h4>
            <button class="btn btn-link" onclick="showMovieCarousel()">
                <i class="bi bi-plus-circle outlines"></i> 
            </button>
        </div>
        <!--movies header end-->

        <!--movies carousel start-->
        <div id="movieCarousel" class="carousel slide w-75" data-bs-ride="carousel" style="display: none;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#movieCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#movieCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
            <!-- 1st Page -->
                <div class="carousel-item active">
                    <div class="container my-5 pt-2 shows-placeholder w-100">
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
                                                    <a href="./show_details.php?id=<?php echo $seriespage1[$j]['id']; ?>">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <!-- 2nd Page -->
                <div class="carousel-item">
                    <div class="container my-5 pt-2 shows-placeholder">
                        <?php
                        // Loop through shows and group them into rows of 4
                        for ($i = 0; $i < count($seriespage2); $i += 4): ?>
                            <div class="row">
                                <?php
                                // Loop for each row of 4 shows
                                for ($j = $i; $j < $i + 4 && $j < count($seriespage2); $j++): ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="image-container d-flex">
                                            <img src="..\..\..\<?php echo $seriespage2[$j]['poster_path']; ?>" alt="<?php echo htmlspecialchars($seriespage2[$j]['title']); ?>" class="img-fluid">
                                            <div class="show-details">
                                                <h6><?php echo htmlspecialchars($seriespage2[$j]['title']); ?></h6>
                                                <div class="button-container">
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                    </a>
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-plus-circle-fill"></i>
                                                    </a>
                                                    <a href="./show_details.php?id=<?php echo $seriespage2[$j]['id']; ?>">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                    </a>
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
            <h4 class="heading-title">Trending Series</h4>
            <button class="btn btn-link" onclick="showSerieCarousel()">
                <i class="bi bi-plus-circle outlines"></i> 
            </button>
        </div>
        <!--series header end-->

        <!--series carousel start-->
        <div id="serieCarousel" class="carousel slide w-75" data-bs-ride="carousel" style="display: none;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#serieCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#serieCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
            <!-- 1st Page -->
                <div class="carousel-item active">
                    <div class="container my-5 pt-2 shows-placeholder w-100">
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
                                                    <a href="./show_details.php?id=<?php echo $seriespage1[$j]['id']; ?>">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <!-- 2nd Page -->
                <div class="carousel-item">
                    <div class="container my-5 pt-2 shows-placeholder">
                        <?php
                        // Loop through shows and group them into rows of 4
                        for ($i = 0; $i < count($seriespage2); $i += 4): ?>
                            <div class="row">
                                <?php
                                // Loop for each row of 4 shows
                                for ($j = $i; $j < $i + 4 && $j < count($seriespage2); $j++): ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="image-container d-flex">
                                            <img src="..\..\..\<?php echo $seriespage2[$j]['poster_path']; ?>" alt="<?php echo htmlspecialchars($seriespage2[$j]['title']); ?>" class="img-fluid">
                                            <div class="show-details">
                                                <h6><?php echo htmlspecialchars($seriespage2[$j]['title']); ?></h6>
                                                <div class="button-container">
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                    </a>
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-plus-circle-fill"></i>
                                                    </a>
                                                    <a href="./show_details.php?id=<?php echo $seriespage2[$j]['id']; ?>">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                    </a>
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
</div>


    
<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js" integrity="sha256-aULwhztqcQjhipg7QZKtRpARqBMTF/iBYdbwkXBY2iI=" crossorigin="anonymous"></script>
<?php
include_once __DIR__ . '/../../../templates/footer.php';
?>