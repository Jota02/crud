<?php
// Include necessary files and start sessions if needed
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Movie Details';

include_once __DIR__ . '/../../../templates/navbar.php';

// Include necessary files and setup
require_once __DIR__ . '/../../../controllers/shows/shows.php'; // Adjust the path as necessary

?>

<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>
