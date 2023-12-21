<?php
require_once __DIR__ . '/../../infra/middlewares/middleware-not-authenticated.php';
include_once __DIR__ . '../../../templates/header.php';

$title = ' - Sign In';
?>

  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container py-5">  
        <div class="account-form-wrapper text-white">
          <h1 class="mb-3 fw-normal text-center">Sign In</h1>
          <form action="/crud/controllers/auth/signin.php" method="post">
            <div class="account-form-style">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email" maxlength="255" name="email"
                  value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" maxlength="255" name="password"
                  value="<?= isset($_REQUEST['password']) ? $_REQUEST['password'] : null ?>">
              </div>
              <div class="checkbox mb-3">
                <label><input type="checkbox" value="remember-me"> Remember me</label>
              </div>
              <button class="w-100 btn btn-lg btn-outline-dark btn-success mb-2 text-white" type="submit" name="user" value="login">Sign In</button>
            </div>
          </form>
          <a href="/crud">
                <button class="w-100 btn btn-lg btn-outline-dark btn-danger mb-2 text-white">Back</button>
              </a>
          <section>
            <?php
              if (isset($_SESSION['errors'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                foreach ($_SESSION['errors'] as $error) {
                  echo $error . '<br>';
                }
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                unset($_SESSION['errors']);
              }
            ?>
          </section>
        </div>
    </div>
  </div>

<div class= "fixed-bottom">
    <?php
      include_once __DIR__ . '../../../templates/footer.php';
    ?>
</div>