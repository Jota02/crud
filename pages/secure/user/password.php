
<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Change password';
$user = user();
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
    <body style="height: 100vh; overflow-y: hidden;">
      <?php include_once __DIR__ . '/../../../templates/navbar.php'; ?>

      <!--Content-->
      <div class="container main-margin" style="min-height: 100vh; height: 100%; overflow-y: auto;">
        <div class="row mb-3">
          <h1 class="m-3 fw-normal text-center text-white">Profile</h1>
        </div>
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
        <div class="row">
          <form action="../../../controllers/admin/user.php" method="post" class="py-3">
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)">Name</span>
              <input type="text" readonly class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" name="name" placeholder="<?= $user['name'] ?>"
                value="<?= $user['name'] ?>">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)">New Password</span>
              <input type="password" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" name="password" maxlength="255" size="255" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)">Confirm Password</span>
              <input type="password" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" name="confirm_password" maxlength="255" required>
            </div>
            <div class="container" style="margin-top: 2rem; margin-bottom: 0%">
              <div class="row">
                <div class="d-grid col-4 mx-auto" >
                  <a href="./profile.php">
                    <button type="button" class="w-100 btn btn-secondary mb-2 text-white d-flex align-items-center justify-content-center">
                      <h5 class="m-0">Back</h5>
                    </button>
                  </a>
                </div>
                <div class="d-grid col-4 mx-auto">
                  <button class="w-100 btn btn-success mb-2 text-white d-flex align-items-center justify-content-center" type="submit" name="user" value="password"><h5 class="m-0">Change</h5></button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="fixed-bottom">
        <?php include_once __DIR__ . '../../../../templates/footer.php'; ?>
        </div>
      </div>
