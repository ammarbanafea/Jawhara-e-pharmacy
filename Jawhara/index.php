<?php
session_start();
include('dbconnect.php'); 

//reflice the user to login page if not login or registered yet
if(!isset($_SESSION['user'])) {
header("Location: login.php");
}
	
?>

<html>
	
<head>
	<link rel="stylesheet" href="style.css"/>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Jawhara</title>
</head>

<body>
	
<?php
	 include('banner.php');
	 include('menu.html');
	 include('slider.html');
 ?>
	<h1></h1>
	<h1 align="center">–––––––––––Popular–––––––––––</h1>
	<?php include('products.php'); ?>
	
</body>
	
<style>
.site-footer

</style>
	<?php include('footer.html'); ?>
	
</html>