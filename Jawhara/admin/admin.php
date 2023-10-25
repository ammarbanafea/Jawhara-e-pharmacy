<?php 
	session_start();
	include('../dbconnect.php');

	//Call function prevent the page from any unauthorized access
	if (!isAdmin()) {
		header('location: ../index.php');
	}
?>

<html>
<head>	
<meta charset="utf-8">
<title>Admin Home Page | Jawhara</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
	
	<div class="headerAdmin">
		<h2>Admin - Home Page</h2>
	</div>
	
	<div class="content">
	

	<!-- logged in user information -->
	<div class="profile_info">
			<img src="../images/user_profile.png"  ><br>
		
		<!-- Show username and user_type -->
	    <?php if (isset($_SESSION['user'])) ; ?>
            <strong><?php echo $_SESSION['user']['username']; ?></strong> <small> <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></small>
		
        <button type="submit" class="button" onclick="window.location.href = 'add.php';"><strong><span>Add Product</span></strong></button>
		<button type="submit" class="button" onclick="window.location.href = 'product_management.php';"><strong><span>Products management</span></strong></button>
		<button type="submit" class="button" onclick="window.location.href = '../index.php';"><strong><span>User View</span></strong></button>
		<button type="submit" class="buttonReturn" onclick="window.location.href = '../logout.php';"><strong><span>Logout</span></strong></button>
		
	</div>
	</div>
</body>
</html>