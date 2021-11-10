<?php require_once "functions.php"; ?>
<?php

$has_err = false;
$has_duplicate = false;
$success_msg = "";

$name = "";
$err_name = "";

$phoneno ="";
$err_phoneno ="";

$username = "";
$err_username = "";

$password = "";
$err_password = "";

$cpassword = "";
$err_cpassword = "";

$ambno="";
$err_ambno="";

$doj = "";
$err_doj = "";

if (isset($_POST['registration'])) {
    // Name
    if (empty($_POST['name'])) {
        $err_name = "Driver Name is required";
        $has_err = true;
    } else if (strlen($_POST['name']) < 2) {
        $err_name = "Name must be greater than 2 character";
        $has_err = true;
    } else if (preg_match("/^[a-zA-Z-.]/", $_POST['name']) != 1) {
        $err_name = "Name must be contains alpha character, (.) and (-)";
        $has_err = true;
    } else {
        $name = validate_input($_POST['name']);
    }
    //phone no
    if (empty($_POST['phoneno'])) {
        $err_phoneno = "Phone Number is required";
        $has_err = true;
    }else if (strlen($_POST['phoneno']) < 11) {
        $err_phoneno = "Phone  must be  11 character";
        $has_err = true;
    }else{
       $phoneno = validate_input($_POST['phoneno']);
    }


    // Username
    if (empty($_POST['username'])) {
        $err_username = "User Name is required";
        $has_err = true;
    } else if (strlen(trim($_POST['username'])) < 2) {
        $err_username = "User Name must be lager than 2 character";
        $has_err = true;
    } else if (preg_match("/^([a-zA-z0-9_-]*)$/", $_POST['username']) != 1) {
        $err_username = "User Name must be alphanumeric, dash (-) and Underscore (_)";
        $has_err = true;
    } else {
        $username = validate_input($_POST['username']);
    }

    // Password
    if (empty($_POST['password'])) {
        $err_password = "Password is required";
        $has_err = true;
    } else if (strlen(trim($_POST['password'])) < 8) {
        $err_password = "Password must be 8 characters or greater";
        $has_err = true;
    } else if (!preg_match("/[@#$%]+/", $_POST['password'])) {
        $err_password = "Password must include special characters (@ # $ %)";
        $has_err = true;
    } else {
        $password = trim($_POST['password']);
    }

    // Confirm Password
    if (empty($_POST['cpassword'])) {
        $err_cpassword = "Confirm Password is required";
        $has_err = true;
    } else if ($_POST['cpassword'] != $_POST['password']) {
        $err_cpassword = "Confirm Password must equal to Password";
        $has_err = true;
    } else {
        $cpassword = trim($_POST['cpassword']);
    }
    //Ambulance number
    if (empty($_POST['ambno'])) {
        $err_ambno = "Ambulance number  is required";
        $has_err = true;
    } else if (strlen(trim($_POST['ambno'])) < 8) {
        $err_ambno = "Ambulance Number  must be 8 characters or greater";
        $has_err = true;
    } else {
         $ambno = validate_input($_POST['ambno']);
    }


    // DOj
    if (empty($_POST['doj'])) {
        $err_doj = "Joining date is required";
        $has_err = true;
    } else if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['doj']) != 1) {
        $err_doj = "Joining date is not valid";
        $has_err = true;
    } else {
        $doj = validate_input($_POST['doj']);
    }

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // return;

    // Store data in JSON
    if (!$has_err) {
        // Format user associative array
        $new_user = [
            "name" => $name,
            "phoneno" => $phoneno,
            "username" => $username,
            "password" => $password,
            "ambno" => $ambno,
            "doj" => $doj,
            "pp_path" => ""
        ];

        // Get previous data from json
        $users = json_decode(file_get_contents("db/ambusers.json"), true);

        // Check duplication
        if (!empty($users)) {
            foreach ($users as $user) {
                if ($user['username'] == $username) {
                    if ($user['username'] == $username) {
                        $err_username = "Username already registered";
                    }

                    

                    $has_err = true;
                    $has_duplicate = true;

                    break;
                }
            }
        }

        if (!$has_duplicate) {
            // Append new user
            $users[] = $new_user;

            // Convert associative array to json string
            $json = json_encode($users);

            // Put all the json string to the file
            file_put_contents("db/ambusers.json", $json);

            $success_msg = "Successfully Registered";

            // echo '<pre>';
            // var_dump($json);
            // echo '</pre>';
            // return;
        }
    }
}