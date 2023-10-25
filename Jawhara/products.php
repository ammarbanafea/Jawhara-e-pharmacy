<?php

//Grap product data from database
$status="";
if (isset($_POST['productCode']) && $_POST['productCode']!=""){
$productCode = $_POST['productCode'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `productCode`='$productCode'"
);
$row = mysqli_fetch_assoc($result);
$productName = $row['productName'];
$productCode = $row['productCode'];
$productPrice = $row['productPrice'];
$productImage = $row['productImage'];
 
$cartArray = array(
	$productCode=>array(
	'productName'=>$productName,
	'productCode'=>$productCode,
	'productPrice'=>$productPrice,
	'quantity'=>1,
	'productImage'=>$productImage)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
	echo "<script>alert('Product is added to your cart!')</script>";
}

	else {
		
		//Popup messege if user add the product twice
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if(in_array($productCode,$array_keys)) {
			echo "<script>alert('Product is already added in the cart..!')</script>";
		}
		
		else {
			//Popup messege if user add the product
			$_SESSION["shopping_cart"] = array_merge(
			$_SESSION["shopping_cart"],
			$cartArray);

			echo "<script>alert('Product is added to your cart!')</script>";
		}
	}
}
?>

<html>
<head>

<title>Products | Jawhara</title>

	<link rel="stylesheet" href="styleCart.css">
	
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
	
	<!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
</head>


<style>
form, .content {
    border: 0px solid black;
}
	
</style>

<body>

	<div class="container">
        <div class="row text-center py-5">
	
			<?php
			$result = mysqli_query($con,"SELECT * FROM `products`");
			while($row = mysqli_fetch_assoc($result)){
				
				echo "
				<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
					<form action=\"medications.php\" method=\"post\">
					<input type='hidden' name='productCode' value=".$row['productCode']." />
						<div class=\"card shadow\">
							
							<div class='productImage'>
								<img src='images/".$row['productImage']."' class=\"img-fluid card-img-top\"/>
							</div>
							
							
							<div class=\"card-body\">
								<h5 class=\"productName\">".$row['productName']."</h5>
								
								<p class=\"productDesc\">
									".$row['productDesc']."
								</p>
								
								<h5> <span class=\"productPrice\">RM".$row['productPrice']."</span> </h5>
								
								<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
								
							</div>
						</div>
					</form>	
				</div>
				"; }
			
			mysqli_close($con);
	?>
			
		
		</div>
	</div>
</div>	
</body>
</html>