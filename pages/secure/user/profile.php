<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Profile';
$user = user();
?>
<header class="custom-navbar">
    <div class="nav custom-container mt-0 mb-1 mx-3 align-items-center fixed-top" style="background-color: black;width: 100%;">
        <a href="/crud/pages/secure/index.php" class="logo">
            <img src="/crud/assets/images/uploads/logo.png" alt="HomeCinema" class="img-fluid" style="max-width: 3rem; height: auto;">
            <span class="text-danger">Home</span><span class="text-primary">CINEMA</span>
        </a>

        <div class="search-bar">
            <input type="search" placeholder="Search for show..." class="form-control" id="search-input" maxlength="255" name="">
            <i class="bi bi-search"></i>
        </div>  

        <a href="#" class="estg" style="padding-right: 2rem">
            <img src="/crud/assets/images/uploads/logo-estg.png" alt="ESTG" class="img-fluid" style="max-width: 3rem; height: auto;">
        </a>
    </div>

    <div class="side-menu">
        <a href="/crud/pages/secure/index.php" class="side-menu-link side-menu-active">
            <i class="bi bi-house-door-fill"></i>
            <span class="side-menu-title">Home</span>
        </a>
        <a href="/crud/pages/secure/trending/index.php" class="side-menu-link">
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

  <div class="account-page-styles home-cover" style="min-height: 100vh;">
    <div class="container py-3">  
        <main class="account-form-wrapper text-white">
          <div class="account-form-style">
            <section>
              <h1 class="mb-3 fw-normal text-center">Profile</h1>
              <?php
              if (isset($_SESSION['success'])) {
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

              <form enctype="multipart/form-data" action="/crud/controllers/admin/user.php" method="post" class=" py-3">

                  <div class="input-group mb-3">
                    <span class="input-group-text text-white" style="background-color: rgba(15, 133, 171, 1)" >Name</span>
                    <input type="text" class="form-control text-white" style="background-color: rgba(15, 133, 171, 1)" name="name" placeholder="name" maxlength="100" size="100"
                      value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : $user['name'] ?>" required>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text text-white" style="background-color: rgba(15, 133, 171, 1)">Lastname</span>
                    <input type="text" class="form-control text-white" style="background-color: rgba(15, 133, 171, 1)" name="lastname" placeholder="lastname" maxlength="100" size="100"
                      value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : $user['lastname'] ?>" required>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text text-white" style="background-color: rgba(15, 133, 171, 1)">Phone Number</span>
                    <input type="tel" class="form-control text-white" style="background-color: rgba(15, 133, 171, 1)" name="phoneNumber" maxlength="9"
                      value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : $user['phoneNumber'] ?>" required>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text text-white" style="background-color: rgba(15, 133, 171, 1)">Email</span>
                    <input type="email" class="form-control text-white" style="background-color: rgba(15, 133, 171, 1)" name="email" maxlength="255"
                      value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : $user['email'] ?>" required>
                  </div>
                  <div class="input-group mb-3">
                    <label class="input-group-text text-white" style="background-color: rgba(15, 133, 171, 1)" for="inputGroupFile01">Picture</label>
                    <input accept="image/*" type="file" class="form-control text-white" style="background-color: rgba(15, 133, 171, 1)"id="inputGroupFile01" name="foto" />
                  </div>
                  <div class="container" style="margin-top: 2rem; margin-bottom: 0%">
                    <div class="row">
                      <div class="d-grid col-4 mx-auto" >
                      <a href="/crud/pages/secure/user/password.php"><button type="button" class="w-100 btn btn-lg mb-2" style="background-color: #E9C958">Change Password</button></a>
                      </div>
                      <div class="d-grid col-4 mx-auto">
                        <button class="w-100 btn btn-lg btn-success mb-2" type="submit" name="user" value="profile">Change</button>
                      </div>
                    </div>
                  </div>
              </form>
            </section>
          </div>
          <div class="fixed-bottom">
            <?php
              include_once __DIR__ . '../../../../templates/footer.php';
            ?>
          </div>
        </main>
      </div>
    </div>

