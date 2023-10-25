<?php
session_start();

if(!isset($_SESSION['user'])) {
	header("Location: login.php");
}

//Action to remove products from the cart
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["productCode"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";


      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
	}
}

?>
<html><head>
<title>Shopping Cart | Jawhara</title>
<link rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	

<style>
.header {
	width: 1500px;
}
	
.form, .content {
	width: 1500px;
}
input[type=text] {
	width: 170px;
	box-sizing: border-box;
	border: 2px solid #ffd700;
	border-radius: 4px;
	font-size: 16px;
	background-color: white;
	background-image: url('images/search.png');
	background-position: 10px 10px; 
	background-size: 25px;
	background-repeat: no-repeat;
	padding: 12px 20px 12px 40px;
	-webkit-transition: width 0.4s ease-in-out;
	transition: width 0.4s ease-in-out;
	margin-left: 180px;
	margin-top: -50px;
}

input[type=text]:focus {
  width: 30%;
}
</style>
</head>
<body>
	<header><a href='index.php'><img src="images/logo.png" width="300" height="100" class="center" /></a></header>
	
	<div class="header">
		<h1>Shopping Cart</h1>
	</div>
	
	<form class="form" action="cart.php" method="post" name="form1">
		
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
	<table class="table">
		<td><strong>Product Image</strong></td>
		<td><strong>Product Name</strong></td>
		<td><strong>Product Price</strong></td>
		<td><strong>Action</strong></td>

</tr>	
	<?php		
	foreach ($_SESSION["shopping_cart"] as $product){
	?>
	<tr>
		<td>
			<!-- Grap product images form database -->
			<?php echo "<img src='images/".$product['productImage']."' width=\"100\" height=\"100\" \>;" ?>
		</td>
		
		<form method='post' action=''>
		<input type='hidden' name='productCode' value="<?php echo $product["productCode"]; ?>" />
		</form>
		
		<!-- Grap product name form database -->
		<td><?php echo $product["productName"]; ?><br />
			
		</td>

		<!-- Grap product price form database -->
		<td><?php echo "RM".$product["productPrice"]; ?></td>
	
		<!-- Call action remove and warning massege to remove -->
		<td><input type='hidden' name='action' value="remove" />
		<button type='submit' class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item?')">Remove Item</button></td>
		</tr>
		
		<?php
		//Calculate the total price
		$total_price += ($product["productPrice"]);
		}
		?>
		
		<tr>
			<td colspan="6" align="right">
			<strong>TOTAL: <?php echo "RM".$total_price; ?> </strong>
		</td>

	</tr>
</table>
	
  <?php
	
}
		//Massege if cart is empty
		else{
			echo "<h3>Your cart is empty!</h3>";
		}
?>
</div>
 
	<!-- Notice the user that his remove doen successfully -->
	<div style="clear:both;"></div>

	<div class="message_box" style="margin:10px 0px;">
	<?php echo $status; ?>

</div>
</body>
</html>
