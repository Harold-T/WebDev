<?php 

include 'index.html';

$URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



if(strpos($URL, "error=true") == true){
	echo "There was an error in the information you attempted to submit!";
}

elseif (strpos($URL, "success=true") == true) {
	echo "Thank you for submitting your information!";
}

?>