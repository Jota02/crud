<?php
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../controllers/shows/shows.php';

$title = ' - My Shows';

include_once __DIR__ . '/../../../templates/navbar.php';

$user = user();
$events = getEvents($user['id']);


?>

<!-- Content -->
<div class="d-flex flex-column align-items-center main-margin" style="min-height: 100vh">
    <div class="container w-75">
        <div class="heading">
            <h3 class=" ms-3 text-white text-center">What's Next?</h3>
        </div>
        <?php if(empty($events)): ?>
            <div class="text-white d-flex flex-column align-items-center justify-content-center shows-placeholder">
                    <h2>You have 0 ShowTime sessions planned!</h2>
                    <p class="fs-4">Click <a href="/crud/pages/secure/my_shows/index.php" class="text-info">here</a> to schedule some!</p>
                </div>
            </div>
        <?php else: ?>
            <div class="mt-3 mb-5 w-100">
                <div class="list-group">
                    <?php foreach ($events as $event): ?>
                        <div class="list-group-item list-group-item-dark search-results">
                            <div class="d-flex flex-row align-items-center justify-content-between text-white">
                                <img src="\crud\<?= $event['poster_path'] ?>" class="rounded border"  alt="movie_poster"/>                                 
                                <h4 class="text-white"><?= $event['title'] ?></h4>
                                <p class="m-0 fs-5"><?= $event['calendar_date'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
    
<div class="mt-5"></div>
    
<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>
