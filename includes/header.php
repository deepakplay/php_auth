	<header>
		<a href="/welcome.php"><span class="logo">PHP Site</span></a>
		<nav>			
			<?php if(!isset($_SESSION["id"])){ ?> 
				<ul>
					<li><a href="/?login">Login</a></li>
					<li><a href="/?register">Register</a></li>
				</ul>
			<?php }else{ ?> 
				<ul>
					<li><a href="/welcome.php"><i class="fas fa-home"></i>&nbsp;Home</a></li>
					<li><a href="/profile.php"><i class="fas fa-user-circle"></i>&nbsp;Profile</a></li>
					<li><a href="includes/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
				</ul>
			<?php } ?> 
		</nav>
	</header>
