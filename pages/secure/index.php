<?php
require_once __DIR__ . '../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../helpers/session.php';

include_once __DIR__ . '../../../templates/header.php';

$user = user();
$title = '- App';
?>

<main>
    <header class="pb-3 mb-4 border-bottom d-flex justify-content-between align-items-center">
        <a href="/" class="text-dark text-decoration-none"><img src="/crud/assets/images/logo-estg.svg" alt="ESTG" class="mw-100"></a>
        
        <div class="d-flex">
            <?php
            if (isAuthenticated() && $user['administrator']) {
                echo '<a href="/crud/pages/secure/admin/"><button class="btn btn-outline-dark px-5" type="button"><strong>Admin</strong></button></a>';
            }
            ?>
            <a href="/crud/pages/secure/user/profile.php" class="mr-2"><button class="btn btn-outline-dark px-5" type="button"><strong>Profile</strong></button></a>
            <form action="/crud/controllers/auth/signin.php" method="post">
                <button class="btn btn-outline-danger px-5" type="submit" name="user" value="logout"><strong>Logout</strong></button>
            </form>
        </div>
    </header>
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Hello
                <?= $user['name'] ?? null ?>!
            </h1>
            <p class="col-md-8 fs-4">Ready for today?</p>
            <div class="d-flex justify-content">
                <form action="/crud/controllers/auth/signin.php" method="post">
                    <button class="btn btn-danger btn-lg px-4" type="submit" name="user" value="logout">Logout</button>
                </form>
            </div>
        </div>
    </div>

    
</main>

<?php
include_once __DIR__ . '../../../templates/footer.php';
?>