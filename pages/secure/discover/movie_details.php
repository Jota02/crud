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

$show = getShowById(isset($_REQUEST['id']) ? $_REQUEST['id'] : 0);

$title = isset($show['title']) ? $show['title'] : 'undefined';
$release_year = isset($show['release_year']) ? $show['release_year'] : 0000;
$age = isset($show['age']) ? $show['age'] : 0000;
$ageColorClass = isset($ageColors[$age]) ? $ageColors[$age] : 'text-white';
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '?';
$poster_path = isset($show['poster_path']) ? $show['poster_path'] : null;
$description =  isset($show['description']) ? $show['description'] : 'undefined';
$trailer = isset($show['trailer']) ? $show['trailer'] : null;
$rating = isset($show['rating']) ? $show['rating'] : 0;

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
                <h6 class="text-uppercase">
                    <?= $release_year ?> 
                    - 
                    <span class="<?= $ageColorClass ?>">
                        <?= $age ?>
                    </span>
                    -
                    <?= $type ?>
                </h6>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="d-flex flex-column">
                <img src="\crud\<?= $poster_path ?>" class="img-fluid rounded" alt="movie_poster"/>     
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <i class="bi bi-star-fill rating-icon"></i>
                    <h3 class="text-white"><span class="<?= $ratingColorClass ?>"><?= $rating ?></span>/10</h3>
                </div>
            </div>
            <div class="d-flex flex-column ms-5 w-75 justify-content-around">
                <div class="container-fluid text-white">
                    <h3 class="text-justify">Summary</h3>
                    <p class="text-justify fs-5"><?= $description ?></p>
                </div>
                <div class="d-flex justify-content-center h-100 mb-3 align-items-center">
                    <div class="spinner-border text-danger position-absolute " role="status"></div>
                    <div class="ratio ratio-21x9">
                        <iframe class="h-100 iframe-content" src="<?= $trailer ?>" allowfullscreen></iframe>
                    </div>
                </div>
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