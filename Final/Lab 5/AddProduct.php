<?php


  	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product_db";
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $sql="";



try {
  $conn = new PDO($dsn, $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO products";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Lab-5
	</title>
	<style>
	</style>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div>
	<fieldset>
    <legend>ADD Product</legend>
    <label for="fname">Name :</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="lname">Buying Price:</label>
    <input type="text" id="bp" name="bp"><br><br>
    <label for="email">Selling price:</label>
    <input type="email" id="sp" name="sp"><br><br>
    <hr>
    <input type="checkbox" id="cb" name="cb">
	<label for="cb">Display</label><br>
	<hr>
	<input type="button" name="Save" value="Save">
   </fieldset>
   </form>
	</div>

</body>
</html>