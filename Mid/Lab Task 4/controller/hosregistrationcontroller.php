<?php require_once "functions.php"; ?>
<?php

$has_err = false;
$has_duplicate = false;
$success_msg = "";

$name = "";
$err_name = "";

$email = "";
$err_email = "";


$phoneno ="";
$err_phoneno ="";

$loc="";
$err_loc ="";



if (isset($_POST['registration'])) {
    // Name
    if (empty($_POST['name'])) {
        $err_name = "Name is required";
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
//location
    if(empty($_POST['location'])){
        $err_loc = "Location required";
        $has_err =true;
    }else{
        $loc = validate_input($_POST['location']);
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
            "email" => $email,
            "phoneno" => $phoneno,
            "location" => $loc,
            "pp_path" => ""
        ];

        // Get previous data from json
        $users = json_decode(file_get_contents("db/hosusers.json"), true);

        // Check duplication
        if (!empty($users)) {
            foreach ($users as $user) {
                if ( $user['email'] == $email) {

                    if ($user['email'] == $email) {
                        $err_email = "Email already registered";
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
            file_put_contents("db/hosusers.json", $json);

            $success_msg = "Successfully Registered";

            // echo '<pre>';
            // var_dump($json);
            // echo '</pre>';
            // return;
        }
    }
}
?>