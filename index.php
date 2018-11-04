<?php 

include 'index.html';

$URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



if(strpos($URL, "error=true") == true){
	echo "BLAH";
}
#echo "AASDASD";
//chje
 ?>