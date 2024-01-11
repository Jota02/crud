<?php

require_once __DIR__ . '/../../infra/repositories/showRepository.php';


if (isset($_GET['getShowDetails'])) {
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
if (isset($_POST['submitReview'])) {
    $review = array(
        'id_user' => $_POST['id_user'],
        'id_show' => $_POST['id_show'],
        'comment' => $_POST['comment'],
        'rating' => $_POST['rating'],
        'attachments' => $_FILES['attachments']
    );
        if (!empty($review)) {
            crReview($review); 
        }else{
            header('Location: /crud/pages/secure/my_shows/index.php');
        }
}

function crReview($review){
    $success = createReview($review);

    if ($success) {
        $_SESSION['success'] = 'Review created successfully!';
        showDetails($review['id_show']);
    }else {
        $_SESSION['errors'] = ['Error creating the review!'];
        header('Location: /crud/pages/secure/index.php');
        exit;
    }

}


function showDetails($id)
{
    $show['id'] = $id;

    if ($show) {
        $categories = getShowCategoriesById($id);
        $type = getShowTypeById($id);
        $show['categories'] = $categories;
        $show['type'] = $type;
        $params = '?' . http_build_query($show);
        
        header('Location: /crud/pages/secure/discover/show_details.php' . $params);
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
