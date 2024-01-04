<?php
// Get the current page URL
$current_url = $_SERVER['REQUEST_URI'];

// Function to check if the current page URL matches the given URL
function is_active($url) {
    global $current_url;
    return strpos($current_url, $url) !== false ? 'side-menu-active' : '';
}
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
        <a href="/crud/pages/secure/index.php" class="side-menu-link <?php echo is_active('/crud/pages/secure/index.php'); ?>">
            <i class="bi bi-house-door-fill"></i>
            <span class="side-menu-title">Home</span>
        </a>
        <a href="/crud/pages/secure/discover/index.php" class="side-menu-link <?php echo is_active('/crud/pages/secure/discover/index.php'); ?>">
            <i class="bi bi-search"></i>
            <span class="side-menu-title">Discover</span>
        </a>
        <a href="/crud/pages/secure/my_shows/index.php" class="side-menu-link <?php echo is_active('/crud/pages/secure/my_shows/index.php'); ?>">
            <i class="bi bi-tv-fill"></i>
            <span class="side-menu-title">My Shows</span>
        </a>
        <a href="/crud/pages/secure/user/profile.php" class="side-menu-link <?php echo is_active('/crud/pages/secure/user/profile.php'); ?>">
            <i class="bi bi-person-circle"></i>
            <span class="side-menu-title">Account</span>
        </a>
        <form action="/crud/controllers/auth/signin.php" method="post">
            <button class="side-menu-link" type="submit" name="user" value="logout">
                <i class="bi bi-power"></i>
                <span class="side-menu-title">Logout</span>
            </button>
        </form>
    </div>
</header>