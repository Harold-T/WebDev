<?php
require './php/config.php';
require './php/database.class.php';

try
{

	$connection = new PDO(DSN, USR, PWD);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "CONNECTED OK";

	$sql = "INSERT INTO nametable (firstname, lastname) VALUES ('Bob', 'Bucke')";
	$connection->exec($sql);
}

catch(PDOException $e)
{
	echo "FAILED";
	echo $e;
}

?>