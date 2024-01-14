<?php
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../controllers/shows/shows.php'; 

$title = ' - Search-Results';
$searchInput = isset($_REQUEST['searchInput']) ? $_REQUEST['searchInput'] : 'Balls';
$searchResultsJson = isset($_REQUEST['searchResults']) ? $_REQUEST['searchResults'] : '';
$searchResultsJsonDecoded = urldecode($searchResultsJson);
$searchResults = json_decode($searchResultsJsonDecoded, true);
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
        <div class="container" style="min-height: 100vh">
            <div class="d-flex flex-column main-margin">
                <div class="d-flex py-5 justify-content-center search-bar w-100">
                    <form action="../../../controllers/shows/shows.php" method="get" class="d-flex w-100 justify-content-center">
                        <div class="input-group search-bar-size w-100">
                            <input type="text" name="searchInput" class="form-control" placeholder="Search for shows..." maxlength="255">
                            <button type="submit" name="submitSearch" class="btn btn-default">
                                <i class="bi bi-search search-icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-5 align-items-center">
                    <i class="bi bi-search search-icon me-3"></i>
                    <h1 class="text-white m-0">Search -> "<?= $searchInput ?>"</h1>    
                </div>
                <div class="heading">
                    <h3 class=" ms-3 text-white text-center">Search Results</h3>
                </div>
                <div class="mt-3 mb-5">
                    <div class="list-group">
                        <?php foreach ($searchResults as $result): 
                                $show = getShowById($result['id'])    
                        ?>
                            <form action="../../../controllers/shows/shows.php" method="get">
                                <input type="hidden" name="id" value="<?= $show['id'] ?>">
                                <button type="submit" name="getShowDetails" class="button-transparent p-0 w-100">     
                                    <div class="list-group-item list-group-item-action list-group-item-dark search-results">
                                        <div class="d-flex flex-row align-items-center text-white">
                                            <img src="\crud\<?= $show['poster_path'] ?>" class="rounded border"  alt="movie_poster"/>
                                            <div class="d-flex flex-column ms-3 align-items-start">                                           
                                                <h4 class="text-white"><?= $show['title'] ?></h4>
                                                <p class="m-0 fs-5"><?= $show['release_year'] ?></p>
                                                <p class="m-0 fs-5"><?= $show['rating'] ?>/10</p> 
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