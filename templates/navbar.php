<?php
// Get the current page URL
$current_url = $_SERVER['REQUEST_URI'];

// Function to check if the current page URL matches the given URL
function is_active($url) {
    global $current_url;
    return strpos($current_url, $url) !== false ? 'text-blue' : 'text-white';
}
?>

<header class="px-3 py-2 text-bg-dark fixed-top">
    <div class="d-flex align-items-center justify-content-between">
        
        <a href="/crud/pages/secure/index.php" class="logo">
            <img src="/crud/assets/images/uploads/logo.png" alt="HomeCinema" class="img-fluid" style="max-width: 3rem; height: auto;">
            <span class="text-danger">Home</span><span class="text-primary">CINEMA</span>
        </a>

        <ul class="nav d-flex align-items-center justify-content-center my-2 my-md-0">
        <li>
            <a href="/crud/pages/secure/index.php" class="nav-link active d-flex flex-column align-items-center <?php echo is_active('/crud/pages/secure/index.php'); ?>">
                <i class="bi bi-house-door-fill"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="/crud/pages/secure/discover/index.php" class="nav-link d-flex flex-column align-items-center <?php echo is_active('/crud/pages/secure/discover/index.php'); ?>">
                <i class="bi bi-search"></i>
                <span>Discover</span>
            </a>
        </li>
        <li>
            <a href="/crud/pages/secure/my_shows/index.php" class="nav-link d-flex flex-column align-items-center <?php echo is_active('/crud/pages/secure/my_shows/index.php'); ?>">
                <i class="bi bi-tv-fill"></i>
                <span>My Shows</span>
            </a>
        </li>
        <li>
            <a href="/crud/pages/secure/user/profile.php" class="nav-link d-flex flex-column align-items-center <?php echo is_active('/crud/pages/secure/user/profile.php'); ?>">
                <i class="bi bi-person-circle"></i>
                <span>Account</span>
            </a>
        </li>
        <li>
            <form action="/crud/controllers/auth/signin.php" method="post">
                <button class="nav-link d-flex flex-column align-items-center text-white" type="submit" name="user" value="logout">
                    <i class="bi bi-power"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>
        </ul>
    </div>
</header>

