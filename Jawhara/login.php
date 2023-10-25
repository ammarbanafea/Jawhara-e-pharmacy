<?php
	session_start();
	include('dbconnect.php')
?>

<html>
	<head>
		<title>Login | Jawhara</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	
	<body>
		
	<header><a href='index.php'><img src="images/logo.png" width="300" height="100" class="center" /></a></header>
		
	<div class="header">
		<h2>Login</h2>
		</div>
		
		<form method="post" action="login.php">
			<?php echo display_error(); ?>
			
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" required>
			</div>
			
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password" required>
			</div>
			
			<div class="input-group">
				<button type="submit" class="button" name="login_btn"><span><strong>Login</strong></span></button>
			</div>
				
			<p class="link">Not a member yet? <a href="register.php">Click to register</a></p>
		</form>
	</body>
</html>