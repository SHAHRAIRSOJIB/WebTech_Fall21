<?php
if (isset($_POST['save'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product_db";
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $sql = "";

    try {
        $conn = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO products (p_name, p_bp, p_sp) VALUES ('" . $_POST['name'] . "', '" . $_POST['bp'] . "', '" . $_POST['sp'] . "')";

        $conn->exec($sql);
        echo "Database created successfully<br>";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    if(isset($_POST['cb']) && $_POST['cb'] == "on") {
        header("Location: ViewProduct.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lab-5</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <fieldset>
                <legend>ADD Product</legend>

                <label for="fname">Name :</label>
                <input type="text" id="name" name="name"><br><br>

                <label for="bp">Buying Price:</label>
                <input type="text" id="bp" name="bp"><br><br>

                <label for="sp">Selling price:</label>
                <input type="text" id="sp" name="sp"><br><br>


                <input type="checkbox" id="cb" name="cb">
                <label for="cb">Display</label><br>

                <hr>

                <input type="submit" name="save" value="Save">
            </fieldset>
    </form>
    </div>

</body>

</html>