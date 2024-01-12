<?php

require_once __DIR__ . '/../../infra/repositories/showRepository.php';


if (isset($_GET['getShowDetails'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        getDetails($id);
    }
}
if (isset($_GET['submitSearch'])) { 
    if (isset($_GET['searchInput'])) { 
        $searchInput = trim($_GET['searchInput']);

        if (!empty($searchInput)) {
            getShows($searchInput); 
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
            createReview($review); 
        }else{
            header('Location: /crud/pages/secure/my_shows/index.php');
        }
}
if (isset($_POST['addShow'])) {
    $show = array(
        'user_id' => $_POST['user_id'],
        'show_id' => $_POST['show_id']
    );
        if (!empty($show)) {
            createUserShow($show); 
        }else{
            header('Location: /crud/pages/secure/index.php');
        }
}
if (isset($_POST['removeMyShow'])) {
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        removeMyShow($id);
    }
        
}

function createReview($review){
    $success = insertUserReview($review);

    if ($success) {
        $_SESSION['success'] = 'Review created successfully!';
        getDetails($review['id_show']);
    }else {
        $_SESSION['errors'] = ['Error creating the review!'];
        getDetails($review['id_show']);
        exit;
    }

}

function createUserShow($show){
    $success = insertUserShow($show);

    if ($success) {
        $_SESSION['success'] = 'Show added to your library successfully!';
        header('Location: /crud/pages/secure/discover/index.php');
    }else {
        $_SESSION['errors'] = ['Error adding the show!'];
        header('Location: /crud/pages/secure/index.php');
        exit;
    }
}

function getDetails($id)
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

function getShows($searchInput)
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

function removeMyShow($id){
    $success = deleteMyShow($id);

    if ($success) {
        $_SESSION['success'] = 'Show removed from your library successfully!';
        header('Location: /crud/pages/secure/my_shows/index.php');
    }else {
        $_SESSION['errors'] = ['Error adding the show!'];
        header('Location: /crud/pages/secure/my_shows/index.php');
        exit;
    }
}

?>
