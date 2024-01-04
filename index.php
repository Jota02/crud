<?php
require_once __DIR__ . '/infra/middlewares/middleware-not-authenticated.php';
#require_once __DIR__ . '/infra/db/setupdatabase.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/uploads/logo.png">
    <title>HomeCinema</title>

    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="./assets/js/scripts.js"></script>

</head>
<body id="page-top">

    <!-- Barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container text-uppercase"> 
            <a class="navbar-brand d-flex align-items-center" style="font-weight: bold;" href="#"> HomeCinema <img src="./assets/images/uploads/logo.png" height="30rem" class="ms-3"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#howitworks">How It Works</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#features">Features</a></li>
                            <li><a class="dropdown-item" href="#team">Team</a></li>
                            <li><a class="dropdown-item" href="#contact">Contact</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/crud/pages/public/signin.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/crud/pages/public/signup.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  

    <!-- Introduction -->

    <header class="hero">
        <div class="overlay"></div>
        <div class="container text-center align-content-center content">
            <img src="./assets/images/uploads/logo.png" class="img-fluid" alt="homecinema">
            <div class="d-flex justify-content-center align-items-center flex-column content">
                <div class="input-group bar-size">
                    <input type="text" class="form-control " placeholder="Search for a movie or serie..." aria-describedby="basic-addon2">
                    <span class="input-group-text bi-search" id="basic-addon2"></span>
                </div> 
            </div>
            <hr>    
            <div class="text-white" style="padding-bottom: 10rem;">
                <h1>We have what you need!</h1>
                <hr class="divider">
                <h5>HOMECINEMA is the best website for you to manage your movies and series.</h5>
            </div>
        </div>
    </header> 
        
    <!-- About -->

    <div class="break" id="about">
        <div class="row align-items-center g-2 text-center">
            <div class="col-3">
                <hr class="divider">
            </div>
            <div class="col-6" style="color: #ffffff;">
                <h2>About</h2>
            </div>
            <div class="col-3">
                <hr class="divider">
            </div>
        </div>
    </div>

    <section class="page">
        <div class="container text-center" style="text-align: justify; color: #ffffff;">
            <h5>
                <p>Welcome to HomeCinema, your hub for movies and series management!</p>
                <p>We're a passionate team dedicated to simplifying and personalizing your cinematic experience.</p> 
                <p>Organize your lists, discover personalized recommendations and connect with other enthusiasts in our active community.</p>
                <p>Join us, create your account, and dive into an extraordinary cinematic journey!</p>
            </h5>
        </div>
    </section>
    
    <!-- How it Works -->

    <div class="break" id="howitworks">
        <div class="row align-items-center g-2 text-center">
            <div class="col-3">
                <hr class="divider">
            </div>
            <div class="col-6" style="color: #ffffff;">
                <h2>How it Works</h2>
            </div>
            <div class="col-3">
                <hr class="divider">
            </div>
        </div>
    </div>

    <section class="page">
        <div class="container text-center" style="text-align: justify; color: #ffffff;">
             <h5>
                <p>It's simple!</p>
                <p>Create an account <a href="" style="color: black;">here</a> and you are ready to go.</p> 
                <p>Just search for the shows you are looking for, add them to your collection and you can explore 
                    every amazing <a href="#features" style="color: black;">feature</a> available on the website.</p>
                <p>Join us, create your account, and dive into an extraordinary cinematic journey!</p>
              </h5>
        </div>
    </section>
    
    <!-- Features -->

    <div class="break"  id="features">
        <div class="row align-items-center g-2 text-center">
            <div class="col-3">
                <hr class="divider">
            </div>
            <div class="col-6" style="color: #ffffff;">
                <h2>Features</h2>
            </div>
            <div class="col-3">
                <hr class="divider">
            </div>
        </div>
    </div>

    <section class="page">
        <div class="container" style="color: #ffffff;">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-person-fill fs-1"></i></div>
                        <h4>Account</h4>
                        <p>You can manage and customise your account.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-tags-fill fs-1"></i></div>
                        <h4>Categorize</h4>
                        <p>You can categorize your movies and series.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-share-fill fs-1"></i></div>
                        <h4>Share</h4>
                        <p>You can share your shows with other people, registered in the website.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-calendar2-week-fill fs-1"></i></div>
                        <h4>Schedule</h4>
                        <p>You can schedule your next movie/serie watch session.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-sticky-fill fs-1"></i></div>
                        <h4>Notes</h4>
                        <p>You can create notes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-search fs-1"></i></div>
                        <h4>Search</h4>
                        <p>You can search for a show by name or using our filters.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-paperclip fs-1"></i></div>
                        <h4>Attachments</h4>
                        <p>You can attach fotos to your favorite movies and series.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-star-fill fs-1"></i></div>
                        <h4>Rate</h4>
                        <p>You can rate and add comments to every show.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->

    <div class="break" id="team">
        <div class="row align-items-center g-2 text-center">
            <div class="col-3">
                <hr class="divider">
            </div>
            <div class="col-6" style="color: #ffffff;">
                <h2>Team Members</h2>
            </div>
            <div class="col-3">
                <hr class="divider">
            </div>
        </div>
    </div>

    <section class="page">
        <div class="container" style="color: #ffffff;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-5" src="./assets/images/uploads/jota.jpg" alt="João">
                        <h4>João Pedro Lima Rocha</h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-5" src="./assets/images/uploads/pinto.png" alt="Pinto">
                        <h4>Guilherme De Sá Pinto</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact -->

    <div class="break"  id="contact" >
        <div class="row align-items-center g-2 text-center">
            <div class="col-3">
                <hr class="divider">
            </div>
            <div class="col-6" style="color: #ffffff;">
                <h2>Contact Us</h2>
            </div>
            <div class="col-3">
                <hr class="divider">
            </div>
        </div>
    </div>

    <section class="page">
        <div class="container" style="color: #ffffff;">
            <form id="contactForm" style="margin-top: 5rem;">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input class="form-control" type="text" placeholder="Name">
                        </div>
                        <div class="form">
                            <input class="form-control" type="email" placeholder="Email">
                        </div>
                        <div class="form">
                            <input class="form-control" type="tel" placeholder="Phone Number">
                        </div>
                        <div class="form-message">
                            <input class="form-control" type="text" placeholder="Message">
                    </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>    
                <div class="row text-center" style="margin-top: 3rem;">
                    <div>
                        <button class="btn btn-dark btn-xl text-uppercase "> Send Message</button>
                    </div>
                </div>            
            </form>
        </div>
    </section>


    <?php
        include_once __DIR__ . '/templates/footer.php';
    ?>       