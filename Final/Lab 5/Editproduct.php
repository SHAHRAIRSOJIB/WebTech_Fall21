<?php
if (isset($_POST['save'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product_db";
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $sql = "UPDATE  products SET p_name='".$_POST['name']."',p_bp='".$_POST['bp']."',p_sp='".$_POST['sp']." WHERE p_id='".$_POST['id']."'";

    try {
        $conn = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
elseif (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ViewProduct.php");
    exit();
}else{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product_db";
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $sql = "";
    $products = [];

    try {
        $conn = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM products where p_id = ".$_GET['id'];

        $stmt = $conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // var_dump($products[0]);
    // echo '</pre>';
    // exit();

        // echo "Database created successfully<br>";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    $conn = null;

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
                <legend>EditProduct</legend>

                <label for="fname">Name :</label>
                <input type="text" id="name" name="name" value="<?php echo $products[0]['p_name'] ?>"><br><br>

                <label for="bp">Buying Price:</label>
                <input type="text" id="bp" name="bp"value="<?php echo $products[0]['p_bp'] ?>"><br><br>

                <label for="sp">Selling price:</label>
                <input type="text" id="sp" name="sp"value="<?php echo $products[0]['p_sp'] ?>"><br><br>
                <input type="hidden" name="id"value="<?php echo $products[0]['p_id'] ?>">

                <hr>

                <input type="submit" name="save" value="Save">
            </fieldset>
    </form>
    </div>

</body>

</html> 