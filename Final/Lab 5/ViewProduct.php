<?php
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
        $sql = "SELECT * FROM products;";

        $stmt = $conn->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // echo "Database created successfully<br>";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    $conn = null;

    // echo '<pre>';
    // var_dump($products);
    // echo '</pre>';
    // exit();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lab-5</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>Name</td>
			<td>Buying price</td>
			<td>Selling price</td>
		</tr>

		<?php foreach ($products as $product) : ?>

			<tr>
				<td><?php echo $product['p_name']; ?></td>
				<td><?php echo $product['p_bp']; ?></td>
				<td><?php echo $product['p_sp']; ?></td>
			</tr>

		<?php endforeach; ?>

    </table>


</body>
</html>