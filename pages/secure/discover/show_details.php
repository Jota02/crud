<?php
// Include necessary files and start sessions if needed
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Movie Details';

include_once __DIR__ . '/../../../templates/navbar.php';

// Include necessary files and setup
require_once __DIR__ . '/../../../controllers/shows/shows.php'; // Adjust the path as necessary

?>


<!-- Content -->
<div class="movie-details-page-styles" style="min-height: 100vh;">
    <div class="container py-3">  
        <main class="movie-details-wrapper text-white">
            <div class="movie-details-style">
                <section>
                    <h1 class="mb-3 fw-normal text-center"><?= isset($_REQUEST['title']) ? $_REQUEST['title'] : null ?></h1>
                    <div class="movie-details-info">
                        <p>Description: <?= isset($_REQUEST['description']) ? $_REQUEST['description'] : null ?></p>
                    </div>
                </section>
            </div>
        </main>
    </div>
</div>


<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>
