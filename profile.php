<?php include('includes/check.php') ?>
<?php
	include 'includes/connect.php';
	$stmt = $connection->prepare("SELECT fname FROM users WHERE id=?");
	$stmt->bind_param('i', $id);
	$id=intval($_SESSION['id']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($fname);
	$stmt->fetch();
	$stmt->close();
	$connection->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile - <?php echo($fname)?></title>
		<meta charset="utf-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<link rel="stylesheet" type="text/css" href="assets/header.css">
		<link rel="stylesheet" type="text/css" href="assets/footer.css">
		<link rel="stylesheet" type="text/css" href="assets/profile.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" crossorigin="anonymous" />
		<script src="assets/profile.js" defer></script>
	</head>
	<body>
		<?php include('includes/header.php')?>

		<?php include('includes/profile.php')?>

		<?php include('includes/footer.php')?>

	</body>
</html>