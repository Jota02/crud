
<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Profile';
$user = user();
$userPhotoPath =  "../../../assets/images/uploads/user_photo/" . $user['foto'];
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
      <div class="main-margin">
            <?php
                if (isset($_SESSION['success']))  {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    echo $_SESSION['success'] . '<br>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    echo $_SESSION['errors'] . '<br>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['errors']);
                }
            ?>
        </div>
      <div class="container d-flex flex-column" style="min-height: 100vh;">
        <div class="row mb-3">
          <h1 class="m-3 fw-normal text-center text-white">Profile</h1>
        </div>
        <div class="row">
          <!-- Foto User -->
          <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column justify-content-center align-items-center foto-container" style="position: relative;">
            <?php if (!empty($user['foto'])): ?>
                <img src="<?= $userPhotoPath ?>" class="foto_perfil" alt="Foto_Perfil">
                <div class="col-4 mx-auto">
                  <button type="button" class="btn btn-danger w-100 mt-2 text-white" id="deletePhotoButton">Delete</button>
                </div>
            <?php else: ?>
                <img src="../../../assets/images/uploads/foto_default.png" class="foto_perfil" alt="Foto_Perfil">
            <?php endif; ?>
          </div>
          <!-- Info User -->
          <div class="col-lg-8 col-md-6 col-sm-12">
            <form enctype="multipart/form-data" action="../../../controllers/admin/user.php" method="post" class="mt-3 py-3">
              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" >Name</span>
                <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" name="name" placeholder="name" maxlength="100" size="100"
                  value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : $user['name'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)">Lastname</span>
                <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" name="lastname" placeholder="lastname" maxlength="100" size="100"
                  value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : $user['lastname'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)">Phone Number</span>
                <input type="tel" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" name="phoneNumber" maxlength="9"
                  value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : $user['phoneNumber'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)">Email</span>
                <input type="email" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" name="email" maxlength="255"
                  value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : $user['email'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" for="foto">Picture</label>
                <input accept="image/*" type="file" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color)" id="foto" name="foto" />
              </div>

              <div class="row" style="margin-top: 1.5rem; margin-bottom: 0%">
                <div class="col-4 mx-auto" >
                  <a href="./password.php">
                    <button type="button" class="w-100 btn btn-warning mb-2 text-white d-flex align-items-center justify-content-center"><h5 class="m-0">Change Password</h5></button>
                  </a>
                </div>
                <?php
                  if (isAuthenticated() && $user['administrator']) {
                      echo '<div class="col-4 mx-auto">
                              <a href="../admin/">
                                <button type="button" class="w-100 btn btn-info mb-2 text-white d-flex align-items-center justify-content-center"><h5 class="m-0">Admin</h5></button>
                              </a>
                            </div>';
                  }
                ?>
                <div class="col-4 mx-auto">
                    <button class="w-100 btn btn-success mb-2 text-white" type="submit" name="user" value="profile"><h5 class="m-0">Edit Profile</h5></button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <?php include_once __DIR__ . '../../../../templates/footer.php'; ?>

      <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deletePhotoButton = document.getElementById('deletePhotoButton');
            var fotoInput = document.getElementById('foto');
            var fotoPerfil = document.querySelector('.foto_perfil');

            deletePhotoButton.addEventListener('click', function () {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../../../controllers/admin/user.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        window.location.href = '../../../pages/secure/user/profile.php';
                    }
                };
                xhr.send('user=deletePhoto');
            });

            
        });
      </script>