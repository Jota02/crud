<?php
// Include necessary files and start sessions if needed
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../controllers/shows/shows.php'; 

$title = ' - Search-Results';
$searchInput = isset($_REQUEST['searchInput']) ? $_REQUEST['searchInput'] : 'Balls';
$searchResultsJson = isset($_REQUEST['searchResults']) ? $_REQUEST['searchResults'] : '';
$searchResultsJsonDecoded = urldecode($searchResultsJson);
$searchResults = json_decode($searchResultsJsonDecoded, true);

include_once __DIR__ . '/../../../templates/navbar.php';
?>


<!-- Content -->
<div class="container" style="min-height: 100vh">
    <div class="d-flex flex-column main-margin">
        <div class="d-flex mb-5 align-items-center">
            <i class="bi bi-search search-icon me-3"></i>
            <h1 class="text-white m-0">Search -> "<?= $searchInput ?>"</h1>    
        </div>
        <div class="heading">
            <h3 class=" ms-3 text-white text-center">Shows</h3>
        </div>
        <div class="show-list mt-4">
            <div class="list-group">
                <?php foreach ($searchResults as $result): ?>
                    <form action="/crud/controllers/shows/shows.php" method="get">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($result['id']) ?>">
                        <button type="submit" name="submitShowDetails" class="button-transparent p-0 w-100">     
                            <div class="list-group-item list-group-item-action list-group-item-dark search-results">
                                <div class="d-flex flex-row align-items-center text-white">
                                    <img src="\crud\<?= htmlspecialchars($result['poster_path'])?>" class="rounded border"  alt="movie_poster"/>
                                    <div class="d-flex flex-column ms-3 align-items-start">                                           
                                        <h4 class="text-white"><?= htmlspecialchars($result['title']) ?></h4>
                                        <p class="m-0 fs-5"><?= htmlspecialchars($result['release_year'])?></p>
                                        <p class="m-0 fs-5"><?= htmlspecialchars($result['rating']) ?>/10</p> 
                                    </div>   
                                </div>
                            </div>
                        </button>
                    </form> 
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>