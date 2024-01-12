<?php
// Include necessary files and start sessions if needed
include_once __DIR__ . '/../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Movie Details';

include_once __DIR__ . '/../../../templates/navbar.php';

// Include necessary files and setup
require_once __DIR__ . '/../../../controllers/shows/shows.php'; // Adjust the path as necessary

$user = user();

$myShows = getMyShows($user['id']);

?>

<div class="d-flex flex-column align-items-center main-margin">
    <!--movies header start-->
        <div class="heading mt-5 w-75">
            <h4 class="heading-title">My Movies</h4>
        </div>
        <!--movies header end-->

        <!--movies carousel start-->
        <div id="movieCarousel" class="carousel slide w-75" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- 1st Page -->
                <div class="carousel-item active">
                    <div class="container mb-5 pt-2 shows-placeholder w-100">
                        <?php
                        // Loop through shows and group them into rows of 4
                        for ($i = 0; $i < count($myShows); $i += 4): ?>
                            <div class="row">
                                <?php
                                // Loop for each row of 4 shows
                                for ($j = $i; $j < $i + 4 && $j < count($myShows); $j++): 
                                    if ($myShows[$j]['id_type'] == 1): ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="image-container d-flex">
                                                <img src="..\..\..\<?php echo $myShows[$j]['poster_path']; ?>" alt="<?php echo htmlspecialchars($myShows[$j]['title']); ?>" class="img-fluid">
                                                <div class="show-details">
                                                    <h6><?php echo htmlspecialchars($myShows[$j]['title']); ?></h6>
                                                    <div class="button-container">
                                                        <a href="#" class="outlines">
                                                            <i class="bi bi-play-circle-fill"></i>
                                                        </a>
                                                        <a href="#" id="toggleButton" class="outlines">
                                                            <i id="toggleIcon" class="bi bi-plus-circle-fill"></i>
                                                        </a>
                                                        <form action="/crud/controllers/shows/shows.php" method="get">
                                                            <input type="hidden" name="id" value="<?php echo $myShows[$j]['show_id']; ?>">                                        
                                                            <button type="submit" name="getShowDetails" class="outlines button-transparent">
                                                                <i class="bi bi-info-circle-fill"></i>
                                                            </button>
                                                        </form> 
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--movies carousel end-->        

        <!--series header start-->
        <div class="heading mt-5 w-75">
            <h4 class="heading-title">My Series</h4>
        </div>
        <!--series header end-->
        <!--series carousel start-->
        <div id="movieCarousel" class="carousel slide w-75" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- 1st Page -->
                <div class="carousel-item active">
                    <div class="container mb-5 pt-2 shows-placeholder w-100">
                        <?php
                        // Loop through shows and group them into rows of 4
                        for ($i = 0; $i < count($myShows); $i += 4): ?>
                            <div class="row">
                                <?php
                                // Loop for each row of 4 shows
                                for ($j = $i; $j < $i + 4 && $j < count($myShows); $j++): 
                                    if ($myShows[$j]['id_type'] == 2): ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="image-container d-flex">
                                                <img src="..\..\..\<?php echo $myShows[$j]['poster_path']; ?>" alt="<?php echo htmlspecialchars($myShows[$j]['title']); ?>" class="img-fluid">
                                                <div class="show-details">
                                                    <h6><?php echo htmlspecialchars($myShows[$j]['title']); ?></h6>
                                                    <div class="button-container">
                                                        <a href="#" class="outlines">
                                                            <i class="bi bi-play-circle-fill"></i>
                                                        </a>
                                                        <a href="#" id="toggleButton" class="outlines">
                                                            <i id="toggleIcon" class="bi bi-plus-circle-fill"></i>
                                                        </a>
                                                        <form action="/crud/controllers/shows/shows.php" method="get">
                                                            <input type="hidden" name="id" value="<?php echo $myShows[$j]['show_id']; ?>">                                        
                                                            <button type="submit" name="getShowDetails" class="outlines button-transparent">
                                                                <i class="bi bi-info-circle-fill"></i>
                                                            </button>
                                                        </form> 
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--series carousel end-->      
    </div>

    <div class="mt-5"></div>
    
<?php
include_once __DIR__ . '../../../../templates/footer.php';
?>
