<?php
require './php/config.php';
require './php/database.class.php';

$database = new Database(DSN, USR, PWD);
$database->insert_data($_POST["firstname"],
					   $_POST["lastname"],
					   $_POST["email"]);

?>