<?php
require_once __DIR__ . '/../../../infra/middlewares/middleware-administrator.php';
@require_once __DIR__ . '/../../../helpers/session.php';

include_once __DIR__ . '/../../../templates/header.php';

$user = user();
$title = '- App';
?>
<!--navbar start-->
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
        <a href="/crud/pages/secure/index.php" class="side-menu-link">
            <i class="bi bi-house-door-fill"></i>
            <span class="side-menu-title">Home</span>
        </a>
        <a href="/crud/pages/secure/trending/index.php" class="side-menu-link side-menu-active">
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
<!--navbar end-->

<!--content start-->
<div class="container-xxl bd-gutter my-md-4 bd-layout d-grid padding">
    <!--carousel start-->
    <div id="mainCarousel" class="carousel slide container-fluid">
    <div class="carousel-inner carrousel-inner-width container-fluid">
        <div class="carousel-item active img-carousel">
            <img src="../../../assets/images/uploads/movies/covers/dk.jpg" class="d-block" alt="batman">
            <div class="carousel-caption d-none d-md-flex info-position">
                <h1>The Dark Knight Rises</h1>
                <a href="#" class="show-btn">
                    <i class="bi bi-play-circle-fill"></i>
                    <span>Trailer</span>
                </a>
                <a href="#" class="show-btn">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span>Add to Library</span>
                </a>
            </div>
        </div>
        <div class="carousel-item img-carousel">
            <img src="../../../assets/images/uploads/series/covers/himym.jpg" class="d-block" alt="arcane">
            <div class="carousel-caption d-none d-md-flex info-position" style="color: white;">
                <h1>How I Met Your Mother</h1>
                <a href="#" class="show-btn">
                    <i class="bi bi-play-circle-fill"></i>
                    <span>Trailer</span>
                </a>
                <a href="#" class="show-btn">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span>Add to Library</span>
                </a>
            </div>
        </div>
        <div class="carousel-item img-carousel">
            <img src="../../../assets/images/uploads/movies/covers/dune.jpg" class="d-block" alt="dune">
            <div class="carousel-caption d-none d-md-flex info-position">
                <h1>Dune</h1>
                <a href="#" class="show-btn">
                    <i class="bi bi-play-circle-fill"></i>
                    <span>Trailer</span>
                </a>
                <a href="#" class="show-btn">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span>Add to Library</span>
                </a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!--carousel end-->

    <!--movies header start-->
    <div class="heading">
        <h4 class="heading-title">Trending Movies</h4>
        <button class="btn btn-link arrow-btn" onclick="showMovieCarousel()">
            <i class="bi bi-chevron-down show-btn"></i> 
        </button>
    </div>
    <!--movies header end-->

    <!--movies carousel start-->
    <div id="movieCarousel" class="carousel slide" data-bs-ride="carousel" style="display: none;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#movieCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#movieCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
        <!-- 1st Page -->
            <div class="carousel-item active">
                <div class="container mt-5 pt-2 movies-placeholder">
                    <div class="row">
                        <!-- 1 Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/007_skyfall.jpg" alt="007_skyfall" class="img-fluid">
                                <div class="show-details">
                                    <h6>Skyfall</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/batman_22.jpg" alt="batman_22" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Batman</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/batman_dkr.jpg" alt="batman_dkr" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Dark Knight Rises</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/bh6.jpg" alt="bh6" class="img-fluid">
                                <div class="show-details">
                                    <h6>Big Hero 6</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 2 Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/br_82.jpg" alt="br_82" class="img-fluid">
                                <div class="show-details">
                                    <h6>Blade Runner</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/cars.jpg" alt="cars" class="img-fluid">
                                <div class="show-details">
                                    <h6>Cars </h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/dune.jpg" alt="dune" class="img-fluid">
                                <div class="show-details">
                                    <h6>Dune</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/evil_dead.jpg" alt="evil_dead" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Evil Dead</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Fourth Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/ff_6.jpg" alt="ff_6" class="img-fluid">
                                <div class="show-details">
                                    <h6>Fast & Furious 6</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/fnaf.jpg" alt="fnaf" class="img-fluid">
                                <div class="show-details">
                                    <h6>FNAF </h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/fright_night.jpg" alt="fright_night" class="img-fluid">
                                <div class="show-details">
                                    <h6>Fright Night</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/hunger_games.jpg" alt="hunger_games" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Hunger Games</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 4 Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/incredibles.jpg" alt="incredibles" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Incredibles</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/insidious_2.jpg" alt="insidious" class="img-fluid">
                                <div class="show-details">
                                    <h6>Insidious: Chapter 2</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/john_wick.jpg" alt="john_wick" class="img-fluid">
                                <div class="show-details">
                                    <h6>John Wick</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/jurrasic_world.jpg" alt="jurrasic_world" class="img-fluid">
                                <div class="show-details">
                                    <h6>Jurrasic World</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 5 Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/kitchen.jpg" alt="kitchen" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Kitchen</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/lego.jpg" alt="lego" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Lego Movie</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/lotr_two_towers.jpg" alt="lotr_two_towers" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Lord of the Rings: The Two Towers</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/mario_bros.jpg" alt="mario_bros" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Super Mario Bros. Movie</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- 2nd Page -->
            <div class="carousel-item">
                <div class="container mt-5 pt-2 movies-placeholder">
                    <div class="row">
                        <!-- 1st Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/megamind.jpg" alt="megamind" class="img-fluid">
                                <div class="show-details">
                                    <h6>Megamind</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/opp.jpg" alt="opp" class="img-fluid">
                                <div class="show-details">
                                    <h6>Oppenheimer</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/pulp_fiction.jpg" alt="pulp_fiction" class="img-fluid">
                                <div class="show-details">
                                    <h6>Pulp Fiction</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/purge_anarchy.jpg" alt="purge_anarchy" class="img-fluid">
                                <div class="show-details">
                                    <h6>THe Purge: Anarchy</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 2nd Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/ratatouille.jpg" alt="ratatouille" class="img-fluid">
                                <div class="show-details">
                                    <h6>Ratatouille</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/saw.jpg" alt="saw" class="img-fluid">
                                <div class="show-details">
                                    <h6>Saw</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/sw_9.jpg" alt="sw_9" class="img-fluid">
                                <div class="show-details">
                                    <h6>Star Wars: Episode IX - The Rise of Skywalker/h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/scream.jpg" alt="scream" class="img-fluid">
                                <div class="show-details">
                                    <h6>Scream</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 3rd Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/shining.jpg" alt="shining" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Shining</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/spiderman_across.jpg" alt="spiderman_across" class="img-fluid">
                                <div class="show-details">
                                    <h6>Spider-Man: Across the Spider-Verse</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/sw_4.jpg" alt="sw_4" class="img-fluid">
                                <div class="show-details">
                                    <h6>Star Wars: Episode IV - A New Hope</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/saw_5.jpg" alt="saw_5" class="img-fluid">
                                <div class="show-details">
                                    <h6>Saw V</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 4th Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/terminator_2.jpg" alt="terminator_2 " class="img-fluid">
                                <div class="show-details">
                                    <h6>Terminator 2: Judgment Day</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/tmnt.jpg" alt="tmnt" class="img-fluid">
                                <div class="show-details">
                                    <h6>Teenage Mutant Ninja Turtles</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/venom.jpg" alt="venom" class="img-fluid">
                                <div class="show-details">
                                    <h6>Venom</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/wwZ.jpg" alt="wwZ" class="img-fluid">
                                <div class="show-details">
                                    <h6>World War Z</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 5th Row -->
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/xpendables_3.jpg" alt="xpendables_3" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Expendables 3</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/baywatch.jpg" alt="baywatch" class="img-fluid">
                                <div class="show-details">
                                    <h6>Baywatch</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/godfather.jpg" alt="godfather" class="img-fluid">
                                <div class="show-details">
                                    <h6>The Godfather</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="image-container d-flex">
                                <img src="../../../assets/images/uploads/movies/knives_out.jpg" alt="knives_out" class="img-fluid">
                                <div class="show-details">
                                    <h6>Knives Out</h6>
                                    <div class="button-container">
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </a>
                                        <a href="#" class="show-btn">
                                            <i class="bi bi-plus-circle-fill"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--movies carousel end-->        

    
    

</div>

    
<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js" integrity="sha256-aULwhztqcQjhipg7QZKtRpARqBMTF/iBYdbwkXBY2iI=" crossorigin="anonymous"></script>
<?php
include_once __DIR__ . '/../../../templates/footer.php';
?>