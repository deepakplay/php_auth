<?php
	include('includes/check.php');
	include('includes/connect.php');

	if(	empty($_POST["current_password"]) ||
		empty($_POST["new_password"]) || 
		empty($_POST["renew_password"]) || 
		($_POST["renew_password"] != $_POST["new_password"])){
		header("Location: http://localhost/deepak/profile.php");
		die();
	}

	$stmt = $connection->prepare("SELECT pass FROM users WHERE id=?");
	$stmt->bind_param('i', $id);
	$id = intval($_SESSION["id"]);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($pass);
	$stmt->fetch();
	$stmt->close();
	

	if($pass != md5($_POST["current_password"])){
		header("Location: http://localhost/deepak/profile.php?passerror");
		die();
	}else{
		$stmt = $connection->prepare("UPDATE users set pass=? where id=?");
		$stmt->bind_param('si', $npass, $id);
		$id = intval($_SESSION['id']);
		$npass = md5($_POST['new_password']);
		$stmt->execute();
		$stmt->close();
		$connection->close();
		header("Location: http://localhost/deepak/profile.php?passsuccess");
	}
?>