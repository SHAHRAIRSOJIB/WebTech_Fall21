<?php require_once "functions.php"; ?>
<?php

// This will check if "actual user" request for new password
if (!isset($_SESSION['forget_pass']) || !isset($_SESSION['foget_pass_email'])) {
    header("Location: forget-password.php");
    exit();
}

$has_err = false;
$success_msg = "";

$newpass = "";
$err_newpass = "";

$retypepass = "";
$err_retypepass = "";

if (isset($_POST['changeforgetpass'])) {
    // Get data from json
    $users = json_decode(file_get_contents("db/users.json"), true);
    $current_user = [];

    // Find the user
    for ($i = 0; $i < count($users); ++$i) {
        if ($users[$i]['email'] == $_SESSION['foget_pass_email']) {
            $current_user = $users[$i];
            break;
        }
    }

    // New Password
    if (empty($_POST['newpass'])) {
        $err_newpass = "New Password can't be empty";
        $has_err = true;
    } else if (strlen(trim($_POST['newpass'])) <= 7) {
        $err_newpass = "New Password must be 8 characters or greater";
        $has_err = true;
    } else if (!preg_match("/[@#$%]+/", $_POST['newpass'])) {
        $err_newpass = "New Password must include special characters (@ # $ %)";
        $has_err = true;
    } else if ($_POST['newpass'] == $current_user['password']) {
        $err_newpass = "New Password must not be same previous password";
        $has_err = true;
    } else {
        $newpass = trim($_POST['newpass']);
    }

    // Retype Password
    if (empty($_POST['retypepass'])) {
        $err_retypepass = "Retype Password can't be empty";
        $has_err = true;
    } else if ($_POST['retypepass'] != $newpass) {
        $err_retypepass = "Retype Password must equal to New Password";
        $has_err = true;
    } else {
        $retypepass = trim($_POST['retypepass']);
    }

    // Store data in JSON
    if (!$has_err) {
        // Find the user
        for ($i = 0; $i < count($users); ++$i) {
            if ($users[$i]['email'] == $_SESSION['foget_pass_email']) {
                // Change data in the array
                $users[$i]['password'] = $newpass;

                // Destroy the session data
                session_reset();
                session_unset();
                session_destroy();

                // echo '<pre>';
                // var_dump($users);
                // echo '</pre>';

                break;
            }
        }

        // Convert associative array to json string
        $json = json_encode($users);

        // Put all the json string to the file
        file_put_contents("db/users.json", $json);

        $success_msg = "Successfully Changed";

        // echo '<pre>';
        // var_dump($json);
        // echo '</pre>';
    }
}

?>