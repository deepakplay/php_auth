<!DOCTYPE html>
<html>
<head>
	<title>Form Submition</title>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<header>
		<span class="logo">PHP Site</span>
		<nav>			
			<ul>
				<li><a href="/login">Login</a></li>
				<li><a href="/register">Register</a></li>
			</ul>
		</nav>
	</header>

	<form method="post" action="/login">
		<div class="email">
			<label for="email">Email :</label>
			<input type="text" name="email" id="email" autocomplete="off">	
		</div>
		
		<div class="pass">
			<label for="pass">Password :</label>
			<input type="password" name="pass" id="pass">	
		</div>
		<input type="submit" value="Login" class="submit">
	</form>
	<footer>
		<p>Copyright &copy; <?php echo date('Y')?> <a href="/deepak">Deepak Kumar</a></p>
	</footer>
</body>
</html>