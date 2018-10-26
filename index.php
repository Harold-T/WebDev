<?php 

include 'index.html';

$URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



if(strpos($URL, "error=true") == true){
	echo "BLAH";
	echo "<p class='THERE HAS BEEN A FATAL ERROR</p>";
}

else{
	echo "FLASE";
}


echo "AASDASD";
//chje
 ?>