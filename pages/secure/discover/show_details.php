<?php
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

$user = user();
$show = getShowById(isset($_REQUEST['id']) ? $_REQUEST['id'] : 0);
$myShows = getMyShows($user['id']);

$id = isset($show['id']) ? $show['id'] : '0';
$title = isset($show['title']) ? $show['title'] : 'undefined';
$release_year = isset($show['release_year']) ? $show['release_year'] : 0000;
$end_year = isset($show['end_year']) ? $show['end_year'] : '?';
$seasons = isset($show['seasons']) ? $show['seasons'] : 0;
$age = isset($show['age']) ? $show['age'] : 0000;
$ageColorClass = isset($ageColors[$age]) ? $ageColors[$age] : 'text-white';
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '?';
$poster_path = isset($show['poster_path']) ? $show['poster_path'] : null;
$description =  isset($show['description']) ? $show['description'] : 'undefined';
$trailer = isset($show['trailer']) ? $show['trailer'] : null;
$rating = isset($show['rating']) ? $show['rating'] : 0;
$reviews = getUserReviews(isset($_REQUEST['id']) ? $_REQUEST['id'] : 0);
$user = user();

$ratingValue = floatval($rating);
if ($ratingValue > 6.9) {
    $ratingColorClass = 'text-success';
} elseif ($ratingValue < 5.0) {
    $ratingColorClass = 'text-danger';
} else {
    $ratingColorClass = 'text-warning';
}

$showInLibrary = false; 
foreach ($myShows as $myShow) {
    if ($myShow['show_id'] == $id) {
        $showInLibrary = true;
        break;
    }
}

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
        <!-- Content -->
        <div class="container main-margin" style="min-height: 100vh">
            <div class="text-white d-flex flex-column">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h1><?= $title ?></h1>
                    <?php if($showInLibrary): ?>
                        <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="show_id" value="<?= $id ?>">
                            <input type="date" name="calendar_date">                                        
                            <button type="submit" name="scheduleShow" class="outlines button-transparent p-0">
                                <i class="bi bi-caret-right-fill"></i>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="d-flex flex-row">
                    <h6>
                        <?= $release_year ?> 
                        <?php if ($type == 'serie'): ?>
                            | <?= $end_year ?> 
                            - 
                            Seasons: <?= $seasons ?>
                        <?php endif; ?>
                        - 
                        <span class="<?= $ageColorClass ?>">
                            <?= $age ?>
                        </span>
                        -
                        <span class="text-uppercase"><?= $type ?></span>
                    </h6>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="d-flex flex-column">
                    <img src="../../../<?= $poster_path ?>" class="img-fluid rounded" alt="movie_poster"/>     
                    <div class="d-flex align-items-center justify-content-center mt-5">
                        <i class="bi bi-star-fill rating-icon"></i>
                        <h3 class="text-white"><span class="<?= $ratingColorClass ?>"><?= $rating ?></span>/10</h3>
                    </div>
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <a href="../share_list/index.php?show_id=<?= $id ?>" class="text-info fs-5">Share</a>
                        <i class="bi bi-share-fill text-white ms-2"></i>
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
            <div class="heading mt-5">
                <h3 class=" ms-3 text-white text-center">Reviews</h3>
            </div>
            <div class="mt-2 mb-4">
                <div class="list-group">
                    <?php foreach ($reviews as $review):    
                        $ratingValue = floatval($review['rating']);
                        if ($ratingValue > 6.9) {
                            $ratingColorClass = 'text-success';
                        } elseif ($ratingValue < 5.0) {
                            $ratingColorClass = 'text-danger';
                        } else {
                            $ratingColorClass = 'text-warning';
                        }
                    ?>  
                        <div class="list-group-item list-group-item-dark search-results text-white">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column" style="max-width: 500px;">
                                    <h5 class="m-0">Username: <?= $review['userName'] ?></h5>                                       
                                    <p class="m-0 fs-6 w-50" style="word-wrap: break-word;">><?= $review['comment'] ?></p>
                                    <div class="d-flex flex-row align-items-center">
                                        <i class="bi bi-star-fill" style="color: yellow;"></i>
                                        <p class="m-0 fs-6><span class="<?= $ratingColorClass ?>><?= $review['rating'] ?></span>/10</p> 
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <?php if (isset($review['attachments']) && !empty($review['attachments'])): ?>
                                        <img src="../../../assets/images/uploads/review_attachment/<?= $review['attachments'] ?>" class="rounded border" alt="attatchemnt">      
                                    <?php endif; ?>
                                    <?php if($user['administrator'] == 1 || $user['id'] == $review['id_user']): ?>
                                        <div class="ms-4">
                                            <form action="../../../controllers/shows/shows.php" method="post">
                                                <input type="hidden" name="id" value="<?= $review['id'] ?>">                                        
                                                <button type="submit" name="removeReview" class="btn btn-danger">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form> 
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>                                   
                        </div>
                    <?php endforeach; ?>
                </div>

                
                <div class="heading mt-5">
                    <h3 class=" ms-3 text-white text-center">Tell us what you think about this show!</h3>
                </div>
                <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data" class="search-results rounded-bottom-1 text-white px-4 d-flex flex-column">
                    <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                    <input type="hidden" name="id_show" value="<?= isset($_REQUEST['id']) ? $_REQUEST['id'] : 0 ?>">
                    
                    <div class="form-group w-100 mt-2">
                        <label for="comment">Comment:</label>
                        <input type="text" class="form-control form-input-styles" name="comment" maxlength="150" placeholder="What did you think of the show?" required></textarea>
                    </div>
                    
                    <div class="d-flex flex-row w-100">
                        <div class="form-group w-75 me-5">
                            <label for="rating">Rating:</label>
                            <input type="number" step="0.1" class="form-control form-input-styles" name="rating" min="1" max="10" placeholder="Rate the show ?/10" required>
                        </div>
                        
                        <div class="form-group w-75 ms-5">
                            <label for="attachments">Attachments:</label>
                            <input type="file" class="form-control form-input-styles" name="attachments">
                        </div>
                    </div>
                    
                    <div class="d-flex my-2 flex-row-reverse">
                        <button type="submit" name="submitReview" class="btn btn-info">Submit Review</button>
                    </div>               
                </form>
            </div>
        </div>


        <?php
        include_once __DIR__ . '../../../../templates/footer.php';
        ?>