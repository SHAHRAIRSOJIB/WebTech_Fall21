<?php

$pic = "";
$err_pic = "";
$upload_ok = false;

if (isset($_POST['profilepic'])) {

    if ($_FILES['picture']['error'] != 0) {
        $err_pic = "Choose a image file";
        $upload_ok = false;
    } else {

        $upload_dir = dirname(__FILE__) . "/images/";
        $target_file = $upload_dir . basename($_FILES["picture"]["name"]);
        $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["picture"]["tmp_name"]);

        if ($check === false) {
            $err_pic = "File is not an image.";
            $upload_ok = false;
        } else if (file_exists($target_file)) {
            $err_pic = "Image already exits";
            $upload_ok = false;
        } else if ($_FILES['picture']['size'] > (4 * 1024 * 1024)) {  // 4MB
            $err_pic = "Image size must be less than 4MB";
            $upload_ok = false;
        } else if (!preg_match("/jpeg|jpg|png/", $image_type)) {
            $err_pic = "Image format must be jpeg or jpg or png";
            $upload_ok = false;
        } else {
            $pic = dirname($_SERVER['PHP_SELF']) . "/images/" . basename($_FILES["picture"]["name"]);
            $upload_ok = true;
        }

        if ($upload_ok === true) {
            if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                $err_pic = "There was an error to uploading your image";
                $upload_ok = false;
            }
        }

        
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lab 3 change profile picture</title>
    <style>
        tr > td:last-child {
            color: red;
        }

        img {
            display: block;
            width: 400px;
        }
    </style>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <fieldset>
        <legend>PROFILE PICTURE</legend>
        <?php if (!empty($pic)) : ?>
        <img src="<?php echo $pic ?>">
        <?php endif; ?>
        <input type="file" name="picture" id="picture">
        <?php echo $err_pic; ?>
        <br><br><input type="submit" name="profilepic" value="Submit">
        </fieldset>
    </form>
</body>

</html>