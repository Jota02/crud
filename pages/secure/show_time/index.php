<?php
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../controllers/shows/shows.php';

$title = ' - My Shows';
$user = user();
$events = getEvents($user['id']);
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../../assets/images/uploads/logo.png">
        <title>HomeCinema</title>

        <link rel="stylesheet" type="text/css" href="../../../assets/css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    </head>
    <body>
        <?php include_once __DIR__ . '/../../../templates/navbar.php'; ?>
        <!-- Content -->
        <div class="main-margin">
            <?php
                if (isset($_SESSION['success']))  {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    echo $_SESSION['success'] . '<br>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    echo $_SESSION['errors'] . '<br>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['errors']);
                }
            ?>
        </div>
        <div class="d-flex flex-column align-items-center" style="min-height: 100vh">
            <div class="container">
                <div class="heading">
                    <h3 class=" ms-3 text-white text-center">What's Next?</h3>
                </div>
                <?php if(empty($events)): ?>
                    <div class="text-white d-flex flex-column align-items-center justify-content-center shows-placeholder">
                        <h2>You have 0 ShowTime sessions planned!</h2>
                        <p class="fs-4">Click <a href="../../../pages/secure/my_shows/index.php" class="text-info">here</a> to schedule some!</p>
                    </div>
                <?php else: ?>
                    <div class="mt-3 mb-5 w-100">
                        <div class="list-group">
                            <?php foreach ($events as $event): ?>
                                <div class="list-group-item list-group-item-dark search-results">
                                    <div class="d-flex flex-row align-items-center justify-content-between text-white">
                                        <img src="../../../<?= $event['poster_path'] ?>" class="rounded border search-results-img"  alt="movie_poster"/>                                 
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
            
        <?php include_once __DIR__ . '../../../../templates/footer.php'; ?>
