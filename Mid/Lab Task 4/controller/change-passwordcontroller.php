<?php require_once "functions.php"; ?>
<?php

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit();
}

$has_err = false;
$success_msg = "";

$currentpass = "";
$err_currentpass = "";

$newpass = "";
$err_newpass = "";

$retypepass = "";
$err_retypepass = "";

if (isset($_POST['changepassword'])) {
    // Get data from json
    $users = json_decode(file_get_contents("db/users.json"), true);
    $current_user = [];

    // Find the user
    for ($i = 0; $i < count($users); ++$i) {
        // Checking with username cause email can be change if possible
        if ($users[$i]['username'] == $_SESSION['username']) {
            $current_user = $users[$i];
            break;
        }
    }

    // Current Password
    if (empty($_POST['currentpass'])) {
        $err_currentpass = "Current Password can't be empty";
        $has_err = true;
    } else if ($_POST['currentpass'] != $current_user['password']) {
        $err_currentpass = "Current Password is not corrent";
        $has_err = true;
    } else {
        $currentpass = trim($_POST['currentpass']);
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
    } else if ($_POST['newpass'] == $currentpass) {
        $err_newpass = "New Password must not be same as Current Password";
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
        // Get data from json

        // Find the user
        for ($i = 0; $i < count($users); ++$i) {
            // Checking with username cause email can be change if possible
            if ($users[$i]['username'] == $_SESSION['username']) {
                // Set edited data to session
                $_SESSION['password'] = $newpass;

                // Change data in the array
                $users[$i]['password'] = $_SESSION['password'];

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