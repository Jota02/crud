<?php
require_once __DIR__ . '../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../helpers/session.php';

include_once __DIR__ . '../../../templates/header.php';

$user = user();
$title = '- App';
?>

<header class="custom-navbar">
    <div class="nav custom-container mt-1 mb-1 mx-3 align-items-center">
        <a href="/crud/pages/secure/index.php" class="logo">
            <img src="/crud/assets/images/uploads/logo.png" alt="HomeCinema" class="img-fluid" style="max-width: 3rem; height: auto;">
            <span class="text-danger">Home</span><span class="text-primary">CINEMA</span>
        </a>

        <div class="search-bar">
            <input type="search" placeholder="Search for show..." class="form-control" id="search-input" maxlength="255" name="">
            <i class="bi bi-search"></i>
        </div>  

        <a href="#" class="estg">
            <img src="/crud/assets/images/uploads/logo-estg.png" alt="ESTG" class="img-fluid" style="max-width: 3rem; height: auto;">
        </a>
    </div>

    <div class="side-menu">
        <a href="#home" class="side-menu-link side-menu-active">
            <i class="bi bi-house-door-fill"></i>
            <span class="side-menu-title">Home</span>
        </a>
        <a href="#home" class="side-menu-link">
            <i class="bi bi-lightning-charge-fill"></i>
            <span class="side-menu-title">Trending</span>
        </a>
        <a href="#home" class="side-menu-link">
            <i class="bi bi-tags-fill"></i>
            <span class="side-menu-title">Categories</span>
        </a>
        <a href="#home" class="side-menu-link">
            <i class="bi bi-calendar-event-fill"></i>
            <span class="side-menu-title">Calendar</span>
        </a>
        <a href="/crud/pages/secure/user/profile.php" class="side-menu-link">
            <i class="bi bi-person-circle"></i>
            <span class="side-menu-title">Account</span>
        </a>
        <?php
        if (isAuthenticated() && $user['administrator']) {
            echo '<a href="/crud/pages/secure/admin/" class="side-menu-link"><i class="bi bi-at"></i><span class="side-menu-title">Admin</span></a>';
        }
        ?>
        <form action="/crud/controllers/auth/signin.php" method="post">
            <button class="side-menu-link" type="submit" name="user" value="logout">
                <i class="bi bi-power"></i>
                <span class="side-menu-title">Logout</span>
            </button>
        </form>
    </div>
</header>

<!--content-->
<div class="d-flex justify-content-center align-items-center cover" style="min-height: 100vh;">
    <div class="container-fluid py-5 mx-5 welcome">
        <h1 class="display-5 fw-bold">Hello
            <?= $user['name'] ?? null ?>!
        </h1>
        <p class="fs-4">What are we watching today?</p>
    </div>
</div>



<?php
include_once __DIR__ . '../../../templates/footer.php';
?>