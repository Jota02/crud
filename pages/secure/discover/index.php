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
    <div class="d-flex flex-column align-items-center main-margin">
        <!--carousel start-->
        <div id="coverCarousel" class="carousel slide">
            <div class="carousel-inner">   
            <?php
                $counter = 0;
                foreach ($covers as $cover): 
                    $active_class = ($counter == 0) ? 'active' : '';
            ?>        
                <div class="carousel-item <?= $active_class ?>">
                    <img src="../../../<?= $cover['cover_path'] ?>" class="" alt="<?= $cover['title'] ?>">
                    <div class="carousel-caption d-none d-md-flex info-position">
                        <h4 class="outlines"><?= $cover['title'] ?></h4>
                        <form action="/crud/controllers/shows/shows.php" method="get">
                            <input type="hidden" name="id" value="<?= $cover['id'] ?>">                                        
                            <button type="submit" name="submitShowDetails" class="outlines button-transparent p-0">
                                <i class="bi bi-info-circle-fill bi-cover-size"></i>
                                <span>Info</span>
                            </button>
                        </form> 
                        <a href="#" class="outlines">
                            <i class="bi bi-plus-circle-fill bi-cover-size"></i>
                            <span>Add to Library</span>
                        </a>
                    </div>
                </div>
            <?php
                $counter++;
                endforeach; 
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
        <div class="d-flex mt-5 py-5 justify-content-center search-bar w-75">
            <form action="/crud/controllers/shows/shows.php" method="get" class="d-flex w-100 justify-content-center">
                <div class="input-group search-bar-size w-100">
                    <input type="text" name="searchInput" class="form-control" placeholder="Search for shows..." maxlength="255">
                    <button type="submit" name="submitSearch" class="btn btn-default">
                        <i class="bi bi-search search-icon"></i>
                    </button>
                </div>
            </form>
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
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-plus-circle-fill"></i>
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
            <!-- 2nd Page -->
                <div class="carousel-item">
                    <div class="container mb-5 pt-2 shows-placeholder">
                        <?php
                        // Loop through shows and group them into rows of 4
                        for ($i = 0; $i < count($moviespage2); $i += 4): ?>
                            <div class="row">
                                <?php
                                // Loop for each row of 4 shows
                                for ($j = $i; $j < $i + 4 && $j < count($moviespage2); $j++): ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="image-container d-flex">
                                            <img src="..\..\..\<?php echo $moviespage2[$j]['poster_path']; ?>" alt="<?php echo htmlspecialchars($moviespage2[$j]['title']); ?>" class="img-fluid">
                                            <div class="show-details">
                                                <h6><?php echo htmlspecialchars($moviespage2[$j]['title']); ?></h6>
                                                <div class="button-container">
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-play-circle-fill"></i>
                                                    </a>
                                                    <a href="#" class="outlines">
                                                        <i class="bi bi-plus-circle-fill"></i>
                                                    </a>
                                                    <form action="/crud/controllers/shows/shows.php" method="get">
                                                        <input type="hidden" name="id" value="<?php echo $moviespage2[$j]['id']; ?>">                                        
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
            <!-- 2nd Page -->
                <div class="carousel-item">
                    <div class="container mb-5 pt-2 shows-placeholder">
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
                                                    <form action="/crud/controllers/shows/shows.php" method="get">
                                                        <input type="hidden" name="id" value="<?php echo $seriespage2[$j]['id']; ?>">                                        
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


    
<?php
include_once __DIR__ . '/../../../templates/footer.php';
?>