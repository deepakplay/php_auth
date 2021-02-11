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
    $pass = md5($_POST['register_pass']);

    if(empty($email) || empty($pass) || empty($fname)){
    	header("Location: http://localhost/deepak?register&error");
		$stmt->close();
		$connection->close();
		die();
    }

    $stmt->execute();
    $stmt->close(); 




    $stmt = $connection->prepare("INSERT INTO user_table SET user_id=(SELECT id FROM users WHERE email=? AND  pass=?)");
    $stmt->bind_param('ss', $email, $pass);

    $email = $_POST['register_email'];
    $pass = md5($_POST['register_pass']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
        
    $stmt->close(); 
    $connection->close();


    header("Location: http://localhost/deepak?login&regsuccess");

    /*
        deepak@email.com
        pass@123

        deepak@play.com
        play@123

        admin@deepak.com
        admin@#789
    */
?>

