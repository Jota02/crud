<?php

require_once __DIR__ . '/../../infra/repositories/showRepository.php';

function viewShowById($id)
{
    $show = getShowById($id);
    
    if ($show) {
        // Redirect to a page to display the show details
        $params = '?' . http_build_query($show);
        header('Location: /path_to_show_page.php' . $params);  // Adjust the path to your show page
        exit;
    } else {
        // Handle the case when the show is not found
        $_SESSION['errors'] = ['Show not found!'];
        header('Location: /path_to_error_page.php');  // Adjust the path to your error page
        exit;
    }
}



?>
