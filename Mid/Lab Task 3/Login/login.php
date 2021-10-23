<?php
$username = "";
$error_username = "";

$password = "";
$error_password = "";

if (isset($_POST['login'])) {
    // Username
    if (empty($_POST['username'])) {
        $error_username = "<span class=\"error\">Please Enter Username</span>";
    } else if (strlen(trim($_POST['username'])) < 2) {
        $error_username = "<span class=\"error\">Username must be larger than 2 characters</span>";
    } else if (!preg_match("/^([a-zA-Z0-9.-]*)$/", $_POST['username'])) {
        $error_username = "<span class=\"error\">Username must be alphanumeric, period and dashes</span>";
    } else {
        $username = validate_input($_POST['username']);
    }

    // Password
    if (empty($_POST['password'])) {
        $error_password = "<span class=\"error\">Enter your Password</span>";
    } else if (strlen(trim($_POST['password'])) < 8) {
        $error_password = "<span class=\"error\">Password must be 8 characters or greater</span>";
    } else if (!preg_match("/[@#$%]+/", $_POST['password'])) {
        $error_password = "<span class=\"error\">Password must include special characters (@ # $ %)</span>";
    } else {
        $password = validate_input($_POST['password']);
    }
}

function validate_input($str)
{
    return htmlspecialchars(trim($str));
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
            <legend><label for="name">LOGIN</label></td></legend>
            <table>
            <tr>
            <td><label for="name">UserName :</label></td>
            <td><input type="text" name="Username" id="UserName" value="<?php echo $username; ?>"></td>
            <td><span class="error"><?php echo $error_username; ?></span></td>
            </tr>	
            <tr>
            <td><label for="name">Password :</label></td>
            <td><input type="text" name="Password" id="Password" value="<?php echo $password; ?>"></td>
            <td><span class="error"><?php echo $error_password; ?></span></td>
            </tr>
             </table>
         
    
                <br><input type="checkbox" name="rememberme" id="rememberme">
                <label for="rememberme">Remember Me</label><br><br>
                <input type="submit" name="login" value="Submit">
                <span><a href="#">Forget Password?</a></span>   
               </fieldset>


       





</body>
</html>