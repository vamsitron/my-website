<?php

DEFINE ('DB_USER', 'web_ro');
DEFINE ('DB_PASSWORD', 'web_ro');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'my_website');

$DBC = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
or die('Could not connect to MySQL' . mysqli_connect_error());

?>
