
<?php
require_once __DIR__ . '/../../../infra/repositories/userRepository.php';
require_once __DIR__ . '/../../../infra/repositories/showRepository.php';
require_once __DIR__ . '/../../../infra/middlewares/middleware-administrator.php';

$users = getAll();
$title = ' - Admin management';
$user = user();
$user_count = countUsers();
$shows_count = countShows();
$shows_users_library = countMyShows();
$review_count = countUsersReviews();


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
        <h1 class="m-3 fw-normal text-center text-white text-center">Users</h1>
      </div>
      <div class="row">
        <table class="table" style="border: 0.15rem solid var(--main-color);">
          <thead class="table-secondary">
            <tr>
              <th scope="col" class="text-white text-center text-center" style="background-color: var(--main-color)">Name</th>
              <th scope="col" class="text-white text-center text-center" style="background-color: var(--main-color)">Lastname</th>
              <th scope="col" class="text-white text-center text-center" style="background-color: var(--main-color)">Phone Number</th>
              <th scope="col" class="text-white text-center text-center" style="background-color: var(--main-color)">Email</th>
              <th scope="col" class="text-white text-center text-center" style="background-color: var(--main-color)">Administrator</th>
              <th scope="col" class="text-white text-center text-center" style="background-color: var(--main-color)">Manage</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) {?>
              <tr >
                <th scope="row" class="text-white text-center" style="background-color: rgba(1,1,1, 1)">
                  <?= $user['name'] ?>
                </th>
                <td class="text-white text-center" style="background-color: rgba(1,1,1, 1)">
                  <?= $user['lastname'] ?>
                </td>
                <td class="text-white text-center" style="background-color: rgba(1,1,1, 1)">
                  <?= $user['phoneNumber'] ?>
                </td>
                <td class="text-white text-center" style="background-color: rgba(1,1,1, 1)">
                  <?= $user['email'] ?>
                </td>
                <td class="text-white text-center" style="background-color: rgba(1,1,1, 1)">
                  <?= $user['administrator'] == '1' ? 'Yes' : 'No' ?>
                </td>
                <td style="background-color: rgba(1,1,1, 1) ">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="../../../controllers/admin/user.php?<?= 'user=update&id=' . $user['id'] ?>"><button type="button"
                        class="btn btn-warning me-2 text-white d-flex align-items-center justify-content-center" style="height: 2rem;"><h6 class="m-0">Update</h6></button></a>
                    <button type="button" class="btn btn-danger d-flex align-items-center justify-content-center" style="height: 2rem;" data-bs-toggle="modal" data-bs-target="#delete<?= $user['id'] ?>"><h6 class="m-0">Delete</h6></button>
                  </div>
                </td>
              </tr>
              <div class="modal fade" id="delete<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel" >Delete user</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color:black">
                      Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="../../../controllers/admin/user.php?<?= 'user=delete&id=' . $user['id'] ?>"><button type="button"
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
      </div>
      <div class="row" style="margin-top: 2rem; margin-bottom: 0%">
        <div class="col-4 mx-auto">
            <a href="../user/profile.php">
              <button type="button" class="w-100 btn btn-secondary mb-2 text-white d-flex align-items-center justify-content-center">
                  <h5 class="m-0">Back</h5>
              </button>
          </a>
        </div>
        <div class="col-4 mx-auto">
          <a href="./user.php">
              <button type="button" class="w-100 btn btn-success mb-2 text-white d-flex align-items-center justify-content-center">
                  <h5 class="m-0">Create user</h5>
              </button>
          </a>
        </div>
      </div>
      <div class="my-5"></div>
      <div class="d-flex flex-column align-items-center shows-placeholder">
        <h1 class="text-white ">Registered users: <?= $user_count['row_count'] ?></h1>
        <h1 class="text-white ">Registered shows: <?= $shows_count['row_count'] ?></h1>
        <h1 class="text-white ">Shows added to users libraries: <?= $shows_users_library['row_count'] ?></h1>
        <h1 class="text-white ">User reviews created: <?= $review_count['row_count'] ?></h1>
      </div>    
    </div>  
    
    <?php include_once __DIR__ . '/../../../templates/footer.php'; ?>
