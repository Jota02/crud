<?php
require_once __DIR__ . '/../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$user = user();
$title = '- App';
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
        <!--content-->
        <div class="d-flex justify-content-center align-items-center home-cover" style="min-height: 100vh;">
            <div class="container py-3 d-flex flex-column justify-content-center align-items-center welcome w-75">  
                    <h1 class="display-5 fw-bold">Hello
                        <?= $user['name'] ?? null ?>!
                    </h1>
                    <p class="fs-4">What are we watching today?</p>
            </div>
        </div>
        <?php include_once __DIR__ . '/../../../templates/footer.php'; ?>

