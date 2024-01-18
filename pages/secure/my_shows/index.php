<?php
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../controllers/shows/shows.php';

$title = ' - My Shows';
$user = user();
$shared = getShared($user['id']);
$myShows = getMyShows($user['id']);
$myMovies = [];
$mySeries = [];

for ($i=0; $i < count($myShows) ; $i++) { 
    if($myShows[$i]['id_type'] == 1){
        array_push($myMovies, $myShows[$i]);
    }else{
        array_push($mySeries, $myShows[$i]);
    }
}

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
        <div class="d-flex flex-column align-items-center main-margin">
            <?php
                if (isset($_SESSION['success']))  {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    echo $_SESSION['success'] . '<br>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    foreach ($_SESSION['errors'] as $error) {
                    echo $error . '<br>';
                    }
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    unset($_SESSION['errors']);
                }
            ?>
            <!--movies header start-->
            <div class="heading mt-5 w-75">
                <h3 class="text-white">My Movies</h3>
            </div>
            <!--movies header end-->
            <!--movies div start-->
            <div class="container mb-5 pt-2 shows-placeholder w-75">
                <?php if(empty($myMovies)): ?>
                    <div class="text-white d-flex flex-column align-items-center justify-content-center">
                        <h2>You have 0 movies in your library!</h2>
                        <p class="fs-4">Click <a href="../../../pages/secure/discover/index.php" class="text-info">here</a> to look for some!</p>
                    </div>
                <?php else: ?>
                    <?php for ($i = 0; $i < count($myMovies); $i += 4): ?>
                        <div class="row">
                            <?php for ($j = $i; $j < $i + 4 && $j < count($myMovies); $j++): ?>
                                <div class="col-md-3 mb-4">
                                    <div class="image-container d-flex">
                                        <img src="../../../<?= $myMovies[$j]['poster_path'] ?>" alt="<?= $myMovies[$j]['title'] ?>" class="img-fluid">
                                        <div class="show-details">
                                            <h6><?= $myMovies[$j]['title'] ?></h6>
                                            <div class="button-container">
                                                <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="show_id" value="<?= $myMovies[$j]['show_id'] ?>">                                        
                                                    <button type="submit" name="removeMyShow" class="outlines button-transparent p-0">
                                                        <i class="bi bi-dash-circle-fill"></i>
                                                    </button>
                                                </form> 
                                                <form action="../../../controllers/shows/shows.php" method="get">
                                                    <input type="hidden" name="id" value="<?= $myMovies[$j]['show_id'] ?>">                                        
                                                    <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                    </button>
                                                </form> 
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            <!--movies div end-->        

            <!--series header start-->
            <div class="heading mt-5 w-75">
                <h3 class="text-white">My Series</h3>
            </div>
            <!--series header end-->
            <!--series div start-->
            <div class="container mb-5 pt-4 shows-placeholder w-75">
                <?php if(empty($mySeries)):?>
                    <div class="text-white d-flex flex-column align-items-center justify-content-center">
                        <h2>You have 0 series in your library!</h2>
                        <p class="fs-4">Click <a href="../../../pages/secure/discover/index.php" class="text-info">here</a> to look for some!</p>
                    </div>
                <?php else: ?>
                    <?php for ($i = 0; $i < count($mySeries); $i += 4): ?>
                        <div class="row">
                            <?php for ($j = $i; $j < $i + 4 && $j < count($mySeries); $j++): ?>
                                <div class="col-md-3 mb-4">
                                    <div class="image-container d-flex">
                                        <img src="..\..\..\<?= $mySeries[$j]['poster_path'] ?>" alt="<?= $mySeries[$j]['title'] ?>" class="img-fluid">
                                        <div class="show-details">
                                            <h6><?= $mySeries[$j]['title'] ?></h6>
                                            <div class="button-container">
                                                <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="show_id" value="<?= $mySeries[$j]['show_id'] ?>">                                        
                                                    <button type="submit" name="removeMyShow" class="outlines button-transparent p-0">
                                                        <i class="bi bi-dash-circle-fill"></i>
                                                    </button>
                                                </form>
                                                <form action="../../../controllers/shows/shows.php" method="get">
                                                    <input type="hidden" name="id" value="<?= $mySeries[$j]['show_id'] ?>">                                        
                                                    <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                    </button>
                                                </form> 
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            <!--series div end-->
            <div class="heading w-75 mt-5 mb-5 d-flex justify-content-center">
                <h3 class="text-white">What's the next <a href="../show_time/" class="text-info">popcorn</a> session?</h3>
            </div>
            <div class="heading w-75 mt-5">
                <h3 class="text-white">Shared Content</h3>
            </div>
            <div class="container mb-5 pt-4 shows-placeholder w-75">
                <?php if(empty($shared)):?>
                    <div class="text-white d-flex flex-column align-items-center justify-content-center pb-4">
                        <h2>No one shared content with you :(</h2>
                    </div>
                <?php else: ?>
                    <?php for ($i = 0; $i < count($shared); $i += 4): ?>
                        <div class="row">
                            <?php for ($j = $i; $j < $i + 4 && $j < count($shared); $j++): ?>
                                <div class="col-md-3 mb-4">
                                    <div class="image-container d-flex">
                                        <img src="..\..\..\<?= $shared[$j]['poster_path'] ?>" alt="<?= $shared[$j]['title'] ?>" class="img-fluid">
                                        <div class="show-details">
                                            <h6><?= $shared[$j]['title'] ?></h6>
                                            <div class="button-container">
                                                <?php 
                                                    $showInLibrary = false; 
                                                    foreach ($myShows as $show): 
                                                        if ($show['show_id'] == $shared[$j]['show_id']) {
                                                            $showInLibrary = true;
                                                            break;
                                                        }
                                                    endforeach;
                                                ?>
                                                <form action="../../../controllers/shows/shows.php" method="post" enctype="multipart/form-data" class="m-0">
                                                    <?php if (!$showInLibrary): ?>
                                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                    <?php endif; ?>
                                                    <input type="hidden" name="show_id" value="<?= $shared[$j]['show_id'] ?>">
                                                    <button type="submit" name="<?= $showInLibrary ? 'removeMyShow' : 'addShow' ?>" class="outlines button-transparent p-0">
                                                        <i class="<?= $showInLibrary ? 'bi bi-dash-circle-fill' : 'bi bi-plus-circle-fill' ?>"></i>
                                                    </button>
                                                </form>
                                                <form action="../../../controllers/shows/shows.php" method="get">
                                                    <input type="hidden" name="id" value="<?= $shared[$j]['show_id'] ?>">                                        
                                                    <button type="submit" name="getShowDetails" class="outlines button-transparent p-0">
                                                        <i class="bi bi-info-circle-fill"></i>
                                                    </button>
                                                </form> 
                                                <form action="../../../controllers/shows/shows.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $shared[$j]['id'] ?>">                                        
                                                    <button type="submit" name="removeShared" class="outlines button-transparent p-0">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                    </button>
                                                </form> 
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>       
        </div>

        <div class="mt-5"></div>
    
        <?php include_once __DIR__ . '../../../../templates/footer.php'; ?>
