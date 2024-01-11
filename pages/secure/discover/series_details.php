<?php
// Include necessary files and start sessions if needed
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../controllers/shows/shows.php'; 

$categoryColors = [
    'Action' => 'bg-danger',
    'Adventure' => 'text-bg-warning',
    'Comedy' => 'bg-success',
    'Drama' => 'bg-primary',
    'Fantasy' => 'text-bg-info',
    'Horror' => 'text-bg-warning',
    'Thriller' => 'bg-secondary',
    'Romance' => 'bg-danger',
    'Sci-Fi' => 'bg-primary',
    'History' => 'bg-secondary',
    'Crime' => 'text-bg-light',
    'Western' => 'text-bg-warning',
    'Animation' => 'bg-success'
    
];
$ageColors = [
    'M/6' => 'text-success',
    'M/12' => 'text-success',
    'M/14' => 'text-primary',
    'M/16' => 'text-warning',
    'M/18' => 'text-danger',
];

$title = isset($_REQUEST['title']) ? $_REQUEST['title'] : 'undefined';
$release_year = isset($_REQUEST['release_year']) ? $_REQUEST['release_year'] : '?';
$end_year = isset($_REQUEST['end_year']) ? $_REQUEST['end_year'] : '?';
$age = isset($_REQUEST['age']) ? $_REQUEST['age'] : 0;
$ageColorClass = isset($ageColors[$age]) ? $ageColors[$age] : 'text-white';
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '?';
$seasons = isset($_REQUEST['seasons']) ? $_REQUEST['seasons'] : 0;
$poster_path = isset($_REQUEST['poster_path']) ? $_REQUEST['poster_path'] : null;
$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : ' ';
$trailer = isset($_REQUEST['trailer']) ? $_REQUEST['trailer'] : null;
$rating = isset($_REQUEST['rating']) ? $_REQUEST['rating'] : 0;

$ratingValue = floatval($rating);
if ($ratingValue > 6.9) {
    $ratingColorClass = 'text-success';
} elseif ($ratingValue < 5.0) {
    $ratingColorClass = 'text-danger';
} else {
    $ratingColorClass = 'text-warning';
}

include_once __DIR__ . '/../../../templates/navbar.php';
?>


<!-- Content -->
<div class="container" style="min-height: 100vh">
    <div class="d-flex flex-column main-margin">
        <div class="text-white">
            <h1><?= $title ?></h1>
            <div class="d-flex flex-row">
                <h6>
                    <?= $release_year ?> | <?= $end_year ?>
                    - 
                    <span class="<?= $ageColorClass ?>">
                        <?= $age ?>
                    </span>
                    -
                    <span class="text-uppercase"><?= $type ?></span>
                    -
                    Seasons: <?= $seasons ?>
                </h6>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="d-flex flex-column justify-content-around">
            <img src="\crud\<?= $poster_path ?>" class="img-fluid rounded" alt="movie_poster"/>     
                <div class="d-flex align-items-center justify-content-center text-white">
                    <i class="bi bi-star-fill rating-icon"></i>
                    <h3><span class="<?= $ratingColorClass ?>"><?= $rating ?></span>/10</h3>
                </div>
            </div>
            <div class="d-flex flex-column ms-5 w-75 justify-content-around">
                <div class="container-fluid text-white">
                    <h3 class="text-justify">Summary</h3>
                    <p class="text-justify fs-5"><?= $description ?></p>
                </div>
                <?php 
                    if($trailer){
                        echo'<div class="d-flex justify-content-center h-100 mb-3">';
                        echo'<div class="ratio ratio-21x9">';
                        echo'<iframe class="h-100" src="'. $trailer .'" allowfullscreen></iframe>';
                        echo'</div>';
                        echo'</div>';
                    }
                ?>
                <div class="d-flex align-items-center justify-content-around">
                    <?php
                        if (isset($_REQUEST['categories'])) {
                            $categoriesArray = explode(',', $_REQUEST['categories']);

                            foreach ($categoriesArray as $category) {
                                $category = trim($category);
                                $colorClass = isset($categoryColors[$category]) ? $categoryColors[$category] : 'text-bg-dark';
                                echo '<h4><span class="badge rounded-pill ' . $colorClass . '">' . htmlspecialchars($category) . '</span></h4>';
                            }
                        }
                    ?>    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>