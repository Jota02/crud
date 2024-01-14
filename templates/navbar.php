<?php
// Get the current page URL
$current_url = $_SERVER['REQUEST_URI'];

// Function to check if the current page URL matches the given URL
function is_active($url) {
    global $current_url;
    return strpos($current_url, $url) !== false ? 'text-info' : 'text-white';
}
?>

<header class="px-3 py-2 bg-dark fixed-top">
    <div class="d-flex align-items-center justify-content-between">
        
        <a href="../home/" class="logo">
            <img src="../../../assets/images/uploads/logo.png" alt="HomeCinema" class="img-fluid" style="max-width: 3rem; height: auto;">
            <span class="text-danger">Home</span><span class="text-primary">CINEMA</span>
        </a>

        <ul class="nav d-flex align-items-center justify-content-center my-2 my-md-0">
            <li class="d-none d-sm-none d-md-block">
                <a href="../home/" class="nav-link d-flex flex-column align-items-center <?php echo is_active('../home/'); ?>">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="d-none d-sm-none d-md-block">
                <a href="../discover/" class="nav-link d-flex flex-column align-items-center <?php echo is_active('../discover/'); ?>">
                    <i class="bi bi-search"></i>
                    <span>Discover</span>
                </a>
            </li>
            <li class="d-none d-sm-none d-md-block">
                <a href="../my_shows/" class="nav-link d-flex flex-column align-items-center <?php echo is_active('../my_shows/'); ?>">
                    <i class="bi bi-tv-fill"></i>
                    <span>My Shows</span>
                </a>
            </li>
            <li class="d-none d-sm-none d-md-block">
                <a href="../user/profile.php" class="nav-link d-flex flex-column align-items-center <?php echo is_active('../user/profile.php'); ?>">
                    <i class="bi bi-person-circle"></i>
                    <span>Account</span>
                </a>
            </li>
            <li class="d-none d-sm-none d-md-block">
                <form action="../../../controllers/auth/signin.php" method="post">
                    <button class="nav-link d-flex flex-column align-items-center text-white" type="submit" name="user" value="logout">
                        <i class="bi bi-power"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
        <div class="dropdown d-md-none">
            <button class="btn btn-outline-light navbar-button-color" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-list outlines"></i>
            </button>
            <ul class="dropdown-menu bg-dark" >
                    <li>
                        <a href="../home/" class="nav-link d-flex flex-column align-items-center dropdown-item <?php echo is_active('../home/'); ?>">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../discover/" class="nav-link d-flex flex-column align-items-center dropdown-item <?php echo is_active('../discover/'); ?>">
                            <i class="bi bi-search"></i>
                            <span>Discover</span>
                        </a>
                    </li>
                    <li>
                        <a href="../my_shows/" class="nav-link d-flex flex-column align-items-center dropdown-item <?php echo is_active('../my_shows/'); ?>">
                            <i class="bi bi-tv-fill"></i>
                            <span>My Shows</span>
                        </a>
                    </li>
                    <li>
                        <a href="../user/profile.php" class="nav-link d-flex flex-column align-items-center dropdown-item <?php echo is_active('../user/profile.php'); ?>">
                            <i class="bi bi-person-circle"></i>
                            <span>Account</span>
                        </a>
                    </li>
                    <li>
                        <form action="../../../controllers/auth/signin.php" method="post">
                            <button class="nav-link d-flex flex-column align-items-center text-white dropdown-item" type="submit" name="user" value="logout">
                                <i class="bi bi-power"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
            </ul>
            </div>
    </div>
</header>

