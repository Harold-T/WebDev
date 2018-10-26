<?php
require './php/config.php';
require './php/database.class.php';



//Ensure that the user clicked submit 
if(isset($_POST['submit'])){
	$database = new Database(DSN, USR, PWD);
	$database->insert_data($_POST["firstname"],
					   	   $_POST["lastname"],
					   	   $_POST["email"]);
}

else{
	echo "SUBMIT DATA WITH THE BUTTON NERD";
}



?>