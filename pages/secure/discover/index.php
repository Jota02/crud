<?php
//require_once __DIR__ . '/../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__  . '/../../../infra/repositories/showRepository.php';

$moviespage1 = getShowsTitlePoster(20, 0, 1);
$moviespage2 = getShowsTitlePoster(20, 20, 1);
$seriespage1 = getShowsTitlePoster(20, 0, 2);
$seriespage2 = getShowsTitlePoster(20, 20, 2);
$covers = getShowsTitleCovers();

$user = user();
$myShows = getMyShows($user['id']);

$user = user();
$title = '- App';
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../../assets/images/uploads/logo.png">
        <title>HomeCinema</title>

        <link rel="stylesheet" type="text/css" href="../../../assets/css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    </head>
    <body>
        <?php include_once __DIR__ . '/../../../templates/navbar.php'; ?>
        <!--content start-->
        <div class="main-margin">
            <?php
                if (isset($_SESSION['success']))  {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    echo $_SESSION['success'] . '<br>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    echo $_SESSION['errors'] . '<br>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['errors']);
                }
            ?>
        </div>
        <div class="d-flex flex-column align-items-center">
            <!--carousel start-->
            <div id="coverCarousel" class="carousel">
                <div class="carousel-inner">   
                <?php
                    $counter = 0;
                    foreach ($covers as $cover): 
                        $active_class = ($counter == 0) ? 'active' : '';
                ?>        
                    <div class="carousel-item <?= $active_class ?>">
                        <img src="../../../<?= $cover['cover_path'] ?>" class="img-fluid" alt="<?= $cover['title'] ?>">
                        <div class="carousel-caption d-flex info-position">
                            <h4 class="outlines"><?= $cover['title'] ?></h4>
                            <form action="../../../controllers/shows/shows.php" method="get" class="m-0">
                                <input type="hidden" name="id" value="<?= $cover['id'] ?>">                                        
                                <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                    <i class="bi bi-info-circle-fill bi-cover-size"></i>
                                    <span>Info</span>
                                </button>
                            </form>
                            <?php 
                                $showInLibrary = false; 
                                foreach ($myShows as $show): 
                                    if ($show['show_id'] == $cover['id']) {
                                        $showInLibrary = true;
                                        break;
                                    }
                                endforeach;
                            ?>
                            <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data" class="m-0">
                                <?php if (!$showInLibrary): ?>
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <?php endif; ?>
                                <input type="hidden" name="show_id" value="<?= $cover['id'] ?>">
                                <button type="submit" name="<?= $showInLibrary ? 'removeMyShow' : 'addShow' ?>" class="outlines button-transparent p-0">
                                    <i class="<?= $showInLibrary ? 'bi bi-dash-circle-fill' : 'bi bi-plus-circle-fill bi-cover-size' ?> bi-cover-size"></i>
                                    <span><?= $showInLibrary ? 'Remove from Library' : 'Add to Library' ?></span>
                                </button>
                            </form>
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
                <form action="../../../controllers/shows/shows.php" method="get" class="d-flex w-100 justify-content-center m-0">
                    <div class="input-group search-bar-size w-100">
                        <input type="text" name="searchInput" class="form-control" placeholder="Search for shows..." maxlength="255">
                        <button type="submit" name="submitSearch" class="btn btn-default">
                            <i class="bi bi-search search-icon search-bar-bi"></i>
                        </button>
                    </div>
                </form>
            </div>  
            <!-- search bar end -->
            
            <!--movies header start-->
            <div class="heading mt-5 w-75">
                <h3 class="text-white">Trending Movies</h3>
                <button class="btn btn-link" onclick="showMovieCarousel()">
                    <i class="bi bi-plus-circle outlines heading-bi"></i> 
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
                        <div class="container mb-5 pt-4 shows-placeholder w-100">
                            <?php
                            // Loop through shows and group them into rows of 4
                            for ($i = 0; $i < count($moviespage1); $i += 4): ?>
                                <div class="row">
                                    <?php
                                    // Loop for each row of 4 shows
                                    for ($j = $i; $j < $i + 4 && $j < count($moviespage1); $j++): ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="image-container d-flex">
                                                <img src="../../../<?= $moviespage1[$j]['poster_path'] ?>" alt="<?= $moviespage1[$j]['title'] ?>" class="img-fluid">
                                                <div class="show-details">
                                                    <h6 class="show-details-h6"><?= $moviespage1[$j]['title'] ?></h6>
                                                    <div class="button-container">
                                                        <?php $showInLibrary = false; 
                                                            foreach ($myShows as $show): 
                                                                if ($show['show_id'] == $moviespage1[$j]['id']) {
                                                                    $showInLibrary = true;
                                                                    break;
                                                                }
                                                        endforeach;?>
                                                        <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data" class="m-0">
                                                            <?php if (!$showInLibrary): ?>
                                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                            <?php endif; ?>
                                                            <input type="hidden" name="show_id" value="<?= $moviespage1[$j]['id'] ?>">
                                                            <button type="submit" name="<?= $showInLibrary ? 'removeMyShow' : 'addShow' ?>" class="outlines button-transparent p-0">
                                                                <i class="<?= $showInLibrary ? 'bi bi-dash-circle-fill' : 'bi bi-plus-circle-fill' ?> button-container-bi"></i>
                                                            </button>
                                                        </form> 
                                                        <form action="../../../controllers/shows/shows.php" method="get" class="m-0">
                                                            <input type="hidden" name="id" value="<?= $moviespage1[$j]['id'] ?>">                                        
                                                            <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                                                <i class="bi bi-info-circle-fill button-container-bi"></i>
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
                        <div class="container mb-5 pt-4 shows-placeholder">
                            <?php
                            // Loop through shows and group them into rows of 4
                            for ($i = 0; $i < count($moviespage2); $i += 4): ?>
                                <div class="row">
                                    <?php
                                    // Loop for each row of 4 shows
                                    for ($j = $i; $j < $i + 4 && $j < count($moviespage2); $j++): ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="image-container d-flex">
                                                <img src="../../../<?= $moviespage2[$j]['poster_path'] ?>" alt="<?= $moviespage2[$j]['title'] ?>" class="img-fluid">
                                                <div class="show-details">
                                                    <h6 class="show-details-h6"><?= $moviespage2[$j]['title'] ?></h6>
                                                    <div class="button-container">
                                                        <?php $showInLibrary = false; 
                                                            foreach ($myShows as $show): 
                                                                if ($show['show_id'] == $moviespage2[$j]['id']) {
                                                                    $showInLibrary = true;
                                                                    break;
                                                                }
                                                        endforeach;?>
                                                        <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data" class="m-0">
                                                            <?php if (!$showInLibrary): ?>
                                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                            <?php endif; ?>
                                                            <input type="hidden" name="show_id" value="<?= $moviespage2[$j]['id'] ?>">
                                                            <button type="submit" name="<?= $showInLibrary ? 'removeMyShow' : 'addShow' ?>" class="outlines button-transparent p-0">
                                                                <i class="<?= $showInLibrary ? 'bi bi-dash-circle-fill' : 'bi bi-plus-circle-fill' ?> button-container-bi"></i>
                                                            </button>
                                                        </form>
                                                        <form action="../../../controllers/shows/shows.php" method="get" class="m-0">
                                                            <input type="hidden" name="id" value="<?= $moviespage2[$j]['id'] ?>">                                        
                                                            <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                                                <i class="bi bi-info-circle-fill button-container-bi"></i>
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
                <h3 class="text-white">Trending Series</h3>
                <button class="btn btn-link" onclick="showSerieCarousel()">
                    <i class="bi bi-plus-circle outlines heading-bi"></i> 
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
                        <div class="container mb-5 pt-4 shows-placeholder w-100">
                            <?php
                            // Loop through shows and group them into rows of 4
                            for ($i = 0; $i < count($seriespage1); $i += 4): ?>
                                <div class="row">
                                    <?php
                                    // Loop for each row of 4 shows
                                    for ($j = $i; $j < $i + 4 && $j < count($seriespage1); $j++): ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="image-container d-flex">
                                                <img src="../../../<?= $seriespage1[$j]['poster_path'] ?>" alt="<?= $seriespage1[$j]['title'] ?>" class="img-fluid">
                                                <div class="show-details">
                                                    <h6 class="show-details-h6"><?= $seriespage1[$j]['title'] ?></h6>
                                                    <div class="button-container">
                                                        <?php $showInLibrary = false; 
                                                            foreach ($myShows as $show): 
                                                                if ($show['show_id'] == $seriespage1[$j]['id']) {
                                                                    $showInLibrary = true;
                                                                    break;
                                                                }
                                                        endforeach;?>
                                                        <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data" class="m-0">
                                                            <?php if (!$showInLibrary): ?>
                                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                            <?php endif; ?>
                                                            <input type="hidden" name="show_id" value="<?= $seriespage1[$j]['id'] ?>">
                                                            <button type="submit" name="<?= $showInLibrary ? 'removeMyShow' : 'addShow' ?>" class="outlines button-transparent p-0">
                                                                <i class="<?= $showInLibrary ? 'bi bi-dash-circle-fill' : 'bi bi-plus-circle-fill' ?> button-container-bi"></i>
                                                            </button>
                                                        </form>
                                                        <form action="../../../controllers/shows/shows.php" method="get" class="m-0">
                                                            <input type="hidden" name="id" value="<?= $seriespage1[$j]['id'] ?>">                                        
                                                            <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                                                <i class="bi bi-info-circle-fill button-container-bi"></i>
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
                        <div class="container mb-5 pt-4 shows-placeholder">
                            <?php
                            // Loop through shows and group them into rows of 4
                            for ($i = 0; $i < count($seriespage2); $i += 4): ?>
                                <div class="row">
                                    <?php
                                    // Loop for each row of 4 shows
                                    for ($j = $i; $j < $i + 4 && $j < count($seriespage2); $j++): ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="image-container d-flex">
                                                <img src="../../../<?= $seriespage2[$j]['poster_path'] ?>" alt="<?= $seriespage2[$j]['title'] ?>" class="img-fluid">
                                                <div class="show-details">
                                                    <h6 class="show-details-h6"><?= $seriespage2[$j]['title'] ?></h6>
                                                    <div class="button-container">
                                                        <?php $showInLibrary = false; 
                                                            foreach ($myShows as $show): 
                                                                if ($show['show_id'] == $seriespage2[$j]['id']) {
                                                                    $showInLibrary = true;
                                                                    break;
                                                                }
                                                        endforeach;?>
                                                        <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data" class="m-0">
                                                            <?php if (!$showInLibrary): ?>
                                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                            <?php endif; ?>
                                                            <input type="hidden" name="show_id" value="<?= $seriespage2[$j]['id'] ?>">
                                                            <button type="submit" name="<?= $showInLibrary ? 'removeMyShow' : 'addShow' ?>" class="outlines button-transparent p-0">
                                                                <i class="<?= $showInLibrary ? 'bi bi-dash-circle-fill' : 'bi bi-plus-circle-fill' ?> button-container-bi"></i>
                                                            </button>
                                                        </form>
                                                        <form action="../../../controllers/shows/shows.php" method="get" class="m-0">
                                                            <input type="hidden" name="id" value="<?= $seriespage2[$j]['id'] ?>">                                        
                                                            <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                                                <i class="bi bi-info-circle-fill button-container-bi"></i>
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


    
<?php include_once __DIR__ . '/../../../templates/footer.php'; ?>