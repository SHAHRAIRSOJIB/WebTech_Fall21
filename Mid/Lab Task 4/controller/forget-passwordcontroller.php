<?php require_once "functions.php"; ?>
<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: dashboard.php");
    exit();
}

$has_err = false;

$email = "";
$err_email = "";

if (isset($_POST['forget-pass'])) {
    // Email
    if (empty($_POST['email'])) {
        $err_email = "Email is required";
        $has_err = true;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err_email = "Email is not valid";
        $has_err = true;
    } else {
        $email = validate_input($_POST['email']);
    }

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // return;

    if (!$has_err) {
        // Get data from json
        $users = json_decode(file_get_contents("db/users.json"), true);

        $found_user = [];

        foreach ($users as $user) {
            if ($user['email'] === $email) {
                $found_user = $user;
                break;
            }
        }

        if (!empty($found_user)) {
            // This will prevent direcly change password by url
            $_SESSION['forget_pass'] = true;
            $_SESSION['foget_pass_email'] = $found_user['email'];

            // Redirect to add new password
            header("Location: change-forget-password.php");
        } else {
            $err_email = "Can not find the Email on Database";
            $has_err = true;
        }
    }
}
?>