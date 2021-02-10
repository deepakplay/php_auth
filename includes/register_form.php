
	<form method="post" action="register.php" id="register_form" style="display:none;">
		<h2>Register</h2>

		<div class="register_name">
			<label for="register_name">Full name :</label>
			<input type="text" name="register_name" id="register_name" placeholder="Enter the full name" autocomplete="off">	
		</div>
		<div class="register_email">
			<label for="register_email">Email :</label>
			<input type="text" name="register_email" id="register_email" autocomplete="off" placeholder="Enter the full name">	
		</div>
		
		<div class="register_pass">
			<label for="register_pass">Password :</label>
			<input type="password" name="register_pass" id="register_pass"  placeholder="Enter the password">	
		</div>

		<div class="register_cpass">
			<label for="register_cpass">Conform Password :</label>
			<input type="password" name="register_cpass" id="register_cpass" placeholder="Conform your password">
		</div>

		<input type="submit" value="Register" class="submit">
		<span class="new_site">Already a member? <a href="/deepak/?login">Login</a></span>
	</form>