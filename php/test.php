<?php

$headers = apache_request_headers();
print_r($headers);

ob_start();
	echo "test<br/>\n";
	$face = ob_get_clean();

echo "test2<br/>\n";
echo $face;
?>