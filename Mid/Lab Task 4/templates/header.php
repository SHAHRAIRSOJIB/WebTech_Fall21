<?php function header_page($title = "") { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mid Project<?php echo (!empty($title)) ? " | " . $title : ""; ?></title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php } ?>