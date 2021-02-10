<?php
	session_start();
	include 'includes/connect.php';

	$stmt = $connection->prepare("SELECT email FROM users WHERE email=?");
	$stmt->bind_param('s', $email);
	$email = $_POST['register_email'];
	$stmt->execute();
    $stmt->store_result();

	if($stmt->num_rows >= 1){
    	header("Location: http://localhost/deepak?register&duplicate");
		$stmt->close();
		$connection->close();
		die();
    }

    $stmt->close();

    $stmt = $connection->prepare("INSERT INTO users (fname, email, pass) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $fname, $email, $pass);

    $fname = $_POST['register_name'];
    $email = $_POST['register_email'];
    $pass = $_POST['register_pass'];

    if(empty($email) || empty($pass) || empty($fname)){
    	header("Location: http://localhost/deepak?register&error");
		$stmt->close();
		$connection->close();
		die();
    }

    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows == 1){
    	while($stmt->fetch()){
    		$_SESSION['id']=$id;
    		header("Location: http://localhost/deepak/welcome.php");
    	}
    }else{
    	header("Location: http://localhost/deepak?login&error");
		die();
    }
    $stmt->close(); 
    $connection->close();*/
?>