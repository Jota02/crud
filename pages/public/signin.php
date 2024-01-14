<?php
require_once __DIR__ . '/../../infra/middlewares/middleware-not-authenticated.php';

$title = ' - Sign In';
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/uploads/logo.png">
        <title>HomeCinema</title>

        <link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    </head>
    <body>
      <div class="account-page-styles page" style="min-height: 100vh;">
        <div class="container py-5">  
            <main class="account-form-wrapper text-white">
              <h1 class="mb-3 fw-normal text-center">Sign In</h1>
              <form action="../../controllers/auth/signin.php" method="post">
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
              <a href="../../">
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
                </main>
        </div>
      </div>

      <?php
        include_once __DIR__ . '../../../templates/footer.php';
      ?>
