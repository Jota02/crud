<?php
require_once __DIR__ . '/../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$user = user();
$title = '- App';
$users = getAll();
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
        <div class="container" style="min-height: 100vh">
            <div class="d-flex flex-column main-margin">
                <div class="heading">
                    <h3 class=" ms-3 text-white text-center">Users</h3>
                </div>
                <div class="mt-3 mb-5">
                    <div class="list-group">
                        <?php foreach ($users as $destination): 
                            $destinationPhotoPath =  "../../../assets/images/uploads/user_photo/" . $destination['foto'];    
                        ?>
                            <form action="../../../controllers/shows/shows.php" method="post">
                                <input type="hidden" name="sender_id" value="<?= $user['id'] ?>">
                                <input type="hidden" name="destination_id" value="<?= $destination['id'] ?>">
                                <input type="hidden" name="show_id" value="<?= isset($_REQUEST['show_id']) ? $_REQUEST['show_id'] : 0 ?>">
                                <button type="submit" name="shareContent" class="button-transparent p-0 w-100">     
                                    <div class="list-group-item list-group-item-action list-group-item-dark search-results">
                                        <div class="d-flex flex-row align-items-center text-white">
                                            <?php if (!empty($destination['foto'])): ?>
                                                <img src="<?= $destinationPhotoPath ?>" class="rounded border search-results-img" alt="Foto_Perfil">
                                            <?php else: ?>
                                                <img src="../../../assets/images/uploads/foto_default.png" class="rounded border" alt="Foto_Perfil">
                                            <?php endif; ?>
                                            <div class="d-flex flex-column ms-3 align-items-start">
                                                <h4 class="text-white">ID: <?= $destination['id'] ?></h4>
                                                <p class="m-0 fs-5"><?= $destination['name'] ?> <?= $destination['lastname'] ?></p>
                                                <p class="m-0 fs-5"><?= $destination['email'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </form> 
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once __DIR__ . '/../../../templates/footer.php'; ?>

