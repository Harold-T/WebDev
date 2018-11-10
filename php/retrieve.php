<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/style.css">
	<title>Competition</title>
</head>
<body>
	<div class="header"> <h1>See The Competition</h1> </div>
	<div class="linkbar"> 
			<a href="../index.php">Back to entry!</a>
	</div>
	<form action="retrieve.php" method="post">
	<div class="data"><button type="submit" name="retrieve"> Retrieve list </button></div>
	</form>

</body>
</html>


<?php
require 'config.php';
require 'database.class.php';


if(isset($_POST['retrieve'])){
	$database = new Database(DSN, USR, PWD);
	$database->retrieve_data();
}

?>
