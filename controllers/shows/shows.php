<?php

require_once __DIR__ . '/../../infra/repositories/showRepository.php';


if (isset($_GET['submitMovieDetails'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        movieDetails($id);
    }
}
if (isset($_GET['submitSerieDetails'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        serieDetails($id);
    }
}


function movieDetails($id)
{
    $show = getShowById($id);

    if ($show) {
        $categories = getShowCategoriesById($id);
        $type = getShowTypeById($id);
        $show['categories'] = $categories;
        $show['type'] = $type;


        $params = '?' . http_build_query($show);
        header('Location: /crud/pages/secure/discover/movie_details.php' . $params);
        exit;
    } else {
        $_SESSION['errors'] = ['Show not found!'];
        header('Location: /crud/pages/secure/discover/index.php');
        exit;
    }
}

function serieDetails($id)
{
    $show = getShowById($id);

    if ($show) {
        $categories = getShowCategoriesById($id);
        $type = getShowTypeById($id);
        $show['categories'] = $categories;
        $show['type'] = $type;


        $params = '?' . http_build_query($show);
        header('Location: /crud/pages/secure/discover/series_details.php' . $params);
        exit;
    } else {
        $_SESSION['errors'] = ['Show not found!'];
        header('Location: /crud/pages/secure/discover/index.php');
        exit;
    }
}


?>
