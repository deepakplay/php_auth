
<?php
	session_start();
	include 'includes/connect.php';

    $stmt = $connection->prepare("SELECT id, fname FROM users WHERE email=? AND  pass=?");
    $stmt->bind_param('ss', $email, $pass);

    $email = $_POST['login_email'];
    $pass = $_POST['login_pass'];

    if(empty($email) || empty($pass)){
    	header("Location: http://localhost/deepak?login&error");
		$stmt->close();
		die();
    }

    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($id, $fname);
    
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
    $connection->close();
?>