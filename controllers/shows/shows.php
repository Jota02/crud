<?php

require_once __DIR__ . '/../../infra/repositories/showRepository.php';
@require_once __DIR__ . '/../../helpers/session.php';

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
            header('Location: ../../pages/secure/discover/index.php');
        }
    }
}
if (isset($_POST['submitReview'])) {
    $review = array(
        'id_user' => $_POST['id_user'],
        'id_show' => $_POST['id_show'],
        'comment' => $_POST['comment'],
        'rating' => $_POST['rating']
    );

    $review['attachments'] = saveAttachment();

    if (!empty($review)) {
        createReview($review); 
    }else{
        header('Location: ../../pages/secure/my_shows/index.php');
    }
}
if (isset($_POST['shareContent'])) {
    $shared = array(
        'sender_id' => $_POST['sender_id'],
        'destination_id' => $_POST['destination_id'],
        'show_id' => $_POST['show_id']
    );
        if (!empty($shared)) {
            createSharedContent($shared); 
        }else{
            header('Location: ../../pages/secure/my_shows/index.php');
        }
}
if (isset($_POST['removeShared'])) {
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        if (!empty($id)) {
            removeShared($id);
        }else{
            header('Location: ../../pages/secure/home/index.php');
        }
    }     
}
if (isset($_POST['removeReview'])) {
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        if (!empty($id)) {
            removeReview($id);
        }else{
            header('Location: ../../pages/secure/home/index.php');
        }
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
            header('Location: ../../pages/secure/home/index.php');
        }
}
if (isset($_POST['removeMyShow'])) {
    if (isset($_POST['show_id'])){
        $id = $_POST['show_id'];
        if (!empty($id)) {
            removeMyShow($id);
        }else{
            header('Location: ../../pages/secure/home/index.php');
        }
    }     
}
if (isset($_POST['scheduleShow'])) {
    $show = array(
        'calendar_date' => $_POST['calendar_date'],
        'show_id' => $_POST['show_id']
    );
    if (!empty($show)) {
        scheduleShow($show);
    }else{
        header('Location: ../../pages/secure/home/index.php');
    }
}

function saveAttachment() {
    $fileName = $_FILES['attachments']['name'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $newName = uniqid('attachments_') . '.' . $extension;
    $path = __DIR__ . '/../../assets/images/uploads/review_attachment/';
    $file = $path . $newName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['attachments']['tmp_name'], $file)) {
        return $newName;
    }
}



function createReview($review){

    $success = insertUserReview($review);

    if ($success) {
        $_SESSION['success'] = 'Review created successfully!';
        getDetails($review['id_show']);
    }else {
        $_SESSION['errors'] = 'Error creating the review!';
        getDetails($review['id_show']);
        exit;
    }

}

function createSharedContent($shared){
    $success = insertSharedContent($shared);

    if ($success) {
        $_SESSION['success'] = 'Content shared successfully!';
        header('Location: ../../pages/secure/my_shows/index.php');
    }else {
        $_SESSION['errors'] = 'Error sharing the content!';
        header('Location: ../../pages/secure/my_shows/index.php');
        exit;
    }

}

function createUserShow($show){
    $success = insertUserShow($show);

    if ($success) {
        $_SESSION['success'] = 'Show added to your library successfully!';
        header('location: ../../pages/secure/discover/index.php');
    }else {
        $_SESSION['errors'] = 'Error adding the show!';
        header('location: ../../pages/secure/discover/index.php');
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

        header('Location: ../../pages/secure/discover/show_details.php' . $params);
        exit;

    } else {
        $_SESSION['errors'] = 'Show not found!';
        header('Location: ../../pages/secure/discover/index.php');
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
        header('Location: ../../pages/secure/discover/search_results.php' . $params);
        exit;
    } else {
        $_SESSION['errors'] = 'No shows found for the search query!';
        header('Location: ../../pages/secure/home/index.php');
        exit;
    }
}

function removeMyShow($id){
    $success = deleteMyShow($id);

    if ($success) {
        $_SESSION['success'] = 'Show successfully removed from your library!';
        header('Location: ../../pages/secure/discover/index.php');
    }else {
        $_SESSION['errors'] = 'Error adding the show!';
        header('Location: ../../pages/secure/my_shows/index.php');
        exit;
    }
}

function removeShared($id){
    $success = deleteMyShared($id);

    if ($success) {
        $_SESSION['success'] = 'Shared show successfully removed from your library!';
        header('Location: ../../pages/secure/my_shows/index.php');
    }else {
        $_SESSION['errors'] = 'Error removing the shared show!';
        header('Location: ../../pages/secure/my_shows/index.php');
        exit;
    }
}

function removeReview($id){
    $success = deleteReview($id);

    if ($success) {
        $_SESSION['success'] = 'Review successfully deleted!';
        header('Location: ../../pages/secure/discover/index.php');
    }else {
        $_SESSION['errors'] = 'Error removing the shared show!';
        header('Location: ../../pages/secure/discover/index.php');
        exit;
    }
}

function scheduleShow($show){
    $success = updateShow($show);

    if ($success) {
        $_SESSION['success'] = 'Show successfully scheduled!';
        header('Location: ../../pages/secure/show_time/index.php');
    }else {
        $_SESSION['errors'] = ['Error schedulling the show!'];
        header('Location: ../../pages/secure/show_time/index.php');
        exit;
    }
}

?>