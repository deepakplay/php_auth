<?php
	session_start();
	if(!$_SESSION["id"]){
		header("Location: http://localhost/deepak?login");
		die();
	}
?>