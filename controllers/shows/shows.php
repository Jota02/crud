<?php

require_once __DIR__ . '/../../infra/repositories/showRepository.php';


if (isset($_GET['submitShowDetails'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        showDetails($id);
    }
}
if (isset($_GET['submitSearch'])) { 
    if (isset($_GET['searchInput'])) { 
        $searchInput = trim($_GET['searchInput']);

        if (!empty($searchInput)) {
            searchShows($searchInput); 
        }
        else{
            header('Location: /crud/pages/secure/discover/index.php');
        }
    }
}



function showDetails($id)
{
    $show = getShowById($id);

    if ($show) {
        $categories = getShowCategoriesById($id);
        $type = getShowTypeById($id);
        $show['categories'] = $categories;
        $show['type'] = $type;
        $params = '?' . http_build_query($show);

        if ($type === "movie") {
            header('Location: /crud/pages/secure/discover/movie_details.php' . $params);
        }
         elseif ($type === "serie") {
            header('Location: /crud/pages/secure/discover/series_details.php' . $params);
         }
        
        exit;
    } else {
        $_SESSION['errors'] = ['Show not found!'];
        header('Location: /crud/pages/secure/discover/index.php');
        exit;
    }
}

function searchShows($searchInput)
{
    $searchResults = getSearchedShows($searchInput);
    
    if ($searchResults) {
        $searchResultsJson = json_encode($searchResults);

        $params = '?searchResults=' . urlencode($searchResultsJson);
        $params .= '&searchInput=' . urlencode($searchInput);
        header('Location: /crud/pages/secure/discover/search_results.php' . $params);
        exit;
    } else {
        $_SESSION['errors'] = ['No shows found for the search query!'];
        header('Location: /crud/pages/secure/index.php');
        exit;
    }
}

?>
