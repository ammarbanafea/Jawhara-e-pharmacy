<?php

include('dbconnect.php');
session_start();
if(!isset($_SESSION['user'])) {
	header("Location: login.php");
}	
?>

<html>
<head>

	<title>Medications | Jawhara</title>
	
	<link rel="stylesheet" href="style.css">
	
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
	
	<!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<?php
	include('banner.php');
	include('menu.html');
	
	?>
</head>

<style>
form, .content {
    border: 0px solid black;
}
	
</style>
	
<body>
			
<h1 align="center">–––––––––––Medications–––––––––––</h1>
	
	<?php 
		include('products.php'); 
		include('footer.html');
	?>
	
</body>
</html>