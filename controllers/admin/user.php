<?php

require_once __DIR__ . '/../../infra/repositories/userRepository.php';
require_once __DIR__ . '/../../helpers/validations/admin/validate-user.php';
require_once __DIR__ . '/../../helpers/validations/admin/validate-password.php';
require_once __DIR__ . '/../../helpers/session.php';

if (isset($_POST['user'])) {
    if ($_POST['user'] == 'create') {
        create($_POST);
    }

    if ($_POST['user'] == 'update') {
        update($_POST);
    }

    if ($_POST['user'] == 'profile') {
        updateProfile($_POST);
    }

    if ($_POST['user'] == 'deletePhoto') {
        deletePhoto($_POST);
    }

    if ($_POST['user'] == 'password') {
        changePassword($_POST);
    }
}

if (isset($_GET['user'])) {
    if ($_GET['user'] == 'update') {
        $user = getById($_GET['id']);
        $user['action'] = 'update';
        $params = '?' . http_build_query($user);
        header('location: ../../pages/secure/admin/update.php' . $params);
    }

    if ($_GET['user'] == 'delete') {
        $user = getById($_GET['id']);
        if ($user['administrator']) {
            $_SESSION['errors'] = ['This user cannot be deleted!'];
            header('location: ../../pages/secure/admin/');
            return false;
        }

        $success = delete_user($user);

        if ($success) {
            $_SESSION['success'] = 'User deleted successfully!';
            header('location: ../../pages/secure/admin/');
        }
    }
}

function create($req)
{
    $data = validatedUser($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $params = '?' . http_build_query($req);
        header('location: ../../pages/secure/admin/user.php' . $params);
        return false;
    }

    $success = createUser($data);

    if ($success) {
        $_SESSION['success'] = 'User created successfully!';
        header('location: ../../pages/secure/admin/');
    }
}

function saveFile($data, $oldImage = null, $removeOldImage = false) {
    $fileName = $_FILES['foto']['name'];
    $tempFile = $_FILES['foto']['tmp_name'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $newName = uniqid('foto_') . '.' . $extension;
    $path = __DIR__ . '/../../assets/images/uploads/';
    $file = $path . $newName;

    if (move_uploaded_file($tempFile, $file)) {
        $data['foto'] = $newName;
        if ($removeOldImage && isset($oldImage['foto'])) {
            unlink($path . $oldImage['foto']);
        }
    }
    return $data;
}

function deletePhoto($req)
{
    $user = user();

    if (!empty($user['foto'])) {
        $photoPath = __DIR__ . '/../../assets/images/uploads/' . $user['foto'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
        $user['foto'] = null;
        updateUser($user);
        header('location: ../../pages/secure/user/profile.php');
    }
}

function update($req) {
    $data = validatedUser($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $_SESSION['action'] = 'update';
        $params = '?' . http_build_query($req);
        header('location: ../../pages/secure/admin/update.php' . $params);
        return false;
    } else {
        if (!empty($_FILES['foto']['name'])) {
            $data = saveFile($data, $req, true);
        }
    }

    $success = updateUser($data);

    if ($success) {
        $_SESSION['success'] = 'User successfully changed!';
        $data['action'] = 'update';
        $params = '?' . http_build_query($data);
        header('location: ../../pages/secure/admin/update.php' . $params);
    }
}


function updateProfile($req) {
    $data = validatedUser($req);

    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $params = '?' . http_build_query($req);
        header('location: ../../pages/secure/user/profile.php' . $params);
    } else {
        $user = user(); 
        $data['id'] = $user['id'];

        if (isset($user['administrator']) && $user['administrator'] === 1) {
            $data['administrator'] = 1;
        } else {
            unset($data['administrator']); 
        }

        if (!empty($_FILES['foto']['name'])) {
            $data = saveFile($data, $req, true);
        } else {
            $data['foto'] = $user['foto'];
        }

        $success = updateUser($data);

        if ($success) {
            $_SESSION['success'] = 'User successfully changed!';
            $_SESSION['action'] = 'update';
            $params = '?' . http_build_query($data);
            header('location: ../../pages/secure/user/profile.php' . $params);
        }
    }
}



function changePassword($req)
{
    $data = passwordIsValid($req);
    if (isset($data['invalid'])) {
        $_SESSION['errors'] = $data['invalid'];
        $params = '?' . http_build_query($req);
        header('location: ../../pages/secure/user/password.php' . $params);
    } else {
        $data['id'] = userId();
        $success = updatePassword($data);
        if ($success) {
            $_SESSION['success'] = 'Password successfully changed!';
            header('location: ../../pages/secure/user/profile.php');
        }
    }
}

function delete_user($user)
{
    $data = deleteUser($user['id']);
    return $data;
}