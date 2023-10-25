<html>
	
<head>
<title>Banner | Jawhara</title>
	<link rel="stylesheet" href="style.css"/>
</head>

<body>
	<div id="header">
		<div id="left">
			<!-- Logo -->
			<a href='index.php'><img src="images/logo.png" width = "300" height="100" align="left">
		</div>

		<div id="right">
			<div id="content">
				
				<!-- Welcoming users after success login -->
				<img src="images/user_profile.png" width="50" height="50">

				<?php if (isset($_SESSION['user'])) ; ?>
				<strong>Hello, <?php echo $_SESSION['user']['username']; ?></strong>
				<br>
				<a href="logout.php">Log out</a>
			</div>
		</div>
				<!-- Cart icon -->
				<?php
					if(!empty($_SESSION["shopping_cart"])) {
						$cart_count = count(array_keys($_SESSION["shopping_cart"]));
					?>

					<div class="cart_div" >
						<a href="cart.php"><img src="images/cart.png" width="50" height="50" /><span>
						<?php echo $cart_count; ?></span></a>
					</div>
					<?php
					}
					?>
			
	</div>
</body>
</html>
	