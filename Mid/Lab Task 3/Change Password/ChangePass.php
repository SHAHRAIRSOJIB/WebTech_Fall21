<?php

$currpass = "";
$error_currpass = "";

$newpass = "";
$error_newpass = "";

$retypepass = "";
$error_retypepass = "";

if (isset($_POST['changepassword'])) {
    // Current Password
    define("CURR_PASS", "xyz@10001");

    if (empty($_POST['currpass'])) {
        $error_currpass = "<span class=\"error\">Current Password can't be empty</span>";
    } else if ($_POST['currpass'] != CURR_PASS) {
        $error_currpass = "<span class=\"error\">Current Password is not corrent</span>";
    } else {
        $currentpass = trim($_POST['currpass']);
    }

    // New Password
    if (empty($_POST['newpass'])) {
        $error_newpass = "<span class=\"error\">New Password can't be empty</span>";
    } else if (strlen(trim($_POST['newpass'])) <= 7) {
        $error_newpass = "<span class=\"error\">New Password must be 8 characters or greater</span>";
    } else if (!preg_match("/[@#$%]+/", $_POST['newpass'])) {
        $error_newpass = "<span class=\"error\">New Password must include special characters (@ # $ %)</span>";
    } else if ($_POST['newpass'] == $currentpass) {
        $error_newpass = "<span class=\"error\">New Password must not be same as Current Password</span>";
    } else {
        $newpass = trim($_POST['newpass']);
    }

    // Retype Password
    if (empty($_POST['retypepass'])) {
        $error_retypepass = "<span class=\"error\">Retype Password can't be empty</span>";
    } else if ($_POST['retypepass'] != $newpass) {
       $error_retypepass = "<span class=\"error\">Retype Password must equal to New Password</span>";
    } else {
       $error_retypepass = trim($_POST['retypepass']);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LabTask-3</title>
    <style>
        table tr td:first-child {
            text-align: right;
        }

        span.error {
            color: red;
        }
    </style>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <legend><label for="name">Change Password</label></td></legend>
            <table>
            <tr>
            <td><label for="name">Current Password :</label></td>
            <td><input type="text" name="currpass" id="currpass" value="<?php echo $currpass ; ?>"></td>
            <td><span class="error"><?php echo $error_currpass; ?></span></td>
            </tr>   
            <tr>
            <td><label for="name">New Password :</label></td>
            <td><input type="text" name="newPassword" id="newPassword" value="<?php echo $newpass; ?>"></td>
            <td><span class="error"><?php echo $error_newpass ; ?></span></td>
            </tr>
            <tr>
            <td><label for="name">Retype New Password  :</label></td>
            <td><input type="text" name="retypenewPassword" id="retypenewPassword" value="<?php echo $retypepass; ?>"></td>
            <td><span class="error"><?php echo $error_retypepass ; ?></span></td>
            </tr>
            

        </fieldset>
        </table>
        <input type="submit" name="changepassword" value="Submit">
    </form>




    



</body>
</html>