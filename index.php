<?php 

include 'index.html';

$URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



if(strpos($URL, "error=true") == true){
	echo '<script src="jscript/colorscript.js?newversion" type="text/javascript">', 'alertError();', '</script>';
}
#echo "AASDASD";
//chje
 ?>