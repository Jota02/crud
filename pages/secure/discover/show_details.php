<?php
// Include necessary files and start sessions if needed
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Movie Details';

include_once __DIR__ . '/../../../templates/navbar.php';

// Include necessary files and setup
require_once __DIR__ . '/../../../controllers/shows/shows.php'; // Adjust the path as necessary

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $show = getShowById($id); // Fetch the show details based on the ID
    
    // Now, you can display the movie details using the $show variable
    if ($show) {
        echo '<h1>' . htmlspecialchars($show['title']) . '</h1>';
        // Display other movie details as necessary
    } else {
        echo '<p>Error: Movie details not found.</p>';
    }
} else {
    echo '<p>Error: Movie ID not provided.</p>';
}
?>


<!-- Content -->
<div class="movie-details-page-styles" style="min-height: 100vh;">
    <div class="container py-3">  
        <main class="movie-details-wrapper text-white">
            <div class="movie-details-style">
                <section>
                    <?php if ($show): ?>
                        <h1 class="mb-3 fw-normal text-center"><?= htmlspecialchars($show['title']) ?></h1>
                        <!-- Display movie details here using $show array -->
                        <div class="movie-details-info">
                            <p>Description: <?= htmlspecialchars($show['description']) ?></p>
                            <!-- Add more details as necessary -->
                        </div>
                    <?php else: ?>
                        <p>Error: Movie details not found.</p>
                    <?php endif; ?>
                </section>
            </div>
        </main>
    </div>
</div>


<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>
