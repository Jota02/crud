<?php

require_once __DIR__ . '/../../infra/repositories/showRepository.php';


if (isset($_GET['submitShowDetails'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        viewShowById($id);
    }
}

function viewShowById($id)
{
        $show = getShowById($id);
        
        if ($show) {

            $params = '?' . http_build_query($show);
            header('Location: /crud/pages/secure/discover/show_details.php' . $params);
            exit;
        } else {
            // Handle the case when the show is not found
            $_SESSION['errors'] = ['Show not found!'];
            header('Location: /crud/pages/secure/dicover/index.php');  // Adjust the path to your error page
            exit;
        }
}



?>
