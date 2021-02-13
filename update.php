<?php
	include('includes/check.php');
	include('includes/connect.php');

	$query = "UPDATE users set fname=?, email=? where id=?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param('ssi', $fname, $email, $id);
	$id = intval($_SESSION['id']);
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$stmt->execute();
	$stmt->close();

	$query = "UPDATE user_table set gender=?, phone=?, dob=?, country=? where user_id=?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param('ssssi', $gender, $phone, $dob, $country, $id);
	$id = intval($_SESSION['id']);
	$gender = $_POST["gender"];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$country = $_POST['country'];
	$stmt->execute();
	$stmt->close();
	header("Location: /profile.php");
?>


