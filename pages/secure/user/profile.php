<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Profile';
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
    <body>
      <?php include_once __DIR__ . '/../../../templates/navbar.php'; ?>
      <!--content-->
      <div class="container main-margin" style="min-height: 100vh;">
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
          <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
            <?php if (!empty($user['foto'])): ?>
              <img src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>" class="foto_perfil" alt="Foto_Perfil">
            <?php else: ?>
              <!-- Exibição padrão caso não haja imagem -->
              <img src="../../../assets/images/uploads/foto_default.jpg" class="foto_perfil" alt="Foto_Perfil">
            <?php endif; ?>
          </div>
          <div class="col-lg-8 col-md-6 col-sm-12">
            <form enctype="multipart/form-data" action="../../../controllers/admin/user.php" method="post" class="mt-3 py-3">

              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)" >Name</span>
                <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="name" placeholder="name" maxlength="100" size="100"
                  value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : $user['name'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)">Lastname</span>
                <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="lastname" placeholder="lastname" maxlength="100" size="100"
                  value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : $user['lastname'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)">Phone Number</span>
                <input type="tel" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="phoneNumber" maxlength="9"
                  value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : $user['phoneNumber'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)">Email</span>
                <input type="email" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="email" maxlength="255"
                  value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : $user['email'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text text-white" style="background-color: rgba(1,1,1,1)" for="inputGroupFile01">Picture</label>
                <input accept="image/*" type="file" class="form-control text-white" style="background-color: rgba(1,1,1,1)"id="inputGroupFile01" name="foto" />
              </div>
              <div class="container" style="margin-top: 2rem; margin-bottom: 0%">
                <div class="row">
                  <div class="d-grid col-4 mx-auto" >
                    <a href="./password.php">
                      <button type="button" class="w-100 btn btn-lg btn-warning mb-2 text-white">Change Password</button>
                    </a>
                  </div>
                  <?php
                    if (isAuthenticated() && $user['administrator']) {
                        echo '<div class="d-grid col-4 mx-auto">
                                <a href="../admin/">
                                  <button type="button" class="w-100 btn btn-lg btn-info mb-2 text-white">Admin</button>
                                </a>
                              </div>';
                    }
                  ?>
                  <div class="d-grid col-4 mx-auto">
                    <button class="w-100 btn btn-lg btn-success mb-2 text-white" type="submit" name="user" value="profile">Edit Profile</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>

      <div class="account-page-styles home-cover" style="min-height: 100vh;">
        <div class="container py-3 main-margin">  
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

                <form enctype="multipart/form-data" action="../../../controllers/admin/user.php" method="post" class=" py-3">

                    <div class="input-group mb-3">
                      <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)" >Name</span>
                      <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="name" placeholder="name" maxlength="100" size="100"
                        value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : $user['name'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)">Lastname</span>
                      <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="lastname" placeholder="lastname" maxlength="100" size="100"
                        value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : $user['lastname'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)">Phone Number</span>
                      <input type="tel" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="phoneNumber" maxlength="9"
                        value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : $user['phoneNumber'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1)">Email</span>
                      <input type="email" class="form-control text-white" style="background-color: rgba(1,1,1,1)" name="email" maxlength="255"
                        value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : $user['email'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <label class="input-group-text text-white" style="background-color: rgba(1,1,1,1)" for="inputGroupFile01">Picture</label>
                      <input accept="image/*" type="file" class="form-control text-white" style="background-color: rgba(1,1,1,1)"id="inputGroupFile01" name="foto" />
                    </div>
                    <div class="container" style="margin-top: 2rem; margin-bottom: 0%">
                      <div class="row">
                        <div class="d-grid col-4 mx-auto" >
                          <a href="./password.php">
                            <button type="button" class="w-100 btn btn-lg btn-warning mb-2 text-white">Change Password</button>
                          </a>
                        </div>
                        <?php
                          if (isAuthenticated() && $user['administrator']) {
                              echo '<div class="d-grid col-4 mx-auto">
                                      <a href="../admin/">
                                        <button type="button" class="w-100 btn btn-lg btn-info mb-2 text-white">Admin</button>
                                      </a>
                                    </div>';
                          }
                        ?>
                        <div class="d-grid col-4 mx-auto">
                          <button class="w-100 btn btn-lg btn-success mb-2 text-white" type="submit" name="user" value="profile">Edit Profile</button>
                        </div>
                      </div>
                    </div>
                </form>
              </section>
            </div>
          </main>
        </div>
      </div>

      <?php include_once __DIR__ . '../../../../templates/footer.php' ?>

