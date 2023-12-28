<?php
require_once __DIR__ . '../../../../infra/middlewares/middleware-user.php';
include_once __DIR__ . '../../../../templates/header.php';
@require_once __DIR__ . '/../../../helpers/session.php';

$title = ' - Profile';
$user = user();
?>
  <div class="account-page-styles page" style="min-height: 100vh;">
    <div class="container py-3">  
        <main class="account-form-wrapper text-white">
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
                <div class="account-form-style">  
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
                  <div class="container">
                    <div class="row">
                      <div class="d-grid col-4 mx-auto" >
                        <a href="/crud/"><button type="button" class="w-100 btn btn-lg btn-secondary mb-2">Back</button></a>
                      </div>
                      <div class="d-grid col-4 mx-auto" >
                        <a href="/crud/pages/secure/user/password.php"><button type="button" class="w-100 btn btn-lg mb-2" style="background-color: #E9C958">Change Password</button></a>
                      </div>
                      <div class="d-grid col-4 mx-auto">
                        <button class="w-100 btn btn-lg btn-success mb-2" type="submit" name="user" value="profile">Change</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </section>
          <div class="fixed-bottom">
            <?php
              include_once __DIR__ . '../../../../templates/footer.php';
            ?>
          </div>
        </main>
      </div>
    </div>

