<?php
require_once __DIR__ . '../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../helpers/session.php';

include_once __DIR__ . '../../../templates/header.php';

$user = user();
$title = '- App';
?>

<header>

    <div class="nav container">
        <a href="/crud/pages/index.php" class="logo">
            <img src="/crud/assets/images/uploads/logo-estg.png" alt="ESTG" class="img-fluid" style="max-width: 5rem; height: auto;">
        </a>
    </div>


    <div class="header paint-it-black">
        <div>
            <img src="/crud/assets/images/uploads/logo.png" alt="HomeCinema" class="img-fluid" style="max-height: 5rem; width: auto;">
        </div>
        <h1 class="fw-bold text-white">HomeCinema</h1>
        <div>
            <a href="/" class="text-dark text-decoration-none">
                <img src="/crud/assets/images/uploads/logo-estg.png" alt="ESTG" class="img-fluid" style="max-width: 5rem; height: auto;">
            </a>
        </div>
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
        <a href="#home" class="side-menu-link">
            <i class="bi bi-person-circle"></i>
            <span class="side-menu-title">Account</span>
        </a>
    </div>
</header>

<div class="d-flex align-items-center paint-it-black" style="min-height: 100vh;">
    <div class="container py-3">
        <main>
            <div class="p-3 bg-body-tertiary rounded-4">
                <div class="container-fluid py-5 text-center">
                    <h1 class="display-5 fw-bold">Hello
                        <?= $user['name'] ?? null ?>!
                    </h1>
                    <p>What are we watching today?</p>
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="input-group">
                            <input type="text" placeholder="Search for a movie or a serie..." class="form-control" id="search-bar" maxlength="255" name="search-bar" aria-describedby="basic-addon2">
                            <span class="input-group-text bi-search" id="basic-addon2"></span>
                        </div>  
                    </div>
                </div>
                <form action="/crud/controllers/auth/signin.php" method="post">
                        <button class="btn btn-outline-dark btn-danger text-white px-5" type="submit" name="user" value="logout"><strong>Logout</strong></button>
                    </form>
            </div>
        </main>
    </div>
</div>

<?php
include_once __DIR__ . '../../../templates/footer.php';
?>