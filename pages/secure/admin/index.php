<?php
require_once __DIR__ . '/../../../infra/repositories/userRepository.php';
require_once __DIR__ . '/../../../infra/middlewares/middleware-administrator.php';
require_once __DIR__ . '/../../../templates/header.php'; 

$users = getAll();
$title = ' - Admin management';
$user = user();

include_once __DIR__ . '/../../../templates/navbar.php';
?>

<!--content-->
<div class="account-page-styles home-cover" style="min-height: 100vh;">
    <div class="container py-3"> 
      <main class="account-form-wrapper text-white">
        <div class="account-form-style">  
          <section>
            <h1 class="mb-3 fw-normal text-center">Users</h1>
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
            <div class="table-responsive">
              <table class="table">
                <thead class="table-secondary">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Administrator</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($users as $user) {
                    ?>
                    <tr>
                      <th scope="row" class="text-white" style="background-color: rgba(15, 133, 171, 1)">
                        <?= $user['name'] ?>
                      </th>
                      <td class="text-white" style="background-color: rgba(15, 133, 171, 1)">
                        <?= $user['lastname'] ?>
                      </td>
                      <td class="text-white" style="background-color: rgba(15, 133, 171, 1)">
                        <?= $user['phoneNumber'] ?>
                      </td>
                      <td class="text-white" style="background-color: rgba(15, 133, 171, 1)">
                        <?= $user['email'] ?>
                      </td>
                      <td class="text-white" style="background-color: rgba(15, 133, 171, 1)">
                        <?= $user['administrator'] == '1' ? 'Yes' : 'No' ?>
                      </td>
                      <td style="background-color: rgba(15, 133, 171, 1)">
                        <div class="d-flex justify-content">
                          <a href="/crud/controllers/admin/user.php?<?= 'user=update&id=' . $user['id'] ?>"><button type="button"
                              class="btn btn-warning me-2">update</button></a>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete<?= $user['id'] ?>">delete</button>
                        </div>
                      </td>
                    </tr>
                    <div class="modal fade" id="delete<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete user</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="color:black">
                            Are you sure you want to delete this user?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="/crud/controllers/admin/user.php?<?= 'user=delete&id=' . $user['id'] ?>"><button type="button"
                                class="btn btn-danger">Confirm</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
              <div class="container" style="margin-top: 2rem; margin-bottom: 0%">
                <div class="row">
                  <div class="d-grid col-4 mx-auto" >
                      <a href="/crud/pages/secure/user/profile.php"><button type="button" class="w-100 btn btn-lg btn-secondary mb-2">Back</button></a>
                  </div>
                  <div class="d-grid col-4 mx-auto">
                    <a href="./user.php"><button class="w-100 btn btn-lg btn-success mb-2">Create user</button></a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="fixed-bottom">
          <?php include_once __DIR__ . '/../../../templates/footer.php'; ?>
        </div>
      </main>
    </div>
</div>

            




