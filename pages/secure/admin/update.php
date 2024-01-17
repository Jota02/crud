
<?php
require_once __DIR__ . '/../../../infra/middlewares/middleware-administrator.php';

$title = ' - user';
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
      <div class="container d-flex align-items-center justify-content-center flex-column" style="min-height: 100vh; margin-top:2rem">
        <div class="row mb-3">
          <h1 class="m-3 fw-normal text-center text-white text-center">Update User</h1>
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
          <form enctype="multipart/form-data" action="../../../controllers/admin/user.php" method="post" class="py-3">
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);">Name</span>
              <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" name="name" maxlength="100" size="100"
                value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : null ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);">Last Name</span>
              <input type="text" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" name="lastname" maxlength="100" size="100"
                value="<?= isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);">Phone Number</span>
              <input type="tel" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" name="phoneNumber" maxlength="9"
                value="<?= isset($_REQUEST['phoneNumber']) ? $_REQUEST['phoneNumber'] : null ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);">E-mail</span>
              <input type="email" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" name="email" maxlength="255"
                value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>" required>
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" for="inputGroupFile01">Foto Profile</label>
              <input accept="image/*" type="file" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" id="inputGroupFile01" name="foto" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);">Password</span>
              <input type="password" class="form-control text-white" style="background-color: rgba(1,1,1,1); border: 0.1rem solid var(--main-color);" name="password" maxlength="255">
            </div>
            <div class="input-group mb-3">
              <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" name="administrator" role="switch" id="flexSwitchCheckChecked"
                  <?= isset($_REQUEST['administrator']) && $_REQUEST['administrator'] == true ? 'checked' : null ?>>
                <label class="form-check-label text-white" for="flexSwitchCheckChecked">administrator</label>
              </div>
            </div>
            <div class="d-grid col-4 mx-auto">
              <input type="hidden" name="id" value="<?= isset($_REQUEST['id']) ? $_REQUEST['id'] : null ?>">
              <input type="hidden" name="foto" value="<?= isset($_REQUEST['foto']) ? $_REQUEST['foto'] : null ?>">
            </div>
            
            <div class="row">
              <div class="d-grid col-4 mx-auto" >
                <a href="./"><button type="button" class="w-100 btn btn-secondary btn-lg mb-2">Back</button></a>
              </div>
              <div class="d-grid col-4 mx-auto">
                <button type="submit" class="btn btn-success w-100 btn-lg mb-2" name="user" <?= isset($_REQUEST['action']) && $_REQUEST['action'] == 'update' ? 'value="update"' : 'value="create"' ?>>Update</button>
              </div>
            </div>
          </form>
        </div>

      </div>
      
      <?php require_once __DIR__ . '/../../../templates/footer.php'; ?>
