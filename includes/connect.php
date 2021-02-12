<?php
	$connection = new mysqli('localhost', 'admin', 'root123', 'php_deepak');
	if ($connection->connect_error) {
		die("Database Connection failed");
	}
?>

