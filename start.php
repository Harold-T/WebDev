<?php
require './php/config.php';
require './php/database.class.php';

try
{

	$connection = new PDO(DSN, USR, PWD);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "CONNECTED OK";
}

catch(PDOException $e)
{
	echo "FAILED";
	echo $e;
}

?>