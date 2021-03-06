
<?php
	session_start();
	include 'includes/connect.php';

    $stmt = $connection->prepare("SELECT id, fname FROM users WHERE email=? AND  pass=?");
    $stmt->bind_param('ss', $email, $pass);

    $email = $_POST['login_email'];
    $pass = $_POST['login_pass'];

    if(empty($email) || empty($pass)){
    	header("Location: /?login&error");
		$stmt->close();
		die();
    }

    $pass = md5($_POST['login_pass']);

    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($id, $fname);
    
    if($stmt->num_rows == 1){
    	while($stmt->fetch()){
    		$_SESSION['id']=$id;
    		header("Location: /welcome.php");
    	}
    }else{
    	header("Location: /?login&error");
		  die();
    }
    $stmt->close(); 
    $connection->close();
?>