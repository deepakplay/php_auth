<?php session_start()?>
	<header>
		<span class="logo">PHP Site</span>
		<nav>			
			<?php if(!($_SESSION["id"])){ ?> 
				<ul>
					<li><a href="/deepak/?login">Login</a></li>
					<li><a href="/deepak/?register">Register</a></li>
				</ul>
			<?php }else{ ?> 
				<ul>
					<li><a href="includes/logout.php">Logout</a></li>
				</ul>
			<?php } ?> 
		</nav>
	</header>