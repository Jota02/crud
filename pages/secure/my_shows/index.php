<?php
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';
require_once __DIR__ . '/../../../controllers/shows/shows.php';

$title = ' - My Shows';

include_once __DIR__ . '/../../../templates/navbar.php';

$user = user();
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
                    <p class="fs-4">Click <a href="/crud/pages/secure/discover/index.php" class="text-info">here</a> to look for some!</p>
                </div>
            <?php else: ?>
                <?php for ($i = 0; $i < count($myMovies); $i += 4): ?>
                    <div class="row">
                        <?php for ($j = $i; $j < $i + 4 && $j < count($myMovies); $j++): ?>
                            <div class="col-md-3 mb-4">
                                <div class="image-container d-flex">
                                    <img src="..\..\..\<?= $myMovies[$j]['poster_path'] ?>" alt="<?= $myMovies[$j]['title'] ?>" class="img-fluid">
                                    <div class="show-details">
                                        <h6><?= $myMovies[$j]['title'] ?></h6>
                                        <div class="button-container">
                                            <form action="/crud/controllers/shows/shows.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $myMovies[$j]['show_id'] ?>">                                        
                                                <button type="submit" name="removeMyShow" class="outlines button-transparent p-0">
                                                    <i class="bi bi-dash-circle-fill"></i>
                                                </button>
                                            </form> 
                                            <form action="/crud/controllers/shows/shows.php" method="get">
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
                    <p class="fs-4">Click <a href="/crud/pages/secure/discover/index.php" class="text-info">here</a> to look for some!</p>
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
                                            <form action="/crud/controllers/shows/shows.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $mySeries[$j]['show_id'] ?>">                                        
                                                <button type="submit" name="removeMyShow" class="outlines button-transparent p-0">
                                                    <i class="bi bi-dash-circle-fill"></i>
                                                </button>
                                            </form>
                                            <form action="/crud/controllers/shows/shows.php" method="get">
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
        <div class="heading w-75 mt-5 d-flex justify-content-center">
            <h3 class="text-white">What's the next <a href="\crud\pages\secure\show_time\index.php" class="text-info">popcorn</a> session?</h3>
        </div>      
    </div>

    <div class="mt-5"></div>
    
<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>
