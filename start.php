<?php
require './php/config.php';
require './php/database.class.php';



//Ensure that the user clicked submit 
if(isset($_POST['submit'])){
	$database = new Database(DSN, USR, PWD);
	$success = $database->insert_data($_POST["firstname"],
					   	   $_POST["lastname"],
					   	   $_POST["email"]);
	if(!$success){
		header("Location: index.php?error=true");
		exit;
	}
}

else{
	echo "SUBMIT DATA WITH THE BUTTON NERD";
}
?>